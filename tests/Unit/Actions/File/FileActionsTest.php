<?php

declare(strict_types=1);
<<<<<<< .merge_file_YZ3TEV
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
>>>>>>> .merge_file_xr3sA4
=======
=======
uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Actions\File\AssetAction;
use Modules\Xot\Actions\File\AssetPathAction;
use Modules\Xot\Actions\File\FixPathAction;
use Modules\Xot\Actions\File\GetViewNameSpacePathAction;
use Modules\Xot\Actions\File\ViewPathAction;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use Nwidart\Modules\Facades\Module;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
use Nwidart\Modules\Facades\Module;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
test('fix path action works', function (): void {
    $action = app(FixPathAction::class);
    $path = 'some/path/with/mixed/slashes';
    $expected = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $path);
    Assert::assertSame($expected, $action->execute($path));
});

test('view path action works', function (): void {
<<<<<<< HEAD
    // Replace GetViewNameSpacePathAction with a spy that returns test path
<<<<<<< .merge_file_YZ3TEV
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_xr3sA4
    $getViewNameSpacePathAction = new class extends GetViewNameSpacePathAction
    {
        public function execute(string $namespace): string
        {
            return $namespace === 'test_ns' ? '/view/path' : '';
<<<<<<< .merge_file_YZ3TEV
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
    $getViewNameSpacePathAction = new class extends GetViewNameSpacePathAction {
        public function execute(string $namespace): string
        {
            return 'test_ns' === $namespace ? '/view/path' : '';
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_xr3sA4
        }
    };

    app()->instance(GetViewNameSpacePathAction::class, $getViewNameSpacePathAction);
=======
    $mock = Mockery::mock(GetViewNameSpacePathAction::class);
    /* @phpstan-ignore-next-line Mockery expectation chain not resolvable without extension */
    $mock->shouldReceive('execute')->with('test_ns')->andReturn('/view/path');

    app()->instance(GetViewNameSpacePathAction::class, $mock);
>>>>>>> 930f8146 (Check & fix styling)

    $action = app(ViewPathAction::class);
    $result = $action->execute('test_ns::folder.view');

    $expected = '/view/path/folder/view.blade.php';
    $expected = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $expected);

    Assert::assertSame($expected, $result);
});

test('asset path action works', function (): void {
<<<<<<< HEAD
    // Spy on Module facade
    Module::partialMock()->allows([
        'getModulePath' => function (string $module): string {
<<<<<<< .merge_file_YZ3TEV
<<<<<<< HEAD
<<<<<<< HEAD
            return $module === 'test_module' ? '/module/path/' : '';
=======
            return 'test_module' === $module ? '/module/path/' : '';
>>>>>>> laraxot/dev
=======
            return 'test_module' === $module ? '/module/path/' : '';
>>>>>>> 3792da0d (Check & fix styling)
=======
            return $module === 'test_module' ? '/module/path/' : '';
>>>>>>> .merge_file_xr3sA4
        },
    ]);
=======
    Module::shouldReceive('getModulePath')
        ->with('test_module')
        ->andReturn('/module/path/');
>>>>>>> 930f8146 (Check & fix styling)

    $action = app(AssetPathAction::class);
    Assert::assertSame('/module/path/resources/css/style.css', $action->execute('test_module::css/style.css'));
});

test('asset action handles absolute urls', function (): void {
    $action = app(AssetAction::class);
    Assert::assertSame('https://example.com/asset.js', $action->execute('https://example.com/asset.js'));
});
