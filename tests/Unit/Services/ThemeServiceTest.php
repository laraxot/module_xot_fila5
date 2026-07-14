<?php

declare(strict_types=1);

uses(Modules\Xot\Tests\TestCase::class);
use Illuminate\Support\Facades\Config;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
use Modules\Xot\Actions\Theme\GetThemeAction;
use Modules\Xot\Actions\Theme\GetThemePathAction;
use Modules\Xot\Actions\Theme\IsThemeAction;
use Modules\Xot\Actions\Theme\SetThemeAction;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

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
=======
use Modules\Xot\Services\ThemeService;
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
use PHPUnit\Framework\Assert;

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
<<<<<<< HEAD
    ThemeService::setTheme('my-path-theme');
    $path = ThemeService::getThemePath();
>>>>>>> 64619e34 (.)
=======
    app(SetThemeAction::class)->execute('my-path-theme');
    $path = app(GetThemePathAction::class)->execute();
>>>>>>> 61938ca4 (delete .claude-audit/)
    Assert::assertSame(resource_path('themes/my-path-theme'), $path);
});
