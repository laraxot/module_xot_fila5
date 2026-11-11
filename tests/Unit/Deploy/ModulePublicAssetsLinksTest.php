<?php

declare(strict_types=1);

use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file;
use function Safe\file_get_contents;
use function Safe\glob;

uses(TestCase::class);

/*
 * Regola: public_html/assets/<modulo in minuscolo> e' un symlink a ../../laravel/Modules/<Modulo>/public (lo crea deploy.sh).
 * Il contenuto appartiene al repository del modulo, quindi il repository radice non versiona il link: ogni modulo con una
 * cartella `public` deve avere la sua voce `<modulo>/` in public_html/assets/.gitignore.
 */
it('lists every module public folder in public_html/assets/.gitignore', function (): void {
    $gitignore = base_path('../public_html/assets/.gitignore');
    Assert::assertFileExists($gitignore);
    $entries = array_map(trim(...), file($gitignore));

    foreach (glob(base_path('Modules/*/public'), GLOB_ONLYDIR) as $publicDir) {
        $module = mb_strtolower(basename(dirname($publicDir)));
        Assert::assertContains($module.'/', $entries, "Manca '{$module}/' in public_html/assets/.gitignore");
    }
});

it('creates the module asset links in deploy.sh instead of copying', function (): void {
    $deploy = file_get_contents(base_path('../deploy.sh'));

    Assert::assertStringContainsString('for module_public in Modules/*/public; do', $deploy);
    Assert::assertStringContainsString('"../../laravel/Modules/$module/public"', $deploy);
    Assert::assertStringNotContainsString('npm run copy', $deploy);
});

it('builds the Geo assets inside the module', function (): void {
    $vite = file_get_contents(base_path('Modules/Geo/vite.config.js'));

    Assert::assertStringContainsString("outDir: './public'", $vite);
    Assert::assertFileExists(base_path('Modules/Geo/public/manifest.json'));
});
