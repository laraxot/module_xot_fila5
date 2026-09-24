<?php

declare(strict_types=1);

use Modules\Xot\Actions\Model\GetAllModelsByModuleNameAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('GetAllModelsByModuleNameAction', function (): void {
    it('returns array of model classes for existing module', function (): void {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('Xot');

        Assert::assertIsArray($models);
        foreach ($models as $key => $class) {
            Assert::assertIsString($key);
            Assert::assertIsString($class);
        }
    });

    it('returns empty array for unknown module', function (): void {
        $models = app(GetAllModelsByModuleNameAction::class)->execute('NonExistentModuleXYZ');

        Assert::assertSame([], $models);
    });
});
