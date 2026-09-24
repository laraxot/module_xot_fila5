<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Xot\Actions\ParsePrintPageStringAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
uses(Modules\Xot\Tests\TestCase::class);
use Modules\Xot\Actions\ParsePrintPageStringAction;
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
it('parses single pages and ranges', function (): void {
    $str = '1-4,6,7,8,11-14';
    $expected = [1, 2, 3, 4, 6, 7, 8, 11, 12, 13, 14];

    Assert::assertSame($expected, ParsePrintPageStringAction::execute($str));
    Assert::assertSame([5], ParsePrintPageStringAction::execute('5'));
    Assert::assertSame([1, 2, 3], ParsePrintPageStringAction::execute('1-3'));
});

<<<<<<< HEAD
it('throws when no valid page number exists')->todo();
=======
it('throws when no valid page number exists', function (): void {
});
>>>>>>> laraxot/dev

it('builds inclusive ranges from fromTo helper', function (): void {
    Assert::assertSame([1, 2, 3], ParsePrintPageStringAction::fromTo(1, 3));
    Assert::assertSame([5], ParsePrintPageStringAction::fromTo(5, 5));
});

<<<<<<< HEAD
it('throws when fromTo end is lower than start')->todo();
=======
it('throws when fromTo end is lower than start', function (): void {
});
>>>>>>> laraxot/dev
