<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Nwidart\Modules\Facades\Module;

use function Safe\scandir;

class ListFilamentPanels extends Command
{
    protected $signature = 'filament:list-panels';

    protected $description = 'List all Filament panels in modules';

    public function handle(): int
    {
        $modules = Module::all();

        /** @var Collection<string, \Nwidart\Modules\Module> $modules */
        foreach ($modules as $moduleName => $module) {
            $providersPath = $module->getPath().'/Providers';
            if (! is_dir($providersPath)) {
                continue;
            }

<<<<<<< .merge_file_RJwV0W
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_jkVI7F
            /** @var list<string> $entries */
            $entries = scandir($providersPath);
            $providers = collect($entries)
                ->filter(static function (string $file): bool {
                    return str_ends_with($file, 'ServiceProvider.php');
<<<<<<< .merge_file_RJwV0W
=======
            $providers = collect(scandir($providersPath))
<<<<<<< HEAD
                ->filter(static function (mixed $file): bool {
=======
                ->filter(function ($file): bool {
>>>>>>> 930f8146 (Check & fix styling)
                    return is_string($file) && str_ends_with($file, 'ServiceProvider.php');
>>>>>>> laraxot/dev
=======
            $providers = collect(scandir($providersPath))
                ->filter(function ($file): bool {
                    return is_string($file) && str_ends_with($file, 'ServiceProvider.php');
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_jkVI7F
                });

            foreach ($providers as $provider) {
                if (! is_string($provider)) {
                    continue;
                }

                $providerClass = "Modules\\{$moduleName}\\Providers\\{$provider}";
                if (! class_exists($providerClass)) {
                    continue;
                }

                $this->info("Found panel in {$moduleName}: {$provider}");
            }
        }

        return Command::SUCCESS;
    }
}
