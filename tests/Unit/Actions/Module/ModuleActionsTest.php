<?php

declare(strict_types=1);
<<<<<<< .merge_file_2qnnJ4
<<<<<<< HEAD
<<<<<<< HEAD
=======

<<<<<<< HEAD
uses(TestCase::class);
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_kayXpC
=======
=======
uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\Module\GetModuleConfigAction;
use Modules\Xot\Actions\Module\GetModuleNameByClassAction;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use PHPUnit\Framework\Assert;

use function Safe\mkdir;
use function Safe\tempnam;
use function Safe\unlink;

<<<<<<< HEAD
uses(TestCase::class);

=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
test('get module name by class action works', function (): void {
    $action = app(GetModuleNameByClassAction::class);
    Assert::assertSame('User', $action->execute('Modules\User\Models\User'));
});

test('get module config action works', function (): void {
    $path = tempnam(sys_get_temp_dir(), 'test_module_config');
    unlink($path);
    mkdir($path);
    File::put($path.'/test.php', "return ['a' => 1]);");

    $pathAction = Mockery::mock(GetModulePathByGeneratorAction::class);
    $pathAction->allows(['execute' => $path]);
    app()->instance(GetModulePathByGeneratorAction::class, $pathAction);

    $action = app(GetModuleConfigAction::class);
    $result = $action->execute('TestModule', 'test');

    Assert::assertSame(['a' => 1], $result);
    File::deleteDirectory($path);
});
