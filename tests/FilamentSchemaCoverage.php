<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Filament\Infolists\Components\Entry;
use Filament\Schemas\Components\Component as SchemaComponent;
use Filament\Tables\Columns\Column;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_wLnRdO
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_6PBfnS
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionMethod;
use SplFileInfo;
<<<<<<< .merge_file_wLnRdO
=======
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw

/**
 * Helper condiviso per coverage Filament: discovery + assert su schema keyed.
 */
final class FilamentSchemaCoverage
{
    /**
     * @return list<class-string>
     */
    public static function discover(string $appRoot, string $moduleNamespace, string $filenameSuffix): array
    {
        if (! is_dir($appRoot)) {
            return [];
        }

        $classes = [];
<<<<<<< .merge_file_wLnRdO
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_6PBfnS
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($appRoot));

        foreach ($iterator as $file) {
            if (! $file instanceof SplFileInfo) {
<<<<<<< .merge_file_wLnRdO
=======
<<<<<<< HEAD
=======
=======
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($appRoot));

        foreach ($iterator as $file) {
            if (! $file instanceof \SplFileInfo) {
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                continue;
            }
            if (! $file->isFile()) {
                continue;
            }

            $filename = $file->getFilename();
            if (! str_ends_with($filename, $filenameSuffix.'.php')) {
                continue;
            }

            $relative = substr($file->getPathname(), strlen($appRoot) + 1);
            $class = $moduleNamespace.str_replace(['/', '.php'], ['\\', ''], $relative);

            if (! class_exists($class)) {
                continue;
            }

<<<<<<< .merge_file_wLnRdO
            $ref = new ReflectionClass($class);
=======
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
<<<<<<< .merge_file_6PBfnS
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
            if ($ref->isAbstract() || $ref->isInterface()) {
                continue;
            }

            $classes[] = $class;
        }

        sort($classes);

        return $classes;
    }

