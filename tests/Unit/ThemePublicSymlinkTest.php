<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Modules\Xot\Tests\TestCase;

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\readlink;

uses(TestCase::class);

/**
 * `public_html/themes/<Tema>` deve essere un symlink RELATIVO a `../../laravel/Themes/<Tema>/public`
 * (output di `vite build`), mai una copia. In `public_html/` non devono stare `hot` ne' `info.php`.
 * SSoT: laravel/Modules/Xot/docs/wiki/rules/theme-public-symlink.md
 */
function themePublicSymlinkRepoRoot(): string
{
    return dirname(__DIR__, 5);
}

/**
 * @return array<string, array{0: string}>
 */
function themesWithBuild(): array
{
    $themes = [];
    foreach (glob(themePublicSymlinkRepoRoot().'/laravel/Themes/*/public', GLOB_ONLYDIR) as $dir) {
        if (! is_string($dir)) {
            continue;
        }
        $theme = basename(dirname($dir));
        $themes[$theme] = [$theme];
    }

    return $themes;
}

it('ogni tema con build ha il symlink relativo in public_html/themes', function (string $theme): void {
    $link = themePublicSymlinkRepoRoot().'/public_html/themes/'.$theme;

    expect(is_link($link))->toBeTrue('public_html/themes/'.$theme.' deve essere un symlink, non una copia')
        ->and(readlink($link))->toBe('../../laravel/Themes/'.$theme.'/public')
        ->and(is_file($link.'/manifest.json'))->toBeTrue('manifest Vite non raggiungibile da '.$link);
})->with(themesWithBuild());

it('public_html non contiene file di sviluppo o diagnostica', function (string $file): void {
    expect(file_exists(themePublicSymlinkRepoRoot().'/public_html/'.$file))->toBeFalse();
})->with([
    'hot del dev server Vite' => ['hot'],
    'phpinfo esposto' => ['info.php'],
]);

it('nessun tema conserva lo script npm copy', function (string $theme): void {
    $themeDir = themePublicSymlinkRepoRoot().'/laravel/Themes/'.$theme;
    $packageJson = $themeDir.'/package.json';
    if (! is_file($packageJson)) {
        expect(is_dir($themeDir))->toBeTrue('la directory del tema deve esistere');

        return;
    }

    expect(file_get_contents($packageJson))->not->toContain('"copy"');
})->with(themesWithBuild());
