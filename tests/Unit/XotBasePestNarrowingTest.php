<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_GWAJ7K
=======
<<<<<<< .merge_file_UP4QWo

=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KcmJVC
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
<<<<<<< .merge_file_GWAJ7K
=======
>>>>>>> .merge_file_H4ab4s
>>>>>>> .merge_file_KcmJVC
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

test('XotBasePest assertArray normalizza chiavi int in stringhe', function (): void {
    $normalized = XotBasePest::assertArray([0 => 'a', 'b' => 'c']);

    Assert::assertSame(['0' => 'a', 'b' => 'c'], $normalized);
});

test('XotBasePest assertArray accetta array vuoto', function (): void {
    Assert::assertSame([], XotBasePest::assertArray([]));
});
