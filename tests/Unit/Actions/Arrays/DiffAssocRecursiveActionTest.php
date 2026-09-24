<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_m1PEAy
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_ROUutt
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

>>>>>>> .merge_file_ayQJbl
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_uqjcoU
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Actions\Arr\DiffAssocRecursiveAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('diff assoc recursive action works correctly', function () {
    $arr1 = [
        'a' => ['id' => 1, 'name' => 'Test'],
        'b' => ['id' => 2, 'name' => 'Test 2'],
    ];
    $arr2 = [
        'a' => ['id' => 1, 'name' => 'Test'],
    ];

    $action = app(DiffAssocRecursiveAction::class);
    $result = $action->execute($arr1, $arr2);

    Assert::assertSame(['id' => 2, 'name' => 'Test 2'], $result);

    Assert::assertArrayHasKey('b', $result);
});

test('diff assoc recursive action handles numeric strings', function () {
    $arr1 = [
        'a' => ['id' => '1', 'name' => 'Test'],
    ];
    $arr2 = [
        'a' => ['id' => 1, 'name' => 'Test'],
    ];

    $action = app(DiffAssocRecursiveAction::class);
    $result = $action->execute($arr1, $arr2);

    // fixType converts '1' to 1, so they should be equal and diff should be empty
    Assert::assertEmpty($result);
});
