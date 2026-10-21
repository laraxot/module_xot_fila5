<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

use Filament\Navigation\NavigationItem;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Tenant\Actions\Modules\GetTenantModulesAction;
use Modules\Xot\Actions\Cast\SafeIntCastAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\json_encode;

/**
 * Classe per gestire gli elementi di navigazione per i moduli.
 * Ottimizzata per ridurre memory usage.
 */
class GetModulesNavigationItems
{
    use QueueableAction;

    /**
     * Ottiene gli elementi di navigazione per i moduli.
     *
     * @return array<int, NavigationItem> Array di elementi di navigazione
     */
    public function execute(): array
    {
        $navs = [];

        $modules = app(GetTenantModulesAction::class)->execute();
        // Pre-load user roles to avoid N+1 queries (unused — kept for future role-based filtering)

        foreach ($modules as $module) {
            $nav = app(GetNavigationItemByModulename::class)->execute($module);

            $navs[] = $nav;
        }

        return $navs;
    }

    /**
     * Restituisce la versione cached e minimale dei moduli per UI rendering.
     * Questo evita di hardcodare i moduli nelle viste.
     *
     * @return array<int, array{module:string,module_low:string,icon:string,sort:int}>
     */
    public function getCachedModuleConfigs(): array
    {
        $modules = app(GetTenantModulesAction::class)->execute();

        $cacheKey = 'xot:navigation:modules:'.md5((string) json_encode($modules));

        $cached = Cache::get($cacheKey);
        /** @var array<int, array{module: string, module_low: string, icon: string, sort: int}> $cached */
        if (\is_array($cached)) {
            return $cached;
        }

        // Se non presente in cache, rigenera usando la stessa logica di execute()

        $result = Cache::remember($cacheKey, now()->addMinutes(10), static function () use ($modules): array {
            $out = [];
            foreach ($modules as $module) {
                Assert::string($module, 'Il nome del modulo deve essere una stringa');
                $module_low = Str::lower($module);
                Assert::stringNotEmpty($module_low, 'Il nome del modulo convertito in minuscolo non può essere vuoto');
                $configPath = app(GetModulePathByGeneratorAction::class)->execute($module, 'config');
                $configFilePath = $configPath.'/config.php';
                if (! File::exists($configFilePath)) {
                    continue;
                }
                try {
                    /** @var array<string, mixed> $config */
                    $config = File::getRequire($configFilePath);
                    Assert::isArray($config);
                } catch (\Exception $e) {
                    continue;
                }
                $icon = $config['icon'] ?? 'heroicon-o-cube';
                $navigation_sort = SafeIntCastAction::cast($config['navigation_sort'] ?? 1);
                $out[] = [
                    'module' => $module,
                    'module_low' => $module_low,
                    'icon' => SafeStringCastAction::cast($icon),
                    'sort' => $navigation_sort,
                ];
            }

            return $out;
        });

        Assert::isArray($result);
        foreach ($result as $item) {
            Assert::isArray($item);
            Assert::keyExists($item, 'module');
            Assert::keyExists($item, 'module_low');
            Assert::keyExists($item, 'icon');
            Assert::keyExists($item, 'sort');
            Assert::string($item['module']);
            Assert::string($item['module_low']);
            Assert::string($item['icon']);
            Assert::integer($item['sort']);
        }

        /* @var array<int, array{module: string, module_low: string, icon: string, sort: int}> $result */
        return $result;
    }
}
