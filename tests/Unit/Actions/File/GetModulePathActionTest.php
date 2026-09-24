<?php

declare(strict_types=1);
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\GetModulePathAction;
use Modules\Xot\Tests\TestCase;
use Nwidart\Modules\Facades\Module;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======

uses(Modules\Xot\Tests\TestCase::class);
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\GetModulePathAction;
use Nwidart\Modules\Facades\Module;
use PHPUnit\Framework\Assert;

>>>>>>> 3792da0d (Check & fix styling)
it('gets module path from facade correctly', function (): void {
    // Spy on Module facade
    Module::partialMock()->allows([
        'getModulePath' => function (string $module): string {
<<<<<<< .merge_file_VAQdK0
<<<<<<< HEAD
<<<<<<< HEAD
            return $module === 'Xot' ? '/path/to/Xot/' : '';
=======
            return 'Xot' === $module ? '/path/to/Xot/' : '';
>>>>>>> laraxot/dev
=======
            return 'Xot' === $module ? '/path/to/Xot/' : '';
>>>>>>> 3792da0d (Check & fix styling)
=======
            return $module === 'Xot' ? '/path/to/Xot/' : '';
>>>>>>> .merge_file_BRBLgC
        },
    ]);
=======

uses(Modules\Xot\Tests\TestCase::class);
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\GetModulePathAction;
use Nwidart\Modules\Facades\Module;
use PHPUnit\Framework\Assert;

it('gets module path from facade correctly', function (): void {
    /* @var \Modules\Xot\Tests\TestCase $this */
    Module::shouldReceive('getModulePath')
        ->once()
        ->with('Xot')
        ->andReturn('/path/to/Xot/');
>>>>>>> 930f8146 (Check & fix styling)

    $action = app(GetModulePathAction::class);
    $result = $action->execute('Xot');

    Assert::assertSame('/path/to/Xot/', $result);
});

it('gets module path from fallback correctly', function (): void {
<<<<<<< HEAD
=======
    /* @var \Modules\Xot\Tests\TestCase $this */
    Module::shouldReceive('getModulePath')
        ->once()
        ->andThrow(new Exception('Module not found'));

>>>>>>> 930f8146 (Check & fix styling)
    // We assume Modules directory exists in base_path
    $modulesPath = base_path('Modules');
    if (! File::exists($modulesPath)) {
        File::makeDirectory($modulesPath);
    }

    // Create a dummy module dir
    $dummyModule = $modulesPath.'/TestModule';
    if (! File::exists($dummyModule)) {
        File::makeDirectory($dummyModule);
    }

<<<<<<< HEAD
    // Spy on Module facade to throw exception, forcing fallback
    Module::partialMock()->allows([
        'getModulePath' => function (string $module): string {
            throw new Exception('Module not found');
        },
    ]);

=======
>>>>>>> 930f8146 (Check & fix styling)
    $action = app(GetModulePathAction::class);
    // Case-insensitive search
    $result = $action->execute('testmodule');

    Assert::assertSame($dummyModule, $result);
    File::deleteDirectory($dummyModule);
});
