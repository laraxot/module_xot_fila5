<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Modules\Xot\Actions\File\GetComponentsAction;
<<<<<<< HEAD
=======
use Modules\Xot\Datas\ComponentFileData;
>>>>>>> c7fd73eb (.)

class AnalyzeComponentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xot:analyze-components {--module=} {--type=} {--prefix=} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Analizza i componenti del sistema';

    /**
     * Execute the console command.
     */
    public function handle(GetComponentsAction $getComponentsAction): int
    {
        $module = $this->option('module');
        $type = $this->option('type');
        $prefixOption = $this->option('prefix');
        $forceOption = $this->option('force');

        // Type-safe casting of command options
        $prefix = is_string($prefixOption) ? $prefixOption : '';
        $force = is_bool($forceOption) ? $forceOption : false;

        // Type-safe module handling
        $moduleStr = is_string($module) ? $module : '';
<<<<<<< HEAD
        $path = $moduleStr !== '' ? base_path("laravel/Modules/{$moduleStr}") : base_path('laravel/Modules');
        $namespace = $moduleStr !== '' ? "Modules\\{$moduleStr}" : 'Modules';
=======
        $path = '' !== $moduleStr ? base_path("laravel/Modules/{$moduleStr}") : base_path('laravel/Modules');
        $namespace = '' !== $moduleStr ? "Modules\\{$moduleStr}" : 'Modules';
>>>>>>> c7fd73eb (.)

        $components = $getComponentsAction->execute($path, $namespace, $prefix, $force);

        $this->table(
            ['Componente', 'Tipo', 'Modulo', 'Path'],
<<<<<<< HEAD
            collect($components)->map(function ($component) {
                // Type-safe component access
                if (! is_array($component)) {
                    return ['Invalid component', 'N/A', 'N/A', 'N/A'];
                }

                return [
                    $component['comp_name'] ?? 'N/A',
                    $component['type'] ?? 'N/A',
                    $component['module'] ?? 'N/A',
                    $component['path'] ?? 'N/A',
=======
            collect($components)->map(static function (ComponentFileData $component): array {
                return [
                    $component->name,
                    $component->class,
                    $component->module ?? 'N/A',
                    $component->path ?? 'N/A',
>>>>>>> c7fd73eb (.)
                ];
            })
        );

        return Command::SUCCESS;
    }
}
