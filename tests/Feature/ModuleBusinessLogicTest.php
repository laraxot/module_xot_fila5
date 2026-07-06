<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature;

use Illuminate\Database\QueryException;
use Modules\Xot\Models\Module;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class);

it('can create module', function () {
    // Arrange
    $moduleData = [
        'name' => 'TestModule',
        'slug' => 'test-module',
        'version' => '1.0.0',
        'description' => 'Test module for testing',
        'enabled' => true,
    ];

    // Act
    $module = Module::create($moduleData);

    // Assert
    $this->assertDatabaseHas('modules', [
        'id' => $module->id,
        'name' => 'TestModule',
        'slug' => 'test-module',
        'version' => '1.0.0',
        'enabled' => true,
    ], 'sushi');

    $this->assertEquals('TestModule', $module->name);
    $this->assertEquals('test-module', $module->slug);
    $this->assertEquals('1.0.0', $module->version);
    $this->assertTrue($module->enabled);
});

it('can enable and disable module', function () {
    // Arrange
    $module = Module::factory()->create(['enabled' => false]);

    // Act - Enable module
    $module->update(['enabled' => true]);

    // Assert
    $this->assertTrue($module->fresh()->enabled);

    // Act - Disable module
    $module->update(['enabled' => false]);

    // Assert
    $this->assertFalse($module->fresh()->enabled);
});

it('can update module version', function () {
    // Arrange
    $module = Module::factory()->create(['version' => '1.0.0']);

    // Act
    $module->update(['version' => '2.0.0']);

    // Assert
    $this->assertEquals('2.0.0', $module->fresh()->version);
    $this->assertDatabaseHas('modules', [
        'id' => $module->id,
        'version' => '2.0.0',
    ], 'sushi');
});

it('can manage module dependencies', function () {
    // Arrange
    $module = Module::factory()->create([
        'dependencies' => ['user', 'auth'],
    ]);

    // Act
    $dependencies = $module->dependencies;

    // Assert
    $this->assertIsArray($dependencies);
    $this->assertContains('user', $dependencies);
    $this->assertContains('auth', $dependencies);
    $this->assertCount(2, $dependencies);
});

it('can validate module slug uniqueness', function () {
    // Arrange
    Module::factory()->create(['slug' => 'unique-module']);

    // Act & Assert - Try to create module with same slug
    $this->expectException(QueryException::class);

    Module::create([
        'name' => 'Another Module',
        'slug' => 'unique-module', // Same slug
        'version' => '1.0.0',
        'enabled' => true,
    ]);
});

it('can manage module configuration', function () {
    // Arrange
    $config = [
        'setting1' => 'value1',
        'setting2' => 'value2',
        'nested' => [
            'key' => 'value',
        ],
    ];

    $module = Module::factory()->create(['config' => $config]);

    // Act
    $moduleConfig = $module->config;

    // Assert
    $this->assertIsArray($moduleConfig);
    $this->assertEquals('value1', $moduleConfig['setting1']);
    $this->assertEquals('value2', $moduleConfig['setting2']);
    $this->assertEquals('value', $moduleConfig['nested']['key']);
});

it('can check module status', function () {
    // Arrange
    $enabledModule = Module::factory()->create(['enabled' => true]);
    $disabledModule = Module::factory()->create(['enabled' => false]);

    // Act & Assert
    $this->assertTrue($enabledModule->isEnabled());
    $this->assertFalse($disabledModule->isEnabled());
    $this->assertFalse($enabledModule->isDisabled());
    $this->assertTrue($disabledModule->isDisabled());
});

it('can manage module metadata', function () {
    // Arrange
    $metadata = [
        'author' => 'Test Author',
        'website' => 'https://example.com',
        'license' => 'MIT',
        'tags' => ['test', 'example'],
    ];

    $module = Module::factory()->create(['metadata' => $metadata]);

    // Act
    $moduleMetadata = $module->metadata;

    // Assert
    $this->assertIsArray($moduleMetadata);
    $this->assertEquals('Test Author', $moduleMetadata['author']);
    $this->assertEquals('https://example.com', $moduleMetadata['website']);
    $this->assertEquals('MIT', $moduleMetadata['license']);
    $this->assertContains('test', $moduleMetadata['tags']);
    $this->assertContains('example', $moduleMetadata['tags']);
});

