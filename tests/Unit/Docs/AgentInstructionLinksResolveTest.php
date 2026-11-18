<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\preg_match;
use function Safe\preg_match_all;

/*
 * I link Markdown del CLAUDE.md di root portano a file versionati che esistono.
 *
 * InstructionReferencesExistTest controlla i nomi tra backtick; i link `[testo](percorso)` restavano senza controllo.
 * Eccezione dichiarata: docs/wiki/{rules,memories,skills,commands} sono link simbolici verso bashscripts/, che e' fuori da
 * git (Insidie, CLAUDE.md): in un clone pulito non ci sono. Ogni altro link deve esistere qui.
 */
const AGENT_LINK_EXTERNAL_PREFIXES = ['docs/wiki/rules/', 'docs/wiki/memories/', 'docs/wiki/skills/', 'docs/wiki/commands/'];

it('resolves every versioned link of the root CLAUDE.md', function (): void {
    $root = dirname(__DIR__, 6);
    $matches = [];
    preg_match_all('/\]\(([^)#\s]+)\)/', file_get_contents($root.'/CLAUDE.md'), $matches);

    $broken = [];
    foreach ($matches[1] as $link) {
        if (preg_match('#^[a-z]+://#', $link) === 1) {
            continue;
        }
        foreach (AGENT_LINK_EXTERNAL_PREFIXES as $prefix) {
            if (str_starts_with($link, $prefix)) {
                continue 2;
            }
        }
        if (! file_exists($root.'/'.$link)) {
            $broken[] = $link;
        }
    }

    Assert::assertSame([], $broken);
});
