<?php

declare(strict_types=1);
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
})->group('THEME-GET-INV-1', 'THEME-SET-INV-1');

it('checks if theme is active', function (): void {
    app(SetThemeAction::class)->execute('active-theme');
    Assert::assertTrue(app(IsThemeAction::class)->execute('active-theme'));
    Assert::assertFalse(app(IsThemeAction::class)->execute('other-theme'));
})->group('THEME-IS-INV-1');

it('gets theme path', function (): void {
    app(SetThemeAction::class)->execute('my-path-theme');
    $path = app(GetThemePathAction::class)->execute();
    Assert::assertSame(resource_path('themes/my-path-theme'), $path);
})->group('THEME-PATH-INV-1');
