<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Docs;

use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\preg_match;
use function Safe\preg_split;

/*
 * Harness documentale source-level: nessun bootstrap Laravel, nessun DB, nessuna scrittura.
 * Standard: docs/adr/0018-agent-harness.md, docs/adr/0042-laravel-day-harness-adoption-boundary.md.
 *
 * Non obbliga un package a inventare un ADR sostanziale in assenza di decisioni reali.
 * I vecchi nomi descrittivi e gli ADR numerati sono entrambi ammessi.
 */

const ADR_SECTIONS = [
    ['## Contesto', '## Context and Problem Statement'],
    ['## Driver della decisione', '## Decision Drivers'],
    ['## Alternative scartate', '## Alternative considerate', '## Considered Options'],
    ['## Decisione', '## Decision Outcome'],
    ['## Conseguenze', '### Consequences'],
    ['## Conferma', '## Verifica', '### Confirmation'],
];

const ADR_NON_DECISIONS = ['README.md', 'INDEX.md', 'index.md', '0000-template.md'];

/**
 * `Safe\glob()` dichiara solo `list`: qui servono i percorsi, che sono stringhe.
 *
 * @return list<string>
 */
function docsPackageGlob(string $pattern, int $flags = 0): array
{
    return array_values(array_filter(glob($pattern, $flags), is_string(...)));
}

/** @return list<string> */
function packageDirectories(): array
{
    $root = dirname(__DIR__, 5);
    $packages = [];

    $moduleDirectories = docsPackageGlob($root.'/Modules/*', GLOB_ONLYDIR);
    $themeDirectories = docsPackageGlob($root.'/Themes/*', GLOB_ONLYDIR);

    foreach ([...$moduleDirectories, ...$themeDirectories] as $directory) {
        if (is_file($directory.'/module.json')
            || is_file($directory.'/theme.json')
            || is_file($directory.'/composer.json')
        ) {
            $packages[] = $directory;
        }
    }

    return $packages;
}

/** @return list<string> */
function packageDocFiles(string $directory, string $category): array
{
    $paths = [];

    foreach (docsPackageGlob($directory.'/docs/'.$category.'/*.md') as $path) {
        if (in_array(basename($path), ['README.md', 'INDEX.md', 'index.md', '0000-template.md', '_template.md'], true)) {
            continue;
        }

        $paths[] = $path;
    }

    return $paths;
}

it('provides owner-local ADR and contract indices for each module and theme', function (): void {
    $missing = [];
    $packages = packageDirectories();

    foreach ($packages as $directory) {
        foreach (['adr', 'contracts'] as $category) {
            if (! is_file($directory.'/docs/'.$category.'/README.md')) {
                $missing[] = $directory.'/docs/'.$category.'/README.md';
            }
        }
    }

    Assert::assertNotEmpty($packages, 'Nessun modulo o tema disponibile da verificare');
    Assert::assertSame([], $missing);
});

it('rejects unresolved Git merge markers in owner-local ADR and contract indices', function (): void {
    $problems = [];

    foreach (packageDirectories() as $directory) {
        foreach (['adr', 'contracts'] as $category) {
            $path = $directory.'/docs/'.$category.'/README.md';
            if (! is_file($path)) {
                continue;
            }

            $content = (string) file_get_contents($path);
            if (preg_match('/^(?:<<<<<<<|=======\s*$|>>>>>>>)/m', $content) === 1) {
                $problems[] = $path.': marker di merge non risolto';
            }

            if (preg_match('/\A---\r?\n([\s\S]*?)\r?\n---\r?\n/', $content, $frontmatter) !== 1) {
                $problems[] = $path.': frontmatter Markdown assente o incompleta';

                continue;
            }

            $frontmatterBody = $frontmatter[1] ?? '';
            $names = [];
            foreach (preg_split('/\r?\n/', $frontmatterBody) as $line) {
                if (! is_string($line)) {
                    continue;
                }

                if (preg_match('/^([A-Za-z][A-Za-z0-9_-]*):/', $line, $match) !== 1) {
                    continue;
                }

                $key = $match[1] ?? '';
                if ($key === '') {
                    continue;
                }

                if (isset($names[$key])) {
                    $problems[] = $path.': chiave frontmatter duplicata '.$key;
                }
                $names[$key] = true;
            }

            if (! str_contains($content, 'laraxot/module_xot_fila5')) {
                $problems[] = $path.': manca il puntatore allo standard harness Xot';
            }
        }
    }

    Assert::assertSame([], $problems);
});

it('rejects unresolved merge markers in every package-owned ADR and contract document', function (): void {
    $problems = [];

    foreach (packageDirectories() as $directory) {
        foreach (['adr', 'contracts'] as $category) {
            foreach (docsPackageGlob($directory.'/docs/'.$category.'/*.md') as $path) {
                $source = (string) file_get_contents($path);
                if (preg_match('/^(?:<<<<<<<|=======\s*$|>>>>>>>)/m', $source) === 1) {
                    $problems[] = $path.': marker di merge non risolto';
                }
            }
        }
    }

    Assert::assertSame([], $problems);
});

it('mentions each present owner-local ADR or contract in its folder index', function (): void {
    $missing = [];

    foreach (packageDirectories() as $directory) {
        foreach (['adr', 'contracts'] as $category) {
            $readme = $directory.'/docs/'.$category.'/README.md';
            if (! is_file($readme)) {
                continue;
            }

            $content = (string) file_get_contents($readme);
            foreach (packageDocFiles($directory, $category) as $path) {
                if (! str_contains($content, basename($path))) {
                    $missing[] = $readme.': manca riferimento a '.basename($path);
                }
            }
        }
    }

    Assert::assertSame([], $missing);
});

it('requires a confirmation for each explicitly typed ADR decision', function (): void {
    $problems = [];

    foreach (packageDirectories() as $directory) {
        foreach (docsPackageGlob($directory.'/docs/adr/*.md') as $path) {
            if (in_array(basename($path), ADR_NON_DECISIONS, true)) {
                continue;
            }

            $source = (string) file_get_contents($path);
            if (preg_match('/^type:\s*decision\s*$/m', $source) !== 1) {
                // I documenti legacy e le bozze senza type non diventano ADR fittizi.
                continue;
            }

            foreach (ADR_SECTIONS as $alternatives) {
                $found = false;
                foreach ($alternatives as $heading) {
                    if (str_contains($source, "\n".$heading."\n")
                        || str_contains($source, "\n".$heading."\r\n")) {
                        $found = true;
                        break;
                    }
                }

                if (! $found) {
                    $problems[] = $path.': manca sezione '.$alternatives[0];
                }
            }
        }
    }

    Assert::assertSame([], $problems);
});
