<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Model\GetAllModelsByModuleNameAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(TestCase::class);

describe('GetAllModelsByModuleNameAction Integration', function () {
=======
uses(Modules\Xot\Tests\TestCase::class);

use Illuminate\Support\Str;
use Modules\Xot\Actions\Model\GetAllModelsByModuleNameAction;
use PHPUnit\Framework\Assert;

describe('GetAllModelsByModuleNameAction integration', function () {
>>>>>>> laraxot/dev
    it('integrates with Nwidart Modules system', function () {
        Assert::assertTrue(class_exists('Nwidart\Modules\Facades\Module'));
        Assert::assertTrue(class_exists('Nwidart\Modules\Module'));
    });

<<<<<<< HEAD
    it('can find existing modules', function () {
        $action = app(GetAllModelsByModuleNameAction::class);

        Assert::assertInstanceOf(GetAllModelsByModuleNameAction::class, $action);
    });

    it('returns models from existing modules', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Chart');

        $hasChartModel = false;
        foreach ($models as $modelClass) {
            if (str_contains($modelClass, 'Chart\\Models\\Chart')) {
                $hasChartModel = true;
                break;
            }
        }

        Assert::assertTrue($hasChartModel);
    });

    it('handles User module models correctly', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('User');

        $hasUserModels = false;
        foreach (array_values($models) as $modelClass) {
=======
    it('returns models from existing modules', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('User');

        $hasUserModels = false;
        foreach ($models as $modelClass) {
>>>>>>> laraxot/dev
            if (str_contains($modelClass, 'User\\Models\\')) {
                $hasUserModels = true;
                break;
            }
        }

        Assert::assertTrue($hasUserModels);
    });

<<<<<<< HEAD
    it('filters abstract models correctly', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        // BaseModel should not be included (it's abstract)
        $modelNames = array_keys($models);
        Assert::assertStringNotContainsString('base_model', implode(',', $modelNames));
    });

    it('returns class strings as keys and values', function () {
=======
    it('filters abstract models', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        Assert::assertStringNotContainsString('base_model', implode(',', array_keys($models)));
    });

    it('returns class strings as values', function () {
>>>>>>> laraxot/dev
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        foreach ($models as $key => $modelClass) {
            Assert::assertIsString($key);
            Assert::assertIsString($modelClass);
            Assert::assertTrue(str_contains($modelClass, 'Modules\\'));
        }
    });

<<<<<<< HEAD
    it('handles reflection operations safely', function () {
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
        }
    });

    it('validates return type consistency', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        foreach ($models as $key => $value) {
            Assert::assertIsString($key);
            Assert::assertIsString($value);
            Assert::assertGreaterThan(0, strlen($key));
            Assert::assertGreaterThan(0, strlen($value));
        }
    });

    it('can be resolved from the Laravel service container', function () {
=======
    it('returns empty array for unknown module', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('NonExistentModule');

        Assert::assertSame([], $models);
    });

    it('handles snake_case conversion', function () {
        Assert::assertSame('test_model_name', Str::snake('TestModelName'));
    });

    it('resolves via service container', function () {
>>>>>>> laraxot/dev
        $action = app(GetAllModelsByModuleNameAction::class);

        Assert::assertInstanceOf(GetAllModelsByModuleNameAction::class, $action);
    });

<<<<<<< HEAD
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
=======
    it('returns consistent results on repeated calls', function () {
        $action = app(GetAllModelsByModuleNameAction::class);
        $first = $action->execute('Xot');
        $second = $action->execute('Xot');

        Assert::assertSame($first, $second);
>>>>>>> laraxot/dev
    });
});
