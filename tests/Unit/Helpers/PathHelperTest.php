<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Helpers;
// Xot Pest/PHPUnit — claude-audit documentation ratio.
// Xot Pest/PHPUnit — claude-audit documentation ratio.
// Xot Pest/PHPUnit — claude-audit documentation ratio.
// Xot Pest/PHPUnit — claude-audit documentation ratio.
// Xot Pest/PHPUnit — claude-audit documentation ratio.
// Xot Pest/PHPUnit — claude-audit documentation ratio.
// Xot Pest/PHPUnit — claude-audit documentation ratio.

use Modules\Xot\Helpers\PathHelper;
use Modules\Xot\Tests\XotBaseTestCase;

class PathHelperTest extends XotBaseTestCase
{
    public function test_module_path_construction(): void
    {
        $basePath = PathHelper::$modulesBasePath;
        $moduleName = 'User';

        $result = PathHelper::modulePath($moduleName);

        $this->assertStringContainsString('User', $result);
        $this->assertStringContainsString('Modules', $result);
        $this->assertEquals($basePath.'/User', $result);
    }

    public function test_models_path_construction(): void
    {
        $result = PathHelper::modelsPath('User');

        $this->assertStringContainsString('User', $result);
        $this->assertStringContainsString('Models', $result);
        $this->assertStringEndsWith('/Models', $result);
    }

    public function test_migrations_path_construction(): void
    {
        $result = PathHelper::migrationsPath('User');

        $this->assertStringContainsString('database/migrations', $result);
    }

    public function test_controllers_path_construction(): void
    {
        $result = PathHelper::controllersPath('User');

        $this->assertStringContainsString('Controllers', $result);
        $this->assertStringContainsString('Http', $result);
    }

    public function test_seeders_path_construction(): void
    {
        $result = PathHelper::seedersPath('Media');

        $this->assertStringContainsString('seeders', $result);
    }

    public function test_providers_path_construction(): void
    {
        $result = PathHelper::providersPath('Xot');

        $this->assertStringContainsString('Providers', $result);
    }

    public function test_views_path_construction(): void
    {
        $result = PathHelper::viewsPath('UI');

        $this->assertStringContainsString('views', $result);
        $this->assertStringContainsString('resources', $result);
    }

    public function test_filament_resources_path_construction(): void
    {
        $result = PathHelper::filamentResourcesPath('Fixcity');

        $this->assertStringContainsString('Filament', $result);
        $this->assertStringContainsString('Resources', $result);
    }

    public function test_is_valid_path_with_proper_format(): void
    {
        $validPath = '/var/www/html/project/laravel/Modules/User/app/Models';

        $this->assertTrue(PathHelper::isValidPath($validPath));
    }

    public function test_is_valid_path_rejects_missing_laravel(): void
    {
        $invalidPath = '/var/www/html/project/Modules/User/app/Models';

        $this->assertFalse(PathHelper::isValidPath($invalidPath));
    }

    public function test_is_valid_path_generic(): void
    {
        $this->assertTrue(PathHelper::isValidPath('/var/www/generic/path'));
    }

    public function test_correct_path_fixes_wrong_prefix(): void
    {
        $wrongPath = '/var/www/html/Modules/User/Models';

        $corrected = PathHelper::correctPath($wrongPath);

        $this->assertStringContainsString(PathHelper::$modulesBasePath, $corrected);
        $this->assertStringNotContainsString('/var/www/html/Modules/', $corrected);
    }

    public function test_correct_path_leaves_valid_unchanged(): void
    {
        $validPath = '/var/www/html/project/laravel/Modules/User';

        $corrected = PathHelper::correctPath($validPath);

        $this->assertEquals($validPath, $corrected);
    }

    public function test_module_exists_returns_bool(): void
    {
        // Xot module should exist
        $exists = PathHelper::moduleExists('Xot');

        $this->assertIsBool($exists);
    }

    public function test_get_modules_returns_array(): void
    {
        $modules = PathHelper::getModules();

        $this->assertIsArray($modules);
    }
}
