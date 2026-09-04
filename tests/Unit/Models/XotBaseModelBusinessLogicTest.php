<?php

declare(strict_types=1);

use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

uses(TestCase::class)->group('no-xot-db');

describe('XotBaseModel Business Logic', function (): void {
    test('xot base model provides foundation for other models', function (): void {
        Assert::assertTrue(class_exists(XotBaseModel::class));
        Assert::assertTrue((new ReflectionClass(XotBaseModel::class))->isAbstract());
    });
});
