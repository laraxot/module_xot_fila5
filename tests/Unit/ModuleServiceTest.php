<?php

declare(strict_types=1);

use Modules\Xot\Actions\Model\GetAllModelsByModuleNameAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('gets concrete models for a module through the current action', function (): void {
    $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

    Assert::assertIsArray($models);
    Assert::assertArrayNotHasKey('base_model', $models);

    foreach ($models as $name => $class) {
        Assert::assertIsString($name);
        Assert::assertIsString($class);
    }
});

test('returns no models for an unknown module', function (): void {
    Assert::assertSame([], app(GetAllModelsByModuleNameAction::class)->execute('NonExistentModule'));
});
