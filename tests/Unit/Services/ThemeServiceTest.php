<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_PBenM4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_48DKIz
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

>>>>>>> .merge_file_uDfvoF
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_c7yDWe
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Illuminate\Support\Facades\Config;
use Modules\Xot\Actions\Theme\GetThemeAction;
use Modules\Xot\Actions\Theme\GetThemePathAction;
use Modules\Xot\Actions\Theme\IsThemeAction;
use Modules\Xot\Actions\Theme\SetThemeAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('sets and gets theme', function (): void {
    app(SetThemeAction::class)->execute('test-theme');
    Assert::assertSame('test-theme', Config::get('theme.active'));
    Assert::assertSame('test-theme', app(GetThemeAction::class)->execute());
});

it('checks if theme is active', function (): void {
    app(SetThemeAction::class)->execute('active-theme');
    Assert::assertTrue(app(IsThemeAction::class)->execute('active-theme'));
    Assert::assertFalse(app(IsThemeAction::class)->execute('other-theme'));
});

it('gets theme path', function (): void {
    app(SetThemeAction::class)->execute('my-path-theme');
    $path = app(GetThemePathAction::class)->execute();
    Assert::assertSame(resource_path('themes/my-path-theme'), $path);
});