it('can validate module version format', function () {
    // Arrange
    $validVersions = ['1.0.0', '2.1.3', '10.5.2', '0.1.0'];

    foreach ($validVersions as $version) {
        // Act
        $module = Module::factory()->create(['version' => $version]);

        // Assert
        $this->assertEquals($version, $module->version);
        $this->assertDatabaseHas('modules', [
            'id' => $module->id,
            'version' => $version,
        ], 'sushi');
    }
});

it('can manage module installation date', function () {
    // Arrange
    $installationDate = now()->subDays(30);
    $module = Module::factory()->create([
        'installed_at' => $installationDate,
    ]);

    // Act
    $moduleInstalledAt = $module->installed_at;

    // Assert
    $this->assertEquals($installationDate, $moduleInstalledAt);
    $this->assertDatabaseHas('modules', [
        'id' => $module->id,
        'installed_at' => $installationDate,
    ], 'sushi');
});

it('can manage module update history', function () {
    // Arrange
    $updateHistory = [
        [
            'version' => '1.0.0',
            'date' => '2024-01-01',
            'changes' => 'Initial release',
        ],
        [
            'version' => '1.1.0',
            'date' => '2024-02-01',
            'changes' => 'Bug fixes and improvements',
        ],
    ];

    $module = Module::factory()->create(['update_history' => $updateHistory]);

    // Act
    $moduleUpdateHistory = $module->update_history;

    // Assert
    $this->assertIsArray($moduleUpdateHistory);
    $this->assertCount(2, $moduleUpdateHistory);
    $this->assertEquals('1.0.0', $moduleUpdateHistory[0]['version']);
    $this->assertEquals('Initial release', $moduleUpdateHistory[0]['changes']);
    $this->assertEquals('1.1.0', $moduleUpdateHistory[1]['version']);
    $this->assertEquals('Bug fixes and improvements', $moduleUpdateHistory[1]['changes']);
});

it('can check module compatibility', function () {
    // Arrange
    $module = Module::factory()->create([
        'laravel_version' => '^10.0',
        'php_version' => '^8.1',
    ]);

    // Act
    $laravelVersion = $module->laravel_version;
    $phpVersion = $module->php_version;

    // Assert
    $this->assertEquals('^10.0', $laravelVersion);
    $this->assertEquals('^8.1', $phpVersion);
});

it('can manage module permissions', function () {
    // Arrange
    $permissions = [
        'module.read',
        'module.write',
        'module.delete',
    ];

    $module = Module::factory()->create(['permissions' => $permissions]);

    // Act
    $modulePermissions = $module->permissions;

    // Assert
    $this->assertIsArray($modulePermissions);
    $this->assertContains('module.read', $modulePermissions);
    $this->assertContains('module.write', $modulePermissions);
    $this->assertContains('module.delete', $modulePermissions);
    $this->assertCount(3, $modulePermissions);
});

it('can manage module routes', function () {
    // Arrange
    $routes = [
        'web' => ['prefix' => 'module', 'middleware' => ['web']],
        'api' => ['prefix' => 'api/module', 'middleware' => ['api']],
    ];

    $module = Module::factory()->create(['routes' => $routes]);

    // Act
    $moduleRoutes = $module->routes;

    // Assert
    $this->assertIsArray($moduleRoutes);
    $this->assertArrayHasKey('web', $moduleRoutes);
    $this->assertArrayHasKey('api', $moduleRoutes);
    $this->assertEquals('module', $moduleRoutes['web']['prefix']);
    $this->assertEquals('api/module', $moduleRoutes['api']['prefix']);
});

