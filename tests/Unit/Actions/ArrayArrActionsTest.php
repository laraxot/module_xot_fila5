<?php

declare(strict_types=1);


use Modules\Xot\Actions\Arr\DiffAssocRecursiveAction;
use Modules\Xot\Actions\Arr\RangeIntersectAction;
use Modules\Xot\Actions\Arr\SaveArrayAction;
use Modules\Xot\Actions\Arr\SaveJsonArrayAction;
use Modules\Xot\Actions\Arr\SavePhpArrayAction;

use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\mkdir;

uses(TestCase::class);

it('normalizes nested numeric strings in diff fixType', function (): void {
    $input = ['items' => [
        ['a' => '1', 'b' => 'x'],
        ['c' => '2.5'],
    ];

    $normalized = ArrDiffAssocRecursiveAction::fixType($input);

    expect($normalized)->toBe([
        ['a' => 1, 'b' => 'x'],
        ['c' => 2.5],
    ]);
});

it('throws when fixType receives a non-array item', function (): void {
    try {
        DiffAssocRecursiveAction::fixType(['items' => ['a' => '1'], 'invalid' => 'string']);
        Assert::fail('Expected exception not thrown');
    } catch (Exception) {
        // Expected
    }
});

it('returns recursive diff', function (): void {
    $action = new DiffAssocRecursiveAction();
    $left = ['items' => [
        ['id' => '1', 'name' => 'a'],
        ['id' => '2', 'name' => 'b'],
    ];
    $right = [
        ['id' => 2, 'name' => 'b'],
    ];

    expect($action->execute($left, $right))->toBe([
        ['id' => 1, 'name' => 'a'],
    ]);
});

it('covers all branches of range intersect', function (): void {
    $action = new RangeIntersectAction();

    Assert::assertSame([2, 5], $action->execute(2, 5, 1, 7));
    Assert::assertSame([2, 5], $action->execute(1, 7, 2, 5));
    Assert::assertFalse($action->execute(1, 2, 3, 4));
    Assert::assertFalse($action->execute(10, 11, 1, 5));
    Assert::assertFalse($action->execute(7, 6, 5, 8));
    Assert::assertSame([4, 4], $action->execute(4, 10, 2, 4));
    Assert::assertFalse($action->execute(1, 5, 2, 7));
});

it('writes JSON and PHP arrays', function (): void {
    $tmpDir = sys_get_temp_dir().'/xot-arr-actions-'.uniqid('', true);
    mkdir($tmpDir, 0777, true);

    $jsonFile = $tmpDir.'/data.json';
    $phpFile = $tmpDir.'/data.php';

    $jsonAction = new SaveJsonArrayAction();
    $phpAction = new SavePhpArrayAction();

    Assert::assertTrue($phpAction->execute(['b' => 2], $phpFile));
    Assert::assertFileExists($phpFile);
    Assert::assertStringContainsString('return', file_get_contents($phpFile));
    Assert::assertTrue($jsonAction->execute(['a' => 1], $jsonFile));
    Assert::assertFileExists($jsonFile);
    Assert::assertStringContainsString('"a"', file_get_contents($jsonFile));
});

it('dispatches save strategy by format in SaveArrayAction', function (): void {
    $tmpDir = sys_get_temp_dir().'/xot-save-array-action-'.uniqid('', true);
    mkdir($tmpDir, 0777, true);

    $action = new ArrSaveArrayAction();
    $jsonFile = $tmpDir.'/one.json';
    $phpFile = $tmpDir.'/one.php';

    expect($action->execute(['x' => 1], $jsonFile, 'json'))->toBeTrue()
        ->and($action->execute(['y' => 2], $phpFile, 'php'))->toBeTrue();
});

it('throws on unsupported save format in SaveArrayAction', function (): void {
    try {
        $action = new SaveArrayAction();
        $action->execute(['x' => 1], '/tmp/unused', 'xml');
        Assert::fail('Expected exception not thrown');
    } catch (InvalidArgumentException) {
        // Expected
    }
});
