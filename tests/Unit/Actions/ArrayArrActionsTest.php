<?php

declare(strict_types=1);

use Filament\Support\RawJs;
use Modules\Xot\Actions\Arr\ArrayToRawJsAction;
use Modules\Xot\Actions\Arr\DiffAssocRecursiveAction;
use Modules\Xot\Actions\Arr\RangeIntersectAction;
use Modules\Xot\Actions\Arr\SaveArrayAction;
use Modules\Xot\Actions\Arr\SaveJsonArrayAction;
use Modules\Xot\Actions\Arr\SavePhpArrayAction;
use Modules\Xot\Actions\Array\RangeIntersectAction as ArrayRangeIntersectAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\mkdir;

uses(TestCase::class);

it('normalizes nested numeric strings in diff fixType for Arr namespace', function (): void {
    $input = [
        ['a' => '1', 'b' => 'x'],
        ['c' => '2.5'],
    ];

    $normalized = ArrDiffAssocRecursiveAction::fixType($input);

    expect($normalized)->toBe([
        ['a' => 1, 'b' => 'x'],
        ['c' => 2.5],
    ]);
});

it('throws when fixType receives a non-array item for Arr namespace', function (): void {
    ArrDiffAssocRecursiveAction::fixType([['ok' => '1'], 'invalid']);
})->throws(Exception::class);

it('returns recursive diff in Arr namespace', function (): void {
    $action = new ArrDiffAssocRecursiveAction();
    $left = [
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

it('normalizes nested numeric strings in diff fixType for Array namespace', function (): void {
    $input = [
        ['a' => '10', 'b' => 'x'],
    ];

    $normalized = ArrayDiffAssocRecursiveAction::fixType($input);

    expect($normalized)->toBe([
        ['a' => 10, 'b' => 'x'],
    ]);
});

it('covers all branches of range intersect in Array namespace', function (): void {
    $action = new ArrayRangeIntersectAction();

    Assert::assertSame([2, 5], $action->execute(2, 5, 1, 7));
    Assert::assertSame([2, 5], $action->execute(1, 7, 2, 5));
    Assert::assertFalse($action->execute(1, 2, 3, 4));
    Assert::assertFalse($action->execute(10, 11, 1, 5));
    Assert::assertFalse($action->execute(7, 6, 5, 8));
    Assert::assertSame([4, 4], $action->execute(4, 10, 2, 4));
    Assert::assertFalse($action->execute(1, 5, 2, 7));
});

it('writes JSON and PHP arrays via Arr actions', function (): void {
    $tmpDir = sys_get_temp_dir().'/xot-arr-actions-'.uniqid('', true);
    mkdir($tmpDir, 0777, true);

    $jsonFile = $tmpDir.'/data.json';
    $phpFile = $tmpDir.'/data.php';

    $jsonAction = new ArrSaveJsonArrayAction();
    $phpAction = new ArrSavePhpArrayAction();

    Assert::assertTrue($phpAction->execute(['b' => 2], $phpFile));
    Assert::assertFileExists($phpFile);
    Assert::assertStringContainsString('return', file_get_contents($phpFile));
    Assert::assertTrue($jsonAction->execute(['a' => 1], $jsonFile));
    Assert::assertFileExists($jsonFile);
    Assert::assertStringContainsString('"a"', file_get_contents($jsonFile));

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
    $action = new ArrSaveArrayAction();
    $action->execute(['x' => 1], '/tmp/unused', 'xml');
})->throws(InvalidArgumentException::class);

it('converts mixed PHP arrays to RawJs correctly', function (): void {
    $action = new ArrayToRawJsAction();

    $raw = $action->execute([
        'validKey' => true,
        'string key' => "O'Reilly",
        'number' => 12.5,
        'none' => null,
        'nested' => [
            'inner' => 1,
            'formatter' => RawJs::make('value => value * 2'),
        ],
    ]);

    expect($raw)->toBeInstanceOf(RawJs::class);

    $js = $raw->toHtml();
    expect($js)->toContain('validKey: true')
        ->and($js)->toContain("'string key': 'O\\'Reilly'")
        ->and($js)->toContain('number: 12.5')
        ->and($js)->toContain('none: null')
        ->and($js)->toContain('formatter: value => value * 2');
});

it('converts mixed PHP arrays to RawJs correctly', function (): void {
    $action = new ArrayToRawJsAction();

    $raw = $action->execute([
        'validKey' => true,
        'string key' => "O'Reilly",
        'number' => 12.5,
        'none' => null,
        'nested' => [
            'inner' => 1,
            'formatter' => RawJs::make('value => value * 2'),
        ],
    ]);

    Assert::assertInstanceOf(RawJs::class, $raw);
    $js = $raw->toHtml();
    Assert::assertStringContainsString('validKey: true', $js);
    Assert::assertStringContainsString("'string key': 'O\\'Reilly'", $js);
    Assert::assertStringContainsString('number: 12.5', $js);
    Assert::assertStringContainsString('none: null', $js);
    Assert::assertStringContainsString('formatter: value => value * 2', $js);
});
