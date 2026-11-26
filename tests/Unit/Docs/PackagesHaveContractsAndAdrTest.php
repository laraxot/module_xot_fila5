<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Docs;

use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\preg_match;

/*
 * Ogni modulo e tema ha docs/contracts/ (cosa promettono Action e interfacce) e docs/adr/ (il perche' delle scelte),
 * ciascuna con un README.md che spiega il formato. Regola: Modules/Xot/docs/rules/action-behavioral-contract.md.
 * Source-level (nessuna app).
 */

/**
 * Sezioni ADR: italiano FixCity o inglese MADR (workshop laravelday).
 *
 * @var list<list<string>>
 */
const ADR_SECTIONS = [
    ['## Contesto', '## Context and Problem Statement'],
    ['## Decisione', '## Decision Outcome'],
    ['## Alternative scartate', '## Alternative considerate', '## Considered Options'],
    ['## Conseguenze', '### Consequences'],
];

const ADR_NON_DECISIONS = ['README.md', 'INDEX.md', 'index.md', '0000-template.md'];

/** @return list<string> cartelle dei moduli e dei temi (hanno module.json o theme.json o composer.json) */
function packageDirectories(): array
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

it('gives every module and theme a docs/contracts and a docs/adr folder with a README', function (): void {
    $root = dirname(__DIR__, 5);
    $missing = [];
    foreach (packageDirectories() as $dir) {
        foreach (['contracts', 'adr'] as $folder) {
            if (! is_file($dir.'/docs/'.$folder.'/README.md')) {
                $missing[] = substr($dir, strlen($root) + 1).'/docs/'.$folder.'/README.md';
            }
        }
    }

    Assert::assertNotSame([], packageDirectories());
    Assert::assertSame([], $missing);
});

it('writes every ADR with context, decision, rejected alternatives and consequences, and no date in its name', function (): void {
    $root = dirname(__DIR__, 5);
    $problems = [];
    foreach (packageDirectories() as $dir) {
        foreach (glob($dir.'/docs/adr/*.md') as $path) {
            if (! is_string($path) || in_array(basename($path), ADR_NON_DECISIONS, true)) {
                continue;
            }
            $relative = substr($path, strlen($root) + 1);
            if (preg_match('/\d{4}-\d{2}-\d{2}|\d{8}/', basename($path)) === 1) {
                $problems[] = $relative.': data nel nome (va nella frontmatter)';
            }
            $source = "\n".file_get_contents($path);
            foreach (ADR_SECTIONS as $variants) {
                $found = false;
                foreach ($variants as $variant) {
                    if (str_contains($source, "\n".$variant."\n") || str_contains($source, "\n".$variant."\r\n")) {
                        $found = true;
                        break;
                    }
                }
                if (! $found) {
                    $problems[] = $relative.': manca «'.$variants[0].'» (o equivalente MADR)';
                }
            }
        }
    }

    Assert::assertSame([], $problems);
});

it('gives every module and theme at least one substantive ADR', function (): void {
    $root = dirname(__DIR__, 5);
    $missing = [];

    foreach (packageDirectories() as $dir) {
        $adrFiles = array_values(array_filter(
            glob($dir.'/docs/adr/*.md'),
            static fn (mixed $path): bool => is_string($path)
                && ! in_array(basename($path), ADR_NON_DECISIONS, true),
        ));

        $substantive = false;
        foreach ($adrFiles as $path) {
            if (! is_string($path)) {
                continue;
            }

            $contents = file_get_contents($path);
            $hasContext = str_contains($contents, '## Contesto') || str_contains($contents, '## Context and Problem Statement');
            $hasDrivers = str_contains($contents, '## Driver della decisione')
                || str_contains($contents, '## Driver')
                || str_contains($contents, '## Decision Drivers');
            $hasAlternatives = str_contains($contents, '## Alternative scartate')
                || str_contains($contents, '## Alternative considerate')
                || str_contains($contents, '## Considered Options');
            $hasDecision = str_contains($contents, '## Decisione') || str_contains($contents, '## Decision Outcome');
            $hasConsequences = str_contains($contents, '## Conseguenze') || str_contains($contents, '### Consequences');
            // ## Verifica = sinonimo storico di ## Conferma nei moduli Blog/Seo/Rating/temi
            $hasConfirmation = str_contains($contents, '## Conferma')
                || str_contains($contents, '### Confirmation')
                || str_contains($contents, '## Verifica');
            if ($hasContext && $hasDrivers && $hasAlternatives && $hasDecision && $hasConsequences && $hasConfirmation) {
                $substantive = true;

                break;
            }
        }

        if (! $substantive) {
            $missing[] = substr($dir, strlen($root) + 1).'/docs/adr';
        }
    }

    Assert::assertSame([], $missing);
});
