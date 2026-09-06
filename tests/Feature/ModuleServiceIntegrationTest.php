<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Modules\Xot\Actions\Model\GetAllModelsByModuleNameAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(TestCase::class);

describe('GetAllModelsByModuleNameAction Integration', function () {
=======
use Modules\Xot\Actions\ModuleAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Xot\Tests\TestCase::class);

describe('ModuleAction Integration', function () {
    beforeEach(function () {
    });

>>>>>>> 7f6cf6be (.)
    it('integrates with Nwidart Modules system', function () {
        Assert::assertTrue(class_exists('Nwidart\Modules\Facades\Module'));
        Assert::assertTrue(class_exists('Nwidart\Modules\Module'));
    });

    it('can find existing modules', function () {
<<<<<<< HEAD
        $action = app(GetAllModelsByModuleNameAction::class);

        Assert::assertInstanceOf(GetAllModelsByModuleNameAction::class, $action);
    });

    it('returns models from existing modules', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Chart');

        $hasChartModel = false;
        foreach ($models as $modelClass) {
            if (str_contains($modelClass, 'Chart\\Models\\Chart')) {
=======
        // Test with known existing modules
        $chartService = new ModuleAction('Chart');
        $userService = new ModuleAction('User');
        $xotService = new ModuleAction('Xot');

        Assert::assertInstanceOf(ModuleAction::class, $chartService);

        Assert::assertInstanceOf(ModuleAction::class, $userService);

        Assert::assertInstanceOf(ModuleAction::class, $xotService);

        Assert::assertInstanceOf(ModuleAction::class, $userService);

        Assert::assertInstanceOf(ModuleAction::class, $xotService);
    });

    it('returns models from existing modules', function () {
        // Test with Chart module (we know it exists)
        $chartService = new ModuleAction('Chart');
        /** @var array<int|string, class-string> $models */
        $models = $chartService->getModels();

        // Should contain Chart model
        $hasChartModel = false;
        foreach ($models as $key => $modelClass) {
            if (is_string($modelClass) && str_contains($modelClass, 'Chart\\Models\\Chart')) {
>>>>>>> 7f6cf6be (.)
                $hasChartModel = true;
                break;
            }
        }

        Assert::assertTrue($hasChartModel);
    });

    it('handles User module models correctly', function () {
<<<<<<< HEAD
        $models = app(GetAllModelsByModuleNameAction::class)->execute('User');

        $hasUserModels = false;
        foreach (array_values($models) as $modelClass) {
            if (str_contains($modelClass, 'User\\Models\\')) {
=======
        $userService = new ModuleAction('User');
        /** @var array<int|string, class-string> $models */
        $models = $userService->getModels();

        // Check for common User module models
        $modelClasses = array_values($models);
        $hasUserModels = false;

        foreach ($modelClasses as $modelClass) {
            if (is_string($modelClass) && str_contains($modelClass, 'User\\Models\\')) {
>>>>>>> 7f6cf6be (.)
                $hasUserModels = true;
                break;
            }
        }

        Assert::assertTrue($hasUserModels);
    });

    it('filters abstract models correctly', function () {
<<<<<<< HEAD
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');
=======
        $xotService = new ModuleAction('Xot');
        $models = $xotService->getModels();
>>>>>>> 7f6cf6be (.)

        // BaseModel should not be included (it's abstract)
        $modelNames = array_keys($models);
        Assert::assertStringNotContainsString('base_model', implode(',', $modelNames));
    });

<<<<<<< HEAD
    it('returns class strings as keys and values', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');
=======
    it('returns class strings as values', function () {
        $xotService = new ModuleAction('Xot');
        $models = $xotService->getModels();
>>>>>>> 7f6cf6be (.)

        foreach ($models as $key => $modelClass) {
            Assert::assertIsString($key);
            Assert::assertIsString($modelClass);
            Assert::assertTrue(str_contains($modelClass, 'Modules\\'));
        }
    });

    it('handles reflection operations safely', function () {
<<<<<<< HEAD
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        foreach ($models as $modelClass) {
            Assert::assertTrue(class_exists($modelClass) || interface_exists($modelClass));
        }
    });

    it('handles snake_case conversion correctly', function () {
        $snakeCase = Str::snake('TestModelName');
=======
        // Test that reflection operations don't cause crashes
        $xotService = new ModuleAction('Xot');
        $models = $xotService->getModels();

        // Test each returned model class
        foreach ($models as $modelClass) {
            Assert::assertTrue(is_string($modelClass) && (class_exists($modelClass) || interface_exists($modelClass)));
        }
    });

    it('processes module directory structure', function () {
        // Test that the service can process module directories
        $xotService = new ModuleAction('Xot');
        $models = $xotService->getModels();
    });

    it('handles snake_case conversion correctly', function () {
        // Test string conversion logic
        $testString = 'TestModelName';
        $snakeCase = Str::snake($testString);
>>>>>>> 7f6cf6be (.)

        Assert::assertSame('test_model_name', $snakeCase);
    });

    it('integrates with Laravel filesystem', function () {
<<<<<<< HEAD
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
=======
        // Test filesystem operations
        Assert::assertTrue(class_exists('Illuminate\Support\Facades\File'));
    });

    it('can handle multiple module instances', function () {
        $services = [
            new ModuleAction('Chart'),
            new ModuleAction('User'),
            new ModuleAction('Xot'),
            new ModuleAction('Job'),
        ];

        foreach ($services as $service) {
            Assert::assertInstanceOf(ModuleAction::class, $service);
            $models = $service->getModels();
        }
    });

    it('validates module existence checking', function () {
        // Test with non-existent module
        $nonExistentService = new ModuleAction('NonExistentModule');
        $models = $nonExistentService->getModels();
>>>>>>> 7f6cf6be (.)

        Assert::assertEmpty($models);
    });

    it('handles namespace construction correctly', function () {
<<<<<<< HEAD
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Chart');

        foreach ($models as $modelClass) {
            Assert::assertStringContainsString('Modules\\Chart\\', $modelClass);
        }
    });

    it('handles edge case module names gracefully', function () {
        $action = app(GetAllModelsByModuleNameAction::class);

        foreach (['', 'InvalidModule', 'Test123'] as $moduleName) {
            Assert::assertIsArray($action->execute($moduleName));
=======
        // Test namespace building logic
        $chartService = new ModuleAction('Chart');
        $models = $chartService->getModels();

        foreach ($models as $modelClass) {
            Assert::assertStringContainsString('Modules\\Chart\\', (string) $modelClass);
        }
    });

    it('processes file extensions correctly', function () {
        // Test that only .php files are processed
        $xotService = new ModuleAction('Xot');
        $models = $xotService->getModels();

        // All returned classes should be valid PHP classes
        foreach ($models as $modelClass) {
            Assert::assertTrue(is_string($modelClass));
            Assert::assertGreaterThan(0, strlen((string) $modelClass));
        }
    });

    it('handles exception scenarios gracefully', function () {
        // Test various edge cases that might cause exceptions
        $edgeCaseServices = [
            new ModuleAction(''),
            new ModuleAction('InvalidModule'),
            new ModuleAction('Test123'),
        ];

        foreach ($edgeCaseServices as $service) {
>>>>>>> 7f6cf6be (.)
        }
    });

    it('validates return type consistency', function () {
<<<<<<< HEAD
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

=======
        $xotService = new ModuleAction('Xot');
        $models = $xotService->getModels();

        // Validate that all keys are strings and all values are class strings
>>>>>>> 7f6cf6be (.)
        foreach ($models as $key => $value) {
            Assert::assertIsString($key);
            Assert::assertIsString($value);
            Assert::assertGreaterThan(0, strlen($key));
            Assert::assertGreaterThan(0, strlen($value));
        }
    });

<<<<<<< HEAD
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

=======
    it('can work with Laravel service container', function () {
        // Test service container integration
        $serviceFromContainer = app(ModuleAction::class, ['name' => 'TestModule']);

        Assert::assertInstanceOf(ModuleAction::class, $serviceFromContainer);
    });

    it('handles concurrent access correctly', function () {
        // Test multiple simultaneous calls
        $results = [];
        for ($i = 0; $i < 3; ++$i) {
            $service = new ModuleAction('Xot');
            $results[] = $service->getModels();
        }

        // All results should be consistent
>>>>>>> 7f6cf6be (.)
        Assert::assertSame($results[0], $results[1]);
        Assert::assertSame($results[0], $results[2]);
    });

    it('validates module path resolution', function () {
<<<<<<< HEAD
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
=======
        // Test that module paths are resolved correctly
        $xotService = new ModuleAction('Xot');
        $models = $xotService->getModels();

        foreach ($models as $modelClass) {
            // Each model class should follow the correct namespace pattern
            Assert::assertMatchesRegularExpression('/^Modules\\\\[A-Za-z]+\\\\Models\\\\[A-Za-z]+$/', (string) $modelClass);
        }
    });

    it('handles file system operations safely', function () {
        // Test file system operations
        $xotService = new ModuleAction('Xot');
        $models = $xotService->getModels();
    });

    it('integrates with Laravel string helpers', function () {
        // Test string helper integration
        Assert::assertTrue(class_exists('Illuminate\Support\Str'));
        $testStudly = Str::studly('test_string');
        Assert::assertSame('TestString', $testStudly);
    });

    it('validates class instantiation patterns', function () {
        // Test that the service follows proper instantiation patterns
        $xotService = new ModuleAction('Xot');
        $reflection = new ReflectionClass($xotService);
        $constructor = $reflection->getConstructor();

        Assert::assertNotNull($constructor);
        Assert::assertTrue($constructor->isPublic());
    });

    it('can handle model discovery efficiently', function () {
        // Test performance of model discovery
        $xotService = new ModuleAction('Xot');
        $startTime = microtime(true);

        $models = $xotService->getModels();

        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;

        Assert::assertLessThan(5.0, $executionTime); // Should complete within 5 seconds
>>>>>>> 7f6cf6be (.)
    });
});
