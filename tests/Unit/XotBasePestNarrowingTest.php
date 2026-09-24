<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_I3fQxH
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_BBiXKp
=======
>>>>>>> 930f8146 (Check & fix styling)
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
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ZjpOEw
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

test('XotBasePest assertArray normalizza chiavi int in stringhe', function (): void {
    $normalized = XotBasePest::assertArray([0 => 'a', 'b' => 'c']);

    Assert::assertSame(['0' => 'a', 'b' => 'c'], $normalized);
});

test('XotBasePest assertArray accetta array vuoto', function (): void {
    Assert::assertSame([], XotBasePest::assertArray([]));
});
