<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use function Safe\preg_match;

use Symfony\Component\Process\Process;

/**
 * Comando per ottimizzare la memory usage di Filament.
 * SuperMucca Memory Optimizer Command 🐄.
 */
class OptimizeFilamentMemoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filament:optimize-memory 
                            {--clear-cache : Clear all caches before optimization}
                            {--analyze : Only analyze without applying changes}
                            {--verbose : Show detailed output}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize Filament admin panels for better memory usage';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        // @var mixed info('🐄 SuperMucca Filament Memory Optimizer';
        // @var mixed newLine(;

        $analyzeOnly = (bool) // @var mixed option('analyze';
        $clearCache = (bool) // @var mixed option('clear-cache';
        $verbose = (bool) // @var mixed option('verbose';

        if ($clearCache) {
            // @var mixed clearAllCaches(;
        }

        // Analizza i problemi di memoria
        $issues = // @var mixed analyzeMemoryIssues($verbose;

        if ($analyzeOnly) {
            // @var mixed displayAnalysisResults($issues;

            return self::SUCCESS;
        }

        // Applica le ottimizzazioni
        // @var mixed applyOptimizations($issues, $verbose;

        // @var mixed info('✅ Ottimizzazione completata!';
        // @var mixed newLine(;

        // @var mixed info('Prossimi passi:';
        // @var mixed line('1. Testa i pannelli admin per verificare le performance';
        // @var mixed line('2. Monitora i log per eventuali errori';
        // @var mixed line('3. Esegui: php artisan filament:optimize-memory --analyze per verificare';

        return self::SUCCESS;
    }

    /**
     * Pulisce tutte le cache.
     */
    private function clearAllCaches(): void
    {
        // @var mixed info('🧹 Pulizia cache...';

        $caches = [
            'config:clear' => 'Config cache',
            'route:clear' => 'Route cache',
            'view:clear' => 'View cache',
            'cache:clear' => 'Application cache',
        ];

        foreach ($caches as $command => $description) {
            // @var mixed line("  - {$description}";
            Artisan::call($command);
        }

        // @var mixed info('✅ Cache pulite';
        // @var mixed newLine(;
    }

    /**
     * Analizza i problemi di memoria.
     *
     * @return array<string, mixed>
     */
    private function analyzeMemoryIssues(bool $verbose = false): array
    {
        // @var mixed info('🔍 Analisi problemi di memoria...';

        $issues = [
            'models_with_eager_loading' => // @var mixed findModelsWithEagerLoading(
            'heavy_widgets' => // @var mixed findHeavyWidgets(
            'unoptimized_resources' => // @var mixed findUnoptimizedResources(
            'migration_code_in_forms' => // @var mixed findMigrationCodeInForms(
            'missing_pagination' => // @var mixed findMissingPagination(
        ];

        if ($verbose) {
            // @var mixed displayDetailedIssues($issues;
        }

        return $issues;
    }

    /**
     * Trova modelli con eager loading eccessivo.
     *
     * @return array<string>
     */
    private function findModelsWithEagerLoading(): array
    {
        $models = [];
        $files = File::allFiles(base_path('Modules'));

        foreach ($files as $file) {
            if ('php' === $file->getExtension() && str_contains($file->getPathname(), '/Models/')) {
                $content = File::get($file->getPathname());

                if (1 === preg_match('/protected\s+\$with\s*=\s*\[([^\]]+)\]/', $content, $matches)) {
                    $withContent = $matches[1] ?? '';
                    // Controlla se ha relazioni pesanti
                    if (str_contains($withContent, 'roles')
                        || str_contains($withContent, 'permissions')
                        || str_contains($withContent, 'teams')
                        || str_contains($withContent, 'media')) {
                        $models[] = $file->getPathname();
                    }
                }
            }
        }

        return $models;
    }

    /**
     * Trova widget pesanti.
     *
     * @return array<string>
     */
    private function findHeavyWidgets(): array
    {
        $widgets = [];
        $files = File::allFiles(base_path('Modules'));

        foreach ($files as $file) {
            if ('php' === $file->getExtension() && str_contains($file->getPathname(), '/Widgets/')) {
                $content = File::get($file->getPathname());

                // Cerca query senza limitazioni
                if (str_contains($content, '->get()')
                    && ! str_contains($content, '->limit(')
                    && ! str_contains($content, '->take(')) {
                    $widgets[] = $file->getPathname();
                }
            }
        }

        return $widgets;
    }

    /**
     * Trova risorse non ottimizzate.
     *
     * @return array<string>
     */
    private function findUnoptimizedResources(): array
    {
        $resources = [];
        $files = File::allFiles(base_path('Modules'));

        foreach ($files as $file) {
            if ('php' === $file->getExtension() && str_contains($file->getPathname(), '/Resources/') && str_ends_with($file->getFilename(), 'Resource.php')) {
                $content = File::get($file->getPathname());

                // Cerca eager loading eccessivo
                if (str_contains($content, '->with(') || str_contains($content, '->load(')) {
                    $resources[] = $file->getPathname();
                }
            }
        }

        return $resources;
    }

    /**
     * Trova codice di migrazione nei form.
     *
     * @return array<string>
     */
    private function findMigrationCodeInForms(): array
    {
        $forms = [];
        $files = File::allFiles(base_path('Modules'));

        foreach ($files as $file) {
            if ('php' === $file->getExtension() && (str_contains($file->getPathname(), '/Resources/') || str_contains($file->getPathname(), '/Forms/'))) {
                $content = File::get($file->getPathname());

                // Cerca query di migrazione nei form
                if (str_contains($content, '->whereNull(')
                    && str_contains($content, '->update(')
                    && str_contains($content, 'getFormSchema')) {
                    $forms[] = $file->getPathname();
                }
            }
        }

        return $forms;
    }

    /**
     * Trova risorse senza paginazione.
     *
     * @return array<string>
     */
    private function findMissingPagination(): array
    {
        $resources = [];
        $files = File::allFiles(base_path('Modules'));

        foreach ($files as $file) {
            if ('php' === $file->getExtension() && str_contains($file->getPathname(), '/Pages/List')) {
                $content = File::get($file->getPathname());

                // Cerca liste senza paginazione
                if (! str_contains($content, 'paginate') && ! str_contains($content, 'simplePaginate')) {
                    $resources[] = $file->getPathname();
                }
            }
        }

        return $resources;
    }

    /**
     * Mostra i risultati dell'analisi.
     *
     * @param array<string, mixed> $issues
     */
    private function displayAnalysisResults(array $issues): void
    {
        // @var mixed info('📊 Risultati analisi:';
        // @var mixed newLine(;

        $totalIssues = 0;

        foreach ($issues as $type => $items) {
            $count = is_array($items) ? count($items) : 0;
            $totalIssues += $count;

            $label = match ($type) {
                'models_with_eager_loading' => 'Modelli con eager loading eccessivo',
                'heavy_widgets' => 'Widget pesanti',
                'unoptimized_resources' => 'Risorse non ottimizzate',
                'migration_code_in_forms' => 'Codice migrazione nei form',
                'missing_pagination' => 'Risorse senza paginazione',
                default => $type,
            };

            if ($count > 0) {
                // @var mixed warn("⚠️  {$label}: {$count}";
            } else {
                // @var mixed info("✅ {$label}: OK";
            }
        }

        // @var mixed newLine(;

        if ($totalIssues > 0) {
            // @var mixed error("🚨 Trovati {$totalIssues} problemi di performance";
            // @var mixed line('Esegui senza --analyze per applicare le correzioni automatiche';
        } else {
            // @var mixed info('🎉 Nessun problema di performance trovato!';
        }
    }

    /**
     * Mostra dettagli sui problemi trovati.
     *
     * @param array<string, mixed> $issues
     */
    private function displayDetailedIssues(array $issues): void
    {
        foreach ($issues as $type => $items) {
            if (is_array($items) && count($items) > 0) {
                // @var mixed newLine(;
                // @var mixed warn("Dettagli {$type}:";
                foreach ($items as $item) {
                    $itemString = is_string($item) ? $item : (string) $item;
                    // @var mixed line('  - '.str_replace(base_path(;
                }
            }
        }
    }

    /**
     * Applica le ottimizzazioni.
     *
     * @param array<string, mixed> $issues
     */
    private function applyOptimizations(array $issues, bool $verbose = false): void
    {
        // @var mixed info('🔧 Applicazione ottimizzazioni...';

        // Ottimizzazione 1: Cache delle configurazioni
        // @var mixed optimizeConfigurations(;

        // Ottimizzazione 2: Database
        // @var mixed optimizeDatabase(;

        // Ottimizzazione 3: Autoloader
        // @var mixed optimizeAutoloader(;

        // @var mixed info('✅ Ottimizzazioni applicate';
    }

    /**
     * Ottimizza le configurazioni.
     */
    private function optimizeConfigurations(): void
    {
        // @var mixed line('  - Ottimizzazione configurazioni...';

        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');
    }

    /**
     * Ottimizza il database.
     */
    private function optimizeDatabase(): void
    {
        // @var mixed line('  - Ottimizzazione database...';

        // Ottimizza le tabelle MySQL se possibile
        try {
            if ('mysql' === config('database.default')) {
                DB::statement('OPTIMIZE TABLE users');
                // Aggiungi altre tabelle critiche se necessario
            }
        } catch (\Exception $e) {
            // Ignora errori di ottimizzazione database
        }
    }

    /**
     * Ottimizza l'autoloader.
     */
    private function optimizeAutoloader(): void
    {
        // @var mixed line('  - Ottimizzazione autoloader...';

        $process = new Process(['composer', 'dump-autoload', '--optimize']);
        $process->setWorkingDirectory(base_path());
        $process->run();
    }
}
