<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Docs;

use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\preg_match_all;

/*
 * Ogni modulo e tema ha `.github/README.md`: la pagina che GitHub mostra al posto del README principale quando il
 * repository del pacchetto la contiene, e il punto da cui si arriva a docs, issue, discussioni e sicurezza.
 * ADR: Modules/Xot/docs/adr/0043-github-readme-per-pacchetto.md. Source-level (nessuna app).
 */

/** @return list<string> cartelle dei moduli e dei temi (module.json, theme.json o composer.json) */
function githubReadmePackageDirectories(): array
{
    $root = dirname(__DIR__, 5);
    $packages = [];
    foreach ([...glob($root.'/Modules/*', GLOB_ONLYDIR), ...glob($root.'/Themes/*', GLOB_ONLYDIR)] as $dir) {
        if (is_string($dir) && (is_file($dir.'/module.json') || is_file($dir.'/theme.json') || is_file($dir.'/composer.json'))) {
            $packages[] = $dir;
        }
    }

    return $packages;
}

it('gives every module and theme a non-empty .github/README.md that opens with a title', function (): void {
    $root = dirname(__DIR__, 5);
    $problems = [];
    foreach (githubReadmePackageDirectories() as $dir) {
        $readme = $dir.'/.github/README.md';
        $label = substr($dir, strlen($root) + 1).'/.github/README.md';
        if (! is_file($readme)) {
            $problems[] = $label.': manca';

            continue;
        }
        $body = (string) preg_replace('/\A---\R.*?\R---\R/s', '', ltrim(file_get_contents($readme)), 1);
        if (! str_starts_with(ltrim($body), '# ')) {
            $problems[] = $label.': dopo l\'eventuale frontmatter non inizia con un titolo `# `';
        }
    }

    Assert::assertNotSame([], githubReadmePackageDirectories());
    Assert::assertSame([], $problems);
});

it('points every relative link of a .github/README.md at something that exists', function (): void {
    $root = dirname(__DIR__, 5);
    $broken = [];
    foreach (githubReadmePackageDirectories() as $dir) {
        $readme = $dir.'/.github/README.md';
        if (! is_file($readme)) {
            continue;
        }
        preg_match_all('/\]\((?!https?:\/\/|#|mailto:)([^)#\s]+)/', file_get_contents($readme), $matches);
        foreach ($matches[1] as $target) {
            if (! file_exists(dirname($readme).'/'.$target)) {
                $broken[] = substr($readme, strlen($root) + 1).' -> '.$target;
            }
        }
    }

    Assert::assertSame([], $broken);
});
