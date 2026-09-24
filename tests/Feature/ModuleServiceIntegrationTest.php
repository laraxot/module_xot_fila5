<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);

use Illuminate\Support\Str;
use Modules\Xot\Actions\Model\GetAllModelsByModuleNameAction;
use PHPUnit\Framework\Assert;

describe('GetAllModelsByModuleNameAction integration', function () {
    it('integrates with Nwidart Modules system', function () {
        Assert::assertTrue(class_exists('Nwidart\Modules\Facades\Module'));
        Assert::assertTrue(class_exists('Nwidart\Modules\Module'));
    });

    it('returns models from existing modules', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('User');

        $hasUserModels = false;
        foreach ($models as $modelClass) {
            if (str_contains($modelClass, 'User\\Models\\')) {
                $hasUserModels = true;
                break;
            }
        }

        Assert::assertTrue($hasUserModels);
    });

    it('filters abstract models', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        Assert::assertStringNotContainsString('base_model', implode(',', array_keys($models)));
    });

    it('returns class strings as values', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        foreach ($models as $key => $modelClass) {
            Assert::assertIsString($key);
            Assert::assertIsString($modelClass);
            Assert::assertTrue(str_contains($modelClass, 'Modules\\'));
        }
    });

    it('returns empty array for unknown module', function () {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('NonExistentModule');

        Assert::assertSame([], $models);
    });

    it('handles snake_case conversion', function () {
        Assert::assertSame('test_model_name', Str::snake('TestModelName'));
    });

    it('resolves via service container', function () {
        $action = app(GetAllModelsByModuleNameAction::class);

        Assert::assertInstanceOf(GetAllModelsByModuleNameAction::class, $action);
    });

    it('returns consistent results on repeated calls', function () {
        $action = app(GetAllModelsByModuleNameAction::class);
        $first = $action->execute('Xot');
        $second = $action->execute('Xot');

        Assert::assertSame($first, $second);
    });
});