it('can manage module assets', function () {
    // Arrange
    $assets = [
        'css' => ['app.css', 'vendor.css'],
        'js' => ['app.js', 'vendor.js'],
        'images' => ['logo.png', 'icon.svg'],
    ];

    $module = Module::factory()->create(['assets' => $assets]);

    // Act
    $moduleAssets = $module->assets;

    // Assert
    $this->assertIsArray($moduleAssets);
    $this->assertArrayHasKey('css', $moduleAssets);
    $this->assertArrayHasKey('js', $moduleAssets);
    $this->assertArrayHasKey('images', $moduleAssets);
    $this->assertContains('app.css', $moduleAssets['css']);
    $this->assertContains('app.js', $moduleAssets['js']);
    $this->assertContains('logo.png', $moduleAssets['images']);
});

it('can manage module settings', function () {
    // Arrange
    $settings = [
        'debug' => false,
        'cache' => true,
        'timeout' => 30,
        'features' => ['feature1', 'feature2'],
    ];

    $module = Module::factory()->create(['settings' => $settings]);

    // Act
    $moduleSettings = $module->settings;

    // Assert
    $this->assertIsArray($moduleSettings);
    $this->assertFalse($moduleSettings['debug']);
    $this->assertTrue($moduleSettings['cache']);
    $this->assertEquals(30, $moduleSettings['timeout']);
    $this->assertContains('feature1', $moduleSettings['features']);
    $this->assertContains('feature2', $moduleSettings['features']);
});

