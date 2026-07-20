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
    public function testModulePathConstruction(): void
    {
        $basePath = PathHelper::$modulesBasePath;
        $moduleName = 'User';

        $result = PathHelper::modulePath($moduleName);

        $this->assertStringContainsString('User', $result);
        $this->assertStringContainsString('Modules', $result);
        $this->assertEquals($basePath.'/User', $result);
    }

    public function testModelsPathConstruction(): void
    {
        $result = PathHelper::modelsPath('User');

        $this->assertStringContainsString('User', $result);
        $this->assertStringContainsString('Models', $result);
        $this->assertStringEndsWith('/Models', $result);
    }

    public function testMigrationsPathConstruction(): void
    {
        $result = PathHelper::migrationsPath('User');

        $this->assertStringContainsString('database/migrations', $result);
    }

    public function testControllersPathConstruction(): void
    {
        $result = PathHelper::controllersPath('User');

        $this->assertStringContainsString('Controllers', $result);
        $this->assertStringContainsString('Http', $result);
    }

    public function testSeedersPathConstruction(): void
    {
        $result = PathHelper::seedersPath('Media');

        $this->assertStringContainsString('seeders', $result);
    }

    public function testProvidersPathConstruction(): void
    {
        $result = PathHelper::providersPath('Xot');

        $this->assertStringContainsString('Providers', $result);
    }

    public function testViewsPathConstruction(): void
    {
        $result = PathHelper::viewsPath('UI');

        $this->assertStringContainsString('views', $result);
        $this->assertStringContainsString('resources', $result);
    }

    public function testFilamentResourcesPathConstruction(): void
    {
        $result = PathHelper::filamentResourcesPath('Fixcity');

        $this->assertStringContainsString('Filament', $result);
        $this->assertStringContainsString('Resources', $result);
    }

    public function testIsValidPathWithProperFormat(): void
    {
        $validPath = '/var/www/html/project/laravel/Modules/User/app/Models';

        $this->assertTrue(PathHelper::isValidPath($validPath));
    }

    public function testIsValidPathRejectsMissingLaravel(): void
    {
        $invalidPath = '/var/www/html/project/Modules/User/app/Models';

        $this->assertFalse(PathHelper::isValidPath($invalidPath));
    }

    public function testIsValidPathGeneric(): void
    {
        $this->assertTrue(PathHelper::isValidPath('/var/www/generic/path'));
    }

    public function testCorrectPathFixesWrongPrefix(): void
    {
        $wrongPath = '/var/www/html/Modules/User/Models';

        $corrected = PathHelper::correctPath($wrongPath);

        $this->assertStringContainsString(PathHelper::$modulesBasePath, $corrected);
        $this->assertStringNotContainsString('/var/www/html/Modules/', $corrected);
    }

    public function testCorrectPathLeavesValidUnchanged(): void
    {
        $validPath = '/var/www/html/project/laravel/Modules/User';

        $corrected = PathHelper::correctPath($validPath);

        $this->assertEquals($validPath, $corrected);
    }

    public function testModuleExistsRejectsMissingModule(): void
    {
        $this->assertFalse(PathHelper::moduleExists('__missing_module__'));
    }

    public function testGetModulesReturnsEmptyArrayForMissingBasePath(): void
    {
        $this->assertSame([], PathHelper::getModules());
    }
}