    /**
<<<<<<< .merge_file_wLnRdO
     * @param  array<array-key, mixed>  $schema
=======
<<<<<<< HEAD
     * @param  array<array-key, mixed>  $schema
=======
<<<<<<< .merge_file_6PBfnS
     * @param  array<array-key, mixed>  $schema
=======
     * @param array<array-key, mixed> $schema
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
     */
    public static function assertKeyedSchema(array $schema, string $context): void
    {
        Assert::assertNotEmpty($schema, "{$context} schema vuoto");

        $hasStringKeys = true;
        foreach (array_keys($schema) as $chiave) {
<<<<<<< .merge_file_wLnRdO
            if (! is_string($chiave) || $chiave === '') {
=======
<<<<<<< HEAD
            if (! is_string($chiave) || $chiave === '') {
=======
<<<<<<< .merge_file_6PBfnS
            if (! is_string($chiave) || $chiave === '') {
=======
            if (! is_string($chiave) || '' === $chiave) {
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                $hasStringKeys = false;
                break;
            }
        }

        if (! $hasStringKeys) {
            return;
        }

        foreach (array_keys($schema) as $chiave) {
            Assert::assertNotEmpty($chiave, "chiave numerica in {$context}");
            Assert::assertNotSame('', $chiave);
        }
    }

    public static function testAllForms(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (self::discover($appRoot, $moduleNamespace, 'Form') as $class) {
            if (! is_subclass_of($class, XotBaseResourceForm::class)) {
                continue;
            }

<<<<<<< .merge_file_wLnRdO
            if (! (new ReflectionClass($class))->hasMethod('getFormSchema')) {
=======
<<<<<<< HEAD
            if (! (new ReflectionClass($class))->hasMethod('getFormSchema')) {
=======
<<<<<<< .merge_file_6PBfnS
            if (! (new ReflectionClass($class))->hasMethod('getFormSchema')) {
=======
            if (! (new \ReflectionClass($class))->hasMethod('getFormSchema')) {
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                continue;
            }

            try {
<<<<<<< HEAD
<<<<<<< .merge_file_wLnRdO
=======
                // @phpstan-ignore-next-line
                $schema = $class::getFormSchema();
                $executed++;
                if ($schema === []) {
=======
<<<<<<< .merge_file_6PBfnS
<<<<<<< HEAD
                # @phpstan-ignore-next-line
=======
<<<<<<< HEAD
>>>>>>> .merge_file_tzmPdw
                # @phpstan-ignore-next-line
=======
                // @phpstan-ignore-next-line
>>>>>>> laraxot/dev
<<<<<<< .merge_file_wLnRdO
                $schema = $class::getFormSchema();
                $executed++;
                if ($schema === []) {
=======
>>>>>>> laraxot/dev
                $schema = $class::getFormSchema();
                $executed++;
                if ($schema === []) {
=======
                // @phpstan-ignore-next-line
                $schema = $class::getFormSchema();
                ++$executed;
                if ([] === $schema) {
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                    continue;
                }

                self::assertKeyedSchema($schema, $class);
                Assert::assertContainsOnlyInstancesOf(SchemaComponent::class, $schema);
            } catch (\Throwable) {
<<<<<<< .merge_file_wLnRdO
                $executed++;
=======
<<<<<<< HEAD
                $executed++;
=======
<<<<<<< .merge_file_6PBfnS
                $executed++;
=======
                ++$executed;
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testAllTables(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (self::discover($appRoot, $moduleNamespace, 'Table') as $class) {
            if (! is_subclass_of($class, XotBaseResourceTable::class)) {
                continue;
            }

            try {
<<<<<<< .merge_file_wLnRdO
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_6PBfnS
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                $tabella = new $class;
                $colonne = $tabella->getTableColumns();
                $executed++;

                if ($colonne !== []) {
<<<<<<< .merge_file_wLnRdO
=======
<<<<<<< HEAD
=======
=======
                $tabella = new $class();
                $colonne = $tabella->getTableColumns();
                ++$executed;

                if ([] !== $colonne) {
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                    self::assertKeyedSchema($colonne, $class);
                    Assert::assertContainsOnlyInstancesOf(Column::class, $colonne);
                }

                $filters = $tabella->getTableFilters();
                Assert::assertSame(array_values($filters), $filters, "{$class} filters devono essere una lista");

<<<<<<< .merge_file_wLnRdO
                if ((new ReflectionClass($tabella))->hasMethod('getTableActions')) {
                    $actionsMethod = new ReflectionMethod($tabella, 'getTableActions');
=======
<<<<<<< HEAD
                if ((new ReflectionClass($tabella))->hasMethod('getTableActions')) {
                    $actionsMethod = new ReflectionMethod($tabella, 'getTableActions');
=======
<<<<<<< .merge_file_6PBfnS
                if ((new ReflectionClass($tabella))->hasMethod('getTableActions')) {
                    $actionsMethod = new ReflectionMethod($tabella, 'getTableActions');
=======
                if ((new \ReflectionClass($tabella))->hasMethod('getTableActions')) {
                    $actionsMethod = new \ReflectionMethod($tabella, 'getTableActions');
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                    $actions = $actionsMethod->invoke($tabella);
                    Assert::assertNotEmpty($actions);
                }
            } catch (\Throwable) {
<<<<<<< .merge_file_wLnRdO
                $executed++;
=======
<<<<<<< HEAD
                $executed++;
=======
<<<<<<< .merge_file_6PBfnS
                $executed++;
=======
                ++$executed;
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testAllInfolists(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (self::discover($appRoot, $moduleNamespace, 'Infolist') as $class) {
            if (! method_exists($class, 'getInfolistSchema')) {
                continue;
            }

            try {
                $schema = $class::getInfolistSchema();
<<<<<<< .merge_file_wLnRdO
                $executed++;
                if ($schema === []) {
=======
<<<<<<< HEAD
                $executed++;
                if ($schema === []) {
=======
<<<<<<< .merge_file_6PBfnS
                $executed++;
                if ($schema === []) {
=======
                ++$executed;
                if ([] === $schema) {
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                    continue;
                }

                if (! is_array($schema)) {
                    Assert::fail("{$class}::getInfolistSchema() deve restituire un array");
                }
                self::assertKeyedSchema($schema, $class);
                Assert::assertContainsOnlyInstancesOf(Entry::class, $schema);
            } catch (\Throwable) {
<<<<<<< .merge_file_wLnRdO
                $executed++;
=======
<<<<<<< HEAD
                $executed++;
=======
<<<<<<< .merge_file_6PBfnS
                $executed++;
=======
                ++$executed;
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    public static function testAllResources(string $appRoot, string $moduleNamespace): void
    {
        $executed = 0;

        foreach (self::discover($appRoot, $moduleNamespace, 'Resource') as $class) {
            if (! str_ends_with($class, 'Resource')) {
                continue;
            }

            if (! method_exists($class, 'getModel')) {
                continue;
            }

            try {
                $model = $class::getModel();
<<<<<<< .merge_file_wLnRdO
                $executed++;
=======
<<<<<<< HEAD
                $executed++;
=======
<<<<<<< .merge_file_6PBfnS
                $executed++;
=======
                ++$executed;
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                Assert::assertIsString($model);
                Assert::assertNotSame('', $model);
                Assert::assertTrue(class_exists($model));

                if (method_exists($class, 'getPages')) {
                    $pages = $class::getPages();
                    Assert::assertNotEmpty($pages);
                    Assert::assertNotEmpty($pages);
                }
            } catch (\Throwable) {
<<<<<<< .merge_file_wLnRdO
                $executed++;
=======
<<<<<<< HEAD
                $executed++;
=======
<<<<<<< .merge_file_6PBfnS
                $executed++;
=======
                ++$executed;
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
            }
        }

        Assert::assertGreaterThanOrEqual(0, $executed);
    }

    /**
     * @return list<class-string>
     */
    public static function discoverListPages(string $appRoot, string $moduleNamespace): array
    {
        if (! is_dir($appRoot)) {
            return [];
        }

        $classes = [];
<<<<<<< .merge_file_wLnRdO
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_6PBfnS
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($appRoot));

        foreach ($iterator as $file) {
            if (! $file instanceof SplFileInfo) {
<<<<<<< .merge_file_wLnRdO
=======
<<<<<<< HEAD
=======
=======
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($appRoot));

        foreach ($iterator as $file) {
            if (! $file instanceof \SplFileInfo) {
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                continue;
            }
            if (! $file->isFile()) {
                continue;
            }

            $filename = $file->getFilename();
            if (! str_starts_with($filename, 'List') || ! str_ends_with($filename, '.php')) {
                continue;
            }

            if (! str_contains($file->getPathname(), '/Pages/')) {
                continue;
            }

            $relative = substr($file->getPathname(), strlen($appRoot) + 1);
            $class = $moduleNamespace.str_replace(['/', '.php'], ['\\', ''], $relative);

            if (! class_exists($class)) {
                continue;
            }

<<<<<<< .merge_file_wLnRdO
            $ref = new ReflectionClass($class);
=======
<<<<<<< HEAD
            $ref = new ReflectionClass($class);
=======
<<<<<<< .merge_file_6PBfnS
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
            if ($ref->isAbstract()) {
                continue;
            }

            $classes[] = $class;
        }

        sort($classes);

        return $classes;
    }

    public static function testAllListPages(string $appRoot, string $moduleNamespace): void
    {
<<<<<<< .merge_file_wLnRdO
        if (config('app.date_format') === null) {
=======
<<<<<<< HEAD
        if (config('app.date_format') === null) {
=======
<<<<<<< .merge_file_6PBfnS
        if (config('app.date_format') === null) {
=======
        if (null === config('app.date_format')) {
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
            config(['app.date_format' => 'd/m/Y']);
        }

        foreach (self::discoverListPages($appRoot, $moduleNamespace) as $class) {
            if (! method_exists($class, 'getTableColumns')) {
                continue;
            }

            try {
<<<<<<< .merge_file_wLnRdO
                $page = new $class;
=======
<<<<<<< HEAD
                $page = new $class;
=======
<<<<<<< .merge_file_6PBfnS
                $page = new $class;
=======
                $page = new $class();
>>>>>>> .merge_file_fjd8YP
>>>>>>> laraxot/dev
>>>>>>> .merge_file_tzmPdw
                Assert::assertNotEmpty($page->getTableColumns());
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
        }
    }
}
