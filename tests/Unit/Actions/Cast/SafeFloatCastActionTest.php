<?php

declare(strict_types=1);

use Modules\Xot\Actions\Cast\SafeFloatCastAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-xot-db');

it('casts float values', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute(123.45);
    Assert::assertSame(123.45, $result);
});

it('casts integer values', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute(123);
    Assert::assertSame(123.0, $result);
});

it('casts null values', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute(null);
    Assert::assertSame(0.0, $result);
});

it('casts null values with custom default', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute(null, 10.0);
    Assert::assertSame(10.0, $result);
});

it('casts numeric strings', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute('123.45');
    Assert::assertSame(123.45, $result);
});

it('casts integer strings', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute('123');
    Assert::assertSame(123.0, $result);
});

it('casts empty strings', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute('');
    Assert::assertSame(0.0, $result);
});

it('casts whitespace strings', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute('  123.45  ');
    Assert::assertSame(123.45, $result);
});

it('casts non-numeric strings', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute('abc');
    Assert::assertSame(0.0, $result);
});

it('casts non-numeric strings with default', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute('abc', 5.0);
    Assert::assertSame(5.0, $result);
});

it('casts boolean values', function (): void {
    $action = app(SafeFloatCastAction::class);
    Assert::assertSame(1.0, $action->execute(true));
    Assert::assertSame(0.0, $action->execute(false));
});

it('casts arrays', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute([1, 2, 3]);
    Assert::assertSame(0.0, $result);
});

it('casts objects', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->execute(new stdClass());
    Assert::assertSame(0.0, $result);
});

it('casts with range validation', function (): void {
    $action = app(SafeFloatCastAction::class);
    Assert::assertSame(50.0, $action->executeWithRange(50.0, 0.0, 100.0));
    Assert::assertSame(100.0, $action->executeWithRange(150.0, 0.0, 100.0));
    Assert::assertSame(0.0, $action->executeWithRange(-10.0, 0.0, 100.0));
});

it('casts with range and default', function (): void {
    $action = app(SafeFloatCastAction::class);
    $result = $action->executeWithRange('invalid', 0.0, 100.0, 25.0);
    Assert::assertSame(25.0, $result);
});

it('has static cast method', function (): void {
    $result = SafeFloatCastAction::cast('123.45');
    Assert::assertSame(123.45, $result);
});

it('has static cast method with default', function (): void {
    $result = SafeFloatCastAction::cast(null, 10.0);
    Assert::assertSame(10.0, $result);
});

it('has static castWithRange method', function (): void {
    $result = SafeFloatCastAction::castWithRange('150.0', 0.0, 100.0);
    Assert::assertSame(100.0, $result);
});

it('handles infinite values', function (): void {
    $action = app(SafeFloatCastAction::class);
    Assert::assertSame(0.0, $action->execute('INF'));
    Assert::assertSame(0.0, $action->execute('NAN'));
});

it('handles infinite values with default', function (): void {
    $action = app(SafeFloatCastAction::class);
    Assert::assertSame(5.0, $action->execute('INF', 5.0));
    Assert::assertSame(5.0, $action->execute('NAN', 5.0));
});

it('casts scientific notation', function (): void {
    $action = app(SafeFloatCastAction::class);
    Assert::assertSame(123.0, $action->execute('1.23e2'));
    Assert::assertSame(0.0123, $action->execute('1.23E-2'));
});

it('handles decimal comma', function (): void {
    $action = app(SafeFloatCastAction::class);
    Assert::assertSame(123.45, $action->execute('123,45'));
});
