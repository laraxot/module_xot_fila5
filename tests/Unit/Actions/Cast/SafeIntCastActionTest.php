<?php

declare(strict_types=1);

use Modules\Xot\Actions\Cast\SafeIntCastAction;
use PHPUnit\Framework\Assert;

uses(Modules\Xot\Tests\TestCase::class);

it('casts various values to integer correctly', function (): void {
    $action = app(SafeIntCastAction::class);

    // Integers
    expect($action->execute(123))->toBe(123);

    // Floats
    expect($action->execute(123.9))->toBe(123);
    expect($action->execute(INF, 5))->toBe(5);

    // Null
    expect($action->execute(null, 10))->toBe(10);

    // Strings
    Assert::assertSame(123, $action->execute('123'));
    Assert::assertSame(1234, $action->execute('1.234')); // Thousands separator
    $signedWhitespaceInput = ' '.chr(43).'123 ';
    Assert::assertSame(123, $action->execute($signedWhitespaceInput));
    Assert::assertSame(7, $action->execute('invalid', 7));
    Assert::assertSame(0, $action->execute(''));
    // Booleans
    expect($action->execute(true))->toBe(1);
    expect($action->execute(false))->toBe(0);

    // Arrays (single element)
    expect($action->execute(['15']))->toBe(15);
    expect($action->execute(['a', 'b'], 2))->toBe(2);

    // Objects with toString
    $obj = new class {
        public function __toString()
        {
            return '20';
        }
    };
    expect($action->execute($obj))->toBe(20);
});

it('clams integer within range correctly', function (): void {
    $action = app(SafeIntCastAction::class);

    expect($action->executeWithRange(50, 0, 100))->toBe(50);
    expect($action->executeWithRange(-10, 0, 100))->toBe(0);
    expect($action->executeWithRange(150, 0, 100))->toBe(100);
});

it('casts as id correctly', function (): void {
    $action = app(SafeIntCastAction::class);

    expect($action->executeAsId(10))->toBe(10);
    expect($action->executeAsId(0))->toBe(1);
    expect($action->executeAsId(-5))->toBe(1);
});

it('uses static int cast methods correctly', function (): void {
    expect(SafeIntCastAction::cast('99'))->toBe(99);
    expect(SafeIntCastAction::castWithRange(200, 0, 50))->toBe(50);
    expect(SafeIntCastAction::castAsId(0))->toBe(1);
});
