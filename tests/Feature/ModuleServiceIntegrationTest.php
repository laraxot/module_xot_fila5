<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Modules\Xot\Services\ModuleService;

describe('ModuleService Integration', function () {
    beforeEach(function () {
        $this->service = new ModuleService('Xot');
    });

    it('integrates with Nwidart Modules system', function () {
        expect(class_exists('Nwidart\Modules\Facades\Module'))
            ->toBeTrue()
            ->and(class_exists('Nwidart\Modules\Module'))
            ->toBeTrue();
    });

    it('can find existing modules', function () {
        // Test with known existing modules
        $chartService = new ModuleService('Chart');
        $userService = new ModuleService('User');
        $xotService = new ModuleService('Xot');

        expect($chartService)
            ->toBeInstanceOf(ModuleService::class)
            ->and($userService)
            ->toBeInstanceOf(ModuleService::class)
            ->and($xotService)
            ->toBeInstanceOf(ModuleService::class);
    });

    it('returns models from existing modules', function () {
        // Test with Chart module (we know it exists)
        $chartService = new ModuleService('Chart');
        $models = $chartService->getModels();

        expect($models)->toBeArray();

        // Should contain Chart model
        $hasChartModel = false;
        foreach ($models as $key => $modelClass) {
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Model\GetAllModelsByModuleNameAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(TestCase::class);

describe('GetAllModelsByModuleNameAction Integration', function () {
    it('integrates with Nwidart Modules system', function () {
        Assert::assertTrue(class_exists('Nwidart\Modules\Facades\Module'));
        Assert::assertTrue(class_exists('Nwidart\Modules\Module'));
    });

    it('can find existing modules', function () {
        $action = app(GetAllModelsByModuleNameAction::class);

        Assert::assertInstanceOf(GetAllModelsByModuleNameAction::class, $action);
    });

    it('returns models from existing modules', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Chart');

        $hasChartModel = false;
        foreach ($models as $modelClass) {
>>>>>>> c7fd73eb (.)
            if (str_contains($modelClass, 'Chart\\Models\\Chart')) {
                $hasChartModel = true;
                break;
            }
        }

<<<<<<< HEAD
        expect($hasChartModel)->toBeTrue();
    });

    it('handles User module models correctly', function () {
        $userService = new ModuleService('User');
        $models = $userService->getModels();

        expect($models)->toBeArray();

        // Check for common User module models
        $modelClasses = array_values($models);
        $hasUserModels = false;

        foreach ($modelClasses as $modelClass) {
=======
        Assert::assertTrue($hasChartModel);
    });

    it('handles User module models correctly', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('User');

        $hasUserModels = false;
        foreach (array_values($models) as $modelClass) {
>>>>>>> c7fd73eb (.)
            if (str_contains($modelClass, 'User\\Models\\')) {
                $hasUserModels = true;
                break;
            }
        }

<<<<<<< HEAD
        expect($hasUserModels)->toBeTrue();
    });

    it('filters abstract models correctly', function () {
        $models = $this->service->getModels();

        // BaseModel should not be included (it's abstract)
        $modelNames = array_keys($models);
        expect($modelNames)->not->toContain('base_model');
    });

    it('returns class strings as values', function () {
        $models = $this->service->getModels();

        foreach ($models as $key => $modelClass) {
            expect($key)
                ->toBeString()
                ->and($modelClass)
                ->toBeString()
                ->and(str_contains($modelClass, 'Modules\\'))
                ->toBeTrue();
=======
        Assert::assertTrue($hasUserModels);
    });

    it('filters abstract models correctly', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        // BaseModel should not be included (it's abstract)
        $modelNames = array_keys($models);
        Assert::assertStringNotContainsString('base_model', implode(',', $modelNames));
    });

    it('returns class strings as keys and values', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        foreach ($models as $key => $modelClass) {
            Assert::assertIsString($key);
            Assert::assertIsString($modelClass);
            Assert::assertTrue(str_contains($modelClass, 'Modules\\'));
>>>>>>> c7fd73eb (.)
        }
    });

    it('handles reflection operations safely', function () {
<<<<<<< HEAD
        // Test that reflection operations don't cause crashes
        $models = $this->service->getModels();

        // Test each returned model class
        foreach ($models as $modelClass) {
            expect(class_exists($modelClass) || interface_exists($modelClass))->toBeTrue();
        }
    });

    it('processes module directory structure', function () {
        // Test that the service can process module directories
        $models = $this->service->getModels();

        expect($models)->toBeArray();
    });

    it('handles snake_case conversion correctly', function () {
        // Test string conversion logic
        $testString = 'TestModelName';
        $snakeCase = Str::snake($testString);

        expect($snakeCase)->toBe('test_model_name');
    });

    it('integrates with Laravel filesystem', function () {
        // Test filesystem operations
        expect(class_exists('Illuminate\Support\Facades\File'))->toBeTrue();
    });

    it('can handle multiple module instances', function () {
        $services = [
            new ModuleService('Chart'),
            new ModuleService('User'),
            new ModuleService('Xot'),
            new ModuleService('Job'),
        ];

        foreach ($services as $service) {
            expect($service)->toBeInstanceOf(ModuleService::class);
            $models = $service->getModels();
            expect($models)->toBeArray();
        }
    });

    it('validates module existence checking', function () {
        // Test with non-existent module
        $nonExistentService = new ModuleService('NonExistentModule');
        $models = $nonExistentService->getModels();

        expect($models)->toBeArray()->and($models)->toBeEmpty();
    });

    it('handles namespace construction correctly', function () {
        // Test namespace building logic
        $chartService = new ModuleService('Chart');
        $models = $chartService->getModels();

        foreach ($models as $modelClass) {
            expect($modelClass)->toContain('Modules\\Chart\\');
        }
    });

    it('processes file extensions correctly', function () {
        // Test that only .php files are processed
        $models = $this->service->getModels();

        // All returned classes should be valid PHP classes
        foreach ($models as $modelClass) {
            expect(is_string($modelClass))->toBeTrue()->and(strlen($modelClass))->toBeGreaterThan(0);
        }
    });

    it('handles exception scenarios gracefully', function () {
        // Test various edge cases that might cause exceptions
        $edgeCaseServices = [
            new ModuleService(''),
            new ModuleService('InvalidModule'),
            new ModuleService('Test123'),
        ];

        foreach ($edgeCaseServices as $service) {
            expect($service->getModels(...))->not->toThrow(Exception::class);
=======
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        foreach ($models as $modelClass) {
            Assert::assertTrue(class_exists($modelClass) || interface_exists($modelClass));
        }
    });

    it('handles snake_case conversion correctly', function () {
        $snakeCase = Str::snake('TestModelName');

        Assert::assertSame('test_model_name', $snakeCase);
    });

    it('integrates with Laravel filesystem', function () {
        Assert::assertTrue(class_exists('Illuminate\Support\Facades\File'));
    });

    it('can handle multiple module names', function () {
        $action = app(GetAllModelsByModuleNameAction::class);

        foreach (['Chart', 'User', 'Xot', 'Job'] as $moduleName) {
            $models = $action->execute($moduleName);
            Assert::assertIsArray($models);
        }
    });

    it('returns an empty array for a non-existent module', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('NonExistentModule');

        Assert::assertEmpty($models);
    });

    it('handles namespace construction correctly', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Chart');

        foreach ($models as $modelClass) {
            Assert::assertStringContainsString('Modules\\Chart\\', $modelClass);
        }
    });

    it('handles edge case module names gracefully', function () {
        $action = app(GetAllModelsByModuleNameAction::class);

        foreach (['', 'InvalidModule', 'Test123'] as $moduleName) {
            Assert::assertIsArray($action->execute($moduleName));
>>>>>>> c7fd73eb (.)
        }
    });

    it('validates return type consistency', function () {
<<<<<<< HEAD
        $models = $this->service->getModels();

        expect($models)->toBeArray();

        // Validate that all keys are strings and all values are class strings
        foreach ($models as $key => $value) {
            expect($key)
                ->toBeString()
                ->and($value)
                ->toBeString()
                ->and(strlen($key))
                ->toBeGreaterThan(0)
                ->and(strlen($value))
                ->toBeGreaterThan(0);
        }
    });

    it('can work with Laravel service container', function () {
        // Test service container integration
        $serviceFromContainer = app(ModuleService::class, ['name' => 'TestModule']);

        expect($serviceFromContainer)->toBeInstanceOf(ModuleService::class);
    });

    it('handles concurrent access correctly', function () {
        // Test multiple simultaneous calls
        $results = [];
        for ($i = 0; $i < 3; $i++) {
            $service = new ModuleService('Xot');
            $results[] = $service->getModels();
        }

        // All results should be consistent
        expect($results[0])->toBe($results[1])->and($results[1])->toBe($results[2]);
    });

    it('validates module path resolution', function () {
        // Test that module paths are resolved correctly
        $models = $this->service->getModels();

        foreach ($models as $modelClass) {
            // Each model class should follow the correct namespace pattern
            expect($modelClass)->toMatch('/^Modules\\\\[A-Za-z]+\\\\Models\\\\[A-Za-z]+$/');
        }
    });

    it('handles file system operations safely', function () {
        // Test file system operations
        $models = $this->service->getModels();

        // Should not cause file system errors
        expect($models)->toBeArray();
    });

    it('integrates with Laravel string helpers', function () {
        // Test string helper integration
        expect(class_exists('Illuminate\Support\Str'))->toBeTrue();

        $testStudly = Str::studly('test_string');
        expect($testStudly)->toBe('TestString');
    });

    it('validates class instantiation patterns', function () {
        // Test that the service follows proper instantiation patterns
        $reflection = new ReflectionClass($this->service);
        $constructor = $reflection->getConstructor();

        expect($constructor)->not->toBeNull()->and($constructor->isPublic())->toBeTrue();
    });

    it('can handle model discovery efficiently', function () {
        // Test performance of model discovery
        $startTime = microtime(true);

        $models = $this->service->getModels();

        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;

        expect($models)->toBeArray()->and($executionTime)->toBeLessThan(5.0); // Should complete within 5 seconds
=======
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        foreach ($models as $key => $value) {
            Assert::assertIsString($key);
            Assert::assertIsString($value);
            Assert::assertGreaterThan(0, strlen($key));
            Assert::assertGreaterThan(0, strlen($value));
        }
    });

    it('can be resolved from the Laravel service container', function () {
        $action = app(GetAllModelsByModuleNameAction::class);

        Assert::assertInstanceOf(GetAllModelsByModuleNameAction::class, $action);
    });

    it('returns consistent results across repeated calls', function () {
        $action = app(GetAllModelsByModuleNameAction::class);
        $results = [
            $action->execute('Xot'),
            $action->execute('Xot'),
            $action->execute('Xot'),
        ];

        Assert::assertSame($results[0], $results[1]);
        Assert::assertSame($results[0], $results[2]);
    });

    it('validates module path resolution', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        foreach ($models as $modelClass) {
            Assert::assertMatchesRegularExpression('/^Modules\\\\[A-Za-z]+\\\\Models\\\\[A-Za-z]+$/', $modelClass);
        }
    });

    it('integrates with Laravel string helpers', function () {
        Assert::assertTrue(class_exists('Illuminate\Support\Str'));
        Assert::assertSame('TestString', Str::studly('test_string'));
    });

    it('uses the QueueableAction trait for sync/async execution', function () {
        Assert::assertContains(
            \Spatie\QueueableAction\QueueableAction::class,
            class_uses(GetAllModelsByModuleNameAction::class),
        );
    });

    it('can discover models within a time budget', function () {
        $startTime = microtime(true);

        app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        $executionTime = microtime(true) - $startTime;

        Assert::assertLessThan(5.0, $executionTime);
>>>>>>> c7fd73eb (.)
    });
});
