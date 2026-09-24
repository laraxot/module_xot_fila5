<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_2DEY7V
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

>>>>>>> .merge_file_DwmWLT
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\Arr\SaveJsonArrayAction;
use Modules\Xot\Actions\Arr\SavePhpArrayAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\json_decode;
use function Safe\tempnam;

uses(TestCase::class);

test('save json array action works', function () {
    $data = ['foo' => 'bar'];
    $filename = tempnam(sys_get_temp_dir(), 'test_json').'.json';

    $action = app(SaveJsonArrayAction::class);
    $result = $action->execute($data, $filename);

    Assert::assertTrue($result);
    $savedData = json_decode(File::get($filename), true);
    Assert::assertSame($data, $savedData);
    File::delete($filename);
});

test('save php array action works', function () {
    $data = ['foo' => 'bar'];
    $filename = tempnam(sys_get_temp_dir(), 'test_php').'.php';

    $action = app(SavePhpArrayAction::class);
    $result = $action->execute($data, $filename);

    Assert::assertTrue($result);
    $savedData = include $filename;
    Assert::assertSame($data, $savedData);
    File::delete($filename);
});
