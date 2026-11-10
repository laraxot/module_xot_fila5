<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'symlink:publish')]
class SymlinkPublishCommand extends Command
{
    protected $signature = 'symlink:publish
        {--force : Overwrite existing symlinks}
        {--dry-run : Show what would be created without creating}';

    protected $description = 'Create symlinks for modules/themes with public folders (excludes modules without public folder)';

    public function handle(Filesystem $files): int
    {
        $modulesPath = base_path('Modules');
        $themesPath = base_path('Themes');
        $assetsPath = public_path('assets');

        $this->info('Scanning for modules and themes with public folders...');

        $created = [];
        $skipped = [];
        $errors = [];

        // Process modules
        $this->processDirectory($modulesPath, $assetsPath, 'modules', $created, $skipped, $errors);

        // Process themes
        $this->processDirectory($themesPath, $assetsPath, 'themes', $created, $skipped, $errors);

        // Report results
        if (count($created) > 0) {
            $this->newLine();
            $this->info('Created symlinks:');
            foreach ($created as $item) {
                $this->line("  <info>✓</info> {$item}");
            }
        }

        if (count($skipped) > 0) {
            $this->newLine();
            $this->comment('Skipped (no public folder):');
            foreach ($skipped as $item) {
                $this->line("  <comment>•</comment> {$item}");
            }
        }

        if (count($errors) > 0) {
            $this->newLine();
            $this->error('Errors:');
            foreach ($errors as $error) {
                $this->line("  <error>✗</error> {$error}");
            }
            return self::FAILURE;
        }

        $this->newLine();
        $this->info('Symlink publish completed successfully.');

        return self::SUCCESS;
    }

    /**
     * Process a directory (modules or themes) for public folder symlinks.
     */
    protected function processDirectory(
        string $sourcePath,
        string $targetBase,
        string $type,
        array &$created,
        array &$skipped,
        array &$errors
    ): void {
        if (!is_dir($sourcePath)) {
            return;
        }

        $directories = File::directories($sourcePath);

        foreach ($directories as $dir) {
            $name = basename($dir);
            $publicDir = $dir . '/public';

            if (!is_dir($publicDir)) {
                $skipped[] = "{$type}/{$name} (no public folder)";
                continue;
            }

            // Determine target path based on type
            if ($type === 'modules') {
                $targetDir = $targetBase;
                $targetPath = $targetDir . '/' . $name;
            } else {
                // Themes go under public_html/themes/
                $targetDir = public_path('themes');
                $targetPath = $targetDir . '/' . $name;
            }

            // Ensure target directory exists
            if (!is_dir($targetDir)) {
                File::makeDirectory($targetDir, 0755, true);
            }

            // Check if symlink already exists
            if (is_link($targetPath)) {
                $currentTarget = readlink($targetPath);
                if ($currentTarget === $publicDir) {
                    $this->line("  <info>=</info> {$type}/{$name} already linked correctly");
                    continue;
                }
                if ($this->option('force')) {
                    unlink($targetPath);
                } else {
                    $errors[] = "{$type}/{$name}: symlink already exists at {$targetPath}";
                    continue;
                }
            } elseif (is_dir($targetPath)) {
                if ($this->option('force')) {
                    $files = File::allFiles($targetPath);
                    foreach ($files as $file) {
                        File::delete($file);
                    }
                    rmdir($targetPath);
                } else {
                    $errors[] = "{$type}/{$name}: directory exists at {$targetPath}, use --force to overwrite";
                    continue;
                }
            }

            // Create symlink
            if ($this->option('dry-run')) {
                $created[] = "{$type}/{$name} → {$publicDir}";
                continue;
            }

            try {
                symlink($publicDir, $targetPath);
                $created[] = "{$type}/{$name} → {$targetPath}";
            } catch (\Throwable $e) {
                $errors[] = "{$type}/{$name}: {$e->getMessage()}";
            }
        }
    }
}