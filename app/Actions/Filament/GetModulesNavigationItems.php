<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

<<<<<<< HEAD
use Throwable;
use Exception;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\json_encode;

=======
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

use function Safe\json_encode;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

>>>>>>> c7fd73eb (.)
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

<<<<<<< HEAD
        $modules = TenantService::allModules();
        Assert::isArray($modules, 'TenantService::allModules() deve restituire un array');

        // Pre-load user roles to avoid N+1 queries
        $user = auth()->user();

        $userRoles = [];
        if ($user && method_exists($user, 'roles')) {
            try {
                $userRoles = $user->roles()->pluck('name')->toArray();
            } catch (Exception $e) {
                $userRoles = [];
            }
        }
=======
        $modules = app(GetTenantModulesAction::class)->execute();
        // Pre-load user roles to avoid N+1 queries
        /** @var Authenticatable|null $user */
        $user = Auth::user();

        /** @var array<int, string> $userRoles */
        $userRoles = [];
        // Se serve re-introdurre un preload ruoli, farlo solo se il metodo è disponibile e tipizzato nel modello.
>>>>>>> c7fd73eb (.)

        foreach ($modules as $module) {
            Assert::string($module, 'Il nome del modulo deve essere una stringa');

            $module_low = Str::lower($module);
            Assert::stringNotEmpty($module_low, 'Il nome del modulo convertito in minuscolo non può essere vuoto');

            // Tolleranza: durante comandi CLI alcuni moduli possono non avere ancora struttura completa
            try {
                $configPath = app(GetModulePathByGeneratorAction::class)->execute($module, 'config');
<<<<<<< HEAD
            } catch (Throwable $e) {
=======
            } catch (\Throwable $e) {
>>>>>>> c7fd73eb (.)
                // Skip modulo non pronto/senza generator path config
                continue;
            }
            $configFilePath = $configPath.'/config.php';

            // Verifichiamo che il file esista
            if (! File::exists($configFilePath)) {
                continue;
            }

            // Carichiamo la configurazione
            try {
                /** @var array<string, mixed> $config */
                $config = File::getRequire($configFilePath);
                Assert::isArray($config, 'Il file di configurazione deve restituire un array');
<<<<<<< HEAD
            } catch (Exception $e) {
=======
            } catch (\Exception $e) {
>>>>>>> c7fd73eb (.)
                continue;
            }

            // Estraiamo i valori di configurazione con valori predefiniti
            $icon = $config['icon'] ?? 'heroicon-o-question-mark-circle';
            Assert::string($icon, "L'icona deve essere una stringa");

<<<<<<< HEAD
            $role = $module_low.'::admin';
            Assert::stringNotEmpty($role, 'Il ruolo non può essere vuoto');
=======
            // $role è sempre stringa non vuota (concatenazione di stringhe non vuote), check ridondante rimosso
            $role = $module_low.'::admin';
>>>>>>> c7fd73eb (.)

            $navigation_sort = $config['navigation_sort'] ?? 1;
            Assert::integerish($navigation_sort, 'navigation_sort deve essere un intero');
            $navigation_sort = (int) $navigation_sort;

            // Check role using pre-loaded roles instead of hasRole() method
            /*
             $hasRole = in_array($role, $userRoles, true);

             // Only create NavigationItem if user has the role (memory optimization)
             if ($hasRole) {
                 $nav = NavigationItem::make($module)
<<<<<<< HEAD
                     ->url('/' . $module_low . '/admin')
=======
                     ->url('/'.$module_low.'/admin')
>>>>>>> c7fd73eb (.)
                     ->icon($icon)
                     ->group('Modules')
                     ->sort($navigation_sort)
                     ->visible(true); // Already checked above

                 $navs[] = $nav;
             }
             */

            // Creiamo l'elemento di navigazione
            $nav = NavigationItem::make($module)
                ->url('/'.$module_low.'/admin')
                ->icon($icon)
                ->group('Modules')
                ->sort($navigation_sort)
                ->visible(static function () use ($role): bool {
<<<<<<< HEAD
                    $user = Filament::auth()->user();
                    if ($user === null) {
=======
                    /**
                     * @var Authenticatable|null $user
                     */
                    $user = Auth::user();
                    if (null === $user) {
>>>>>>> c7fd73eb (.)
                        return false;
                    }

                    // Verifichiamo che il metodo hasRole esista
                    if (! method_exists($user, 'hasRole')) {
                        return false;
                    }

                    return (bool) $user->hasRole($role);
                });

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
<<<<<<< HEAD
        $modules = TenantService::allModules();
        Assert::isArray($modules);

        $cacheKey = 'xot:navigation:modules:'.md5(json_encode($modules));

        /** @var array<int, array{module:string,module_low:string,icon:string,sort:int}> $cached */
        $cached = Cache::get($cacheKey);
        if (is_array($cached)) {
=======
        $modules = app(GetTenantModulesAction::class)->execute();

        $cacheKey = 'xot:navigation:modules:'.md5((string) json_encode($modules));

        $cached = Cache::get($cacheKey);
        /** @var array<int, array{module: string, module_low: string, icon: string, sort: int}> $cached */
        if (\is_array($cached)) {
>>>>>>> c7fd73eb (.)
            return $cached;
        }

        // Se non presente in cache, rigenera usando la stessa logica di execute()
<<<<<<< HEAD
        /** @var array<int, array{module:string,module_low:string,icon:string,sort:int}> $regen */
        $regen = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($modules): array {
=======

        $result = Cache::remember($cacheKey, now()->addMinutes(10), static function () use ($modules): array {
>>>>>>> c7fd73eb (.)
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
<<<<<<< HEAD
                } catch (Exception $e) {
                    continue;
                }
                $icon = $config['icon'] ?? 'heroicon-o-cube';
                $navigation_sort = (int) ($config['navigation_sort'] ?? 1);
                $out[] = [
                    'module' => $module,
                    'module_low' => $module_low,
                    'icon' => (string) $icon,
=======
                } catch (\Exception $e) {
                    continue;
                }
                $icon = $config['icon'] ?? 'heroicon-o-cube';
                $navigation_sort = SafeIntCastAction::cast($config['navigation_sort'] ?? 1);
                $out[] = [
                    'module' => $module,
                    'module_low' => $module_low,
                    'icon' => SafeStringCastAction::cast($icon),
>>>>>>> c7fd73eb (.)
                    'sort' => $navigation_sort,
                ];
            }

            return $out;
        });

<<<<<<< HEAD
        return $regen;
=======
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
>>>>>>> c7fd73eb (.)
    }
}
