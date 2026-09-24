<?php

declare(strict_types=1);
<<<<<<< HEAD
=======
<<<<<<< .merge_file_BBiXKp
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_hYKgBf
>>>>>>> laraxot/dev
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

test('XotBasePest assertArray normalizza chiavi int in stringhe', function (): void {
    $normalized = XotBasePest::assertArray([0 => 'a', 'b' => 'c']);

    Assert::assertSame(['0' => 'a', 'b' => 'c'], $normalized);
});

test('XotBasePest assertArray accetta array vuoto', function (): void {
    Assert::assertSame([], XotBasePest::assertArray([]));
});
