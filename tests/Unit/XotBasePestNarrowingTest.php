<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_BBiXKp
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======

>>>>>>> .merge_file_hYKgBf
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

test('XotBasePest assertArray normalizza chiavi int in stringhe', function (): void {
    $normalized = XotBasePest::assertArray([0 => 'a', 'b' => 'c']);

    Assert::assertSame(['0' => 'a', 'b' => 'c'], $normalized);
});

test('XotBasePest assertArray accetta array vuoto', function (): void {
    Assert::assertSame([], XotBasePest::assertArray([]));
});
