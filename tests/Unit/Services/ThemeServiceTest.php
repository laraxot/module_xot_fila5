<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_TqXEOW
=======
<<<<<<< .merge_file_7p5J3s

=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_5jcenC
=======
<<<<<<< .merge_file_48DKIz
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

>>>>>>> .merge_file_uDfvoF
>>>>>>> laraxot/dev
<<<<<<< .merge_file_TqXEOW
=======
>>>>>>> .merge_file_DjKxum
>>>>>>> .merge_file_5jcenC
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