it('can validate module required fields', function () {
    // Arrange
    $requiredFields = ['name', 'slug', 'version'];

    foreach ($requiredFields as $field) {
        $moduleData = [
            'name' => 'Test Module',
            'slug' => 'test-module',
            'version' => '1.0.0',
            'enabled' => true,
        ];

        // Remove required field
        unset($moduleData[$field]);

        // Act & Assert
        try {
            Module::create($moduleData);
            $this->fail("Expected QueryException for missing field: $field");
        } catch (QueryException $e) {
            $this->assertTrue(true);
        }
    });

    test('can manage module configuration', function (): void {
        $config = [
            'setting1' => 'value1',
            'setting2' => 'value2',
            'nested' => [
                'key' => 'value',
            ],
        ];

        $module = ModuleFactory::new()->createOne(['config' => $config]);

        /** @var array{setting1: string, setting2: string, nested: array{key: string}} $moduleConfig */
        $moduleConfig = $module->getAttribute('config');

        Assert::assertIsArray($moduleConfig);
        Assert::assertEquals('value1', $moduleConfig['setting1']);
        Assert::assertEquals('value2', $moduleConfig['setting2']);
        Assert::assertEquals('value', $moduleConfig['nested']['key']);
    });

    test('can check module status', function (): void {
        $enabledModule = ModuleFactory::new()->createOne(['enabled' => true]);
        $disabledModule = ModuleFactory::new()->createOne(['enabled' => false]);

        Assert::assertTrue((bool) $enabledModule->enabled);
        Assert::assertFalse((bool) $disabledModule->enabled);
        Assert::assertTrue($enabledModule->enabled === true);
        Assert::assertTrue($disabledModule->enabled === false);
    });

    test('can manage module metadata', function (): void {
        $metadata = [
            'author' => 'Test Author',
            'website' => 'https://example.com',
            'license' => 'MIT',
            'tags' => ['test', 'example'],
        ];

        $module = ModuleFactory::new()->createOne(['metadata' => $metadata]);

        /** @var array{author: string, website: string, license: string, tags: string[]} $moduleMetadata */
        $moduleMetadata = $module->getAttribute('metadata');

        Assert::assertIsArray($moduleMetadata);
        Assert::assertEquals('Test Author', $moduleMetadata['author']);
        Assert::assertEquals('https://example.com', $moduleMetadata['website']);
        Assert::assertEquals('MIT', $moduleMetadata['license']);
        Assert::assertContains('test', $moduleMetadata['tags']);
        Assert::assertContains('example', $moduleMetadata['tags']);
    });

    test('can validate module version format', function (): void {
        $validVersions = ['1.0.0', '2.1.3', '10.5.2', '0.1.0'];

        foreach ($validVersions as $version) {
            $module = ModuleFactory::new()->createOne(['version' => $version]);

            Assert::assertEquals($version, $module->version);
            $this->assertDatabaseHasRow('modules', [
                'id' => $module->id,
                'version' => $version,
            ], 'sushi');
        }
    });

    test('can manage module installation date', function (): void {
        $installationDate = now()->subDays(30);
        $module = ModuleFactory::new()->createOne([
            'installation_date' => $installationDate,
        ]);

        $moduleInstalledAt = $module->installation_date;

        Assert::assertEquals($installationDate, $moduleInstalledAt);
        $this->assertDatabaseHasRow('modules', [
            'id' => $module->id,
            'installation_date' => $installationDate,
        ], 'sushi');
    });

    test('can manage module update history', function (): void {
        $updateHistory = [
            [
                'version' => '1.0.0',
                'date' => '2024-01-01',
                'changes' => 'Initial release',
            ],
            [
                'version' => '1.1.0',
                'date' => '2024-02-01',
                'changes' => 'Bug fixes and improvements',
            ],
        ];

        $module = ModuleFactory::new()->createOne(['update_history' => $updateHistory]);

        /** @var array<int, array{version: string, date: string, changes: string}> $moduleUpdateHistory */
        $moduleUpdateHistory = $module->getAttribute('update_history');

        Assert::assertIsArray($moduleUpdateHistory);
        Assert::assertCount(2, $moduleUpdateHistory);
        Assert::assertEquals('1.0.0', $moduleUpdateHistory[0]['version']);
        Assert::assertEquals('Initial release', $moduleUpdateHistory[0]['changes']);
        Assert::assertEquals('1.1.0', $moduleUpdateHistory[1]['version']);
        Assert::assertEquals('Bug fixes and improvements', $moduleUpdateHistory[1]['changes']);
    });

    test('can check module compatibility', function (): void {
        $module = ModuleFactory::new()->createOne([
            'laravel_version' => '^10.0',
            'php_version' => '^8.1',
        ]);

        $laravelVersion = $module->getAttribute('laravel_version');
        $phpVersion = $module->getAttribute('php_version');

        Assert::assertEquals('^10.0', $laravelVersion);
        Assert::assertEquals('^8.1', $phpVersion);
    });

    test('can manage module permissions', function (): void {
        $permissions = [
            'module.read',
            'module.write',
            'module.delete',
        ];

        $module = ModuleFactory::new()->createOne(['permissions' => $permissions]);

        /** @var string[] $modulePermissions */
        $modulePermissions = $module->getAttribute('permissions');

        Assert::assertIsArray($modulePermissions);
        Assert::assertContains('module.read', $modulePermissions);
        Assert::assertContains('module.write', $modulePermissions);
        Assert::assertContains('module.delete', $modulePermissions);
        Assert::assertCount(3, $modulePermissions);
    });

    test('can manage module routes', function (): void {
        $routes = [
            'web' => ['prefix' => 'module', 'middleware' => ['web']],
            'api' => ['prefix' => 'api/module', 'middleware' => ['api']],
        ];

        $module = ModuleFactory::new()->createOne(['routes' => $routes]);

        /** @var array<string, array{prefix: string, middleware: string[]}> $moduleRoutes */
        $moduleRoutes = $module->getAttribute('routes');

        Assert::assertIsArray($moduleRoutes);
        Assert::assertArrayHasKey('web', $moduleRoutes);
        Assert::assertArrayHasKey('api', $moduleRoutes);
        Assert::assertEquals('module', $moduleRoutes['web']['prefix']);
        Assert::assertEquals('api/module', $moduleRoutes['api']['prefix']);
    });

    test('can manage module assets', function (): void {
        $assets = [
            'css' => ['app.css', 'vendor.css'],
            'js' => ['app.js', 'vendor.js'],
            'images' => ['logo.png', 'icon.svg'],
        ];

        $module = ModuleFactory::new()->createOne(['assets' => $assets]);

        /** @var array{css: string[], js: string[], images: string[]} $moduleAssets */
        $moduleAssets = $module->getAttribute('assets');

        Assert::assertIsArray($moduleAssets);
        Assert::assertArrayHasKey('css', $moduleAssets);
        Assert::assertArrayHasKey('js', $moduleAssets);
        Assert::assertArrayHasKey('images', $moduleAssets);
        Assert::assertContains('app.css', $moduleAssets['css']);
        Assert::assertContains('app.js', $moduleAssets['js']);
        Assert::assertContains('logo.png', $moduleAssets['images']);
    });

    test('can manage module settings', function (): void {
        $settings = [
            'debug' => false,
            'cache' => true,
            'timeout' => 30,
            'features' => ['feature1', 'feature2'],
        ];

        $module = ModuleFactory::new()->createOne(['settings' => $settings]);

        /** @var array{debug: bool, cache: bool, timeout: int, features: string[]} $moduleSettings */
        $moduleSettings = $module->getAttribute('settings');

        Assert::assertIsArray($moduleSettings);
        Assert::assertFalse($moduleSettings['debug']);
        Assert::assertTrue($moduleSettings['cache']);
        Assert::assertEquals(30, $moduleSettings['timeout']);
        Assert::assertContains('feature1', $moduleSettings['features']);
        Assert::assertContains('feature2', $moduleSettings['features']);
    });

    test('can validate module required fields', function (): void {
        $requiredFields = ['name', 'slug', 'version'];

        foreach ($requiredFields as $field) {
            $moduleData = [
                'name' => 'Test Module',
                'slug' => 'test-module',
                'version' => '1.0.0',
                'enabled' => true,
            ];

            unset($moduleData[$field]);

            try {
                Module::create($moduleData);
                Assert::fail("Expected QueryException for missing field: $field");
            } catch (QueryException $e) {
                Assert::assertInstanceOf(QueryException::class, $e);
            }
        }
    });

    test('can manage module activation workflow', function (): void {
        $module = ModuleFactory::new()->createOne([
            'enabled' => false,
            'activation_date' => null,
        ]);

        $module->update([
            'enabled' => true,
            'activation_date' => now(),
        ]);

        $freshModule = $module->fresh();
        Assert::assertNotNull($freshModule);
        Assert::assertTrue((bool) $freshModule->enabled);
        Assert::assertNotNull($freshModule->activation_date);

        $module->update([
            'enabled' => false,
            'deactivation_date' => now(),
        ]);

        $freshModule = $module->fresh();
        Assert::assertNotNull($freshModule);
        Assert::assertFalse((bool) $freshModule->enabled);
        Assert::assertNotNull($freshModule->deactivation_date);
    });

    test('can track module usage statistics', function (): void {
        $usageStats = [
            'total_requests' => 1000,
            'unique_users' => 150,
            'last_used' => now()->subHours(2),
            'popular_features' => ['feature1', 'feature2'],
        ];

        $module = ModuleFactory::new()->createOne(['usage_statistics' => $usageStats]);

        /** @var array{total_requests: int, unique_users: int, last_used: mixed, popular_features: string[]} $usage_statistics */
        $usage_statistics = $module->getAttribute('usage_statistics');

        Assert::assertIsArray($usage_statistics);
        Assert::assertEquals(1000, $usage_statistics['total_requests']);
        Assert::assertEquals(150, $usage_statistics['unique_users']);
        Assert::assertNotNull($usage_statistics['last_used']);
        Assert::assertContains('feature1', $usage_statistics['popular_features']);
        Assert::assertContains('feature2', $usage_statistics['popular_features']);
    });

    test('can manage module error logging', function (): void {
        $errorLog = [
            [
                'level' => 'error',
                'message' => 'Test error message',
                'timestamp' => now()->subMinutes(5),
                'context' => ['file' => 'test.php', 'line' => 42],
            ],
        ];

        $module = ModuleFactory::new()->createOne(['error_log' => $errorLog]);

        /** @var array<int, array{level: string, message: string, context: array{file: string, line: int}}> $module_error_log */
        $module_error_log = $module->getAttribute('error_log');

        Assert::assertIsArray($module_error_log);
        Assert::assertCount(1, $module_error_log);
        Assert::assertEquals('error', $module_error_log[0]['level']);
        Assert::assertEquals('Test error message', $module_error_log[0]['message']);
        Assert::assertEquals('test.php', $module_error_log[0]['context']['file']);
        Assert::assertEquals(42, $module_error_log[0]['context']['line']);
    });
});
