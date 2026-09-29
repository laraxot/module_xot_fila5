<?php

declare(strict_types=1);

use Modules\Xot\Tests\TestCase;

use function Safe\file;
use function Safe\glob;
use function Safe\preg_match;

uses(TestCase::class)->group('no-xot-db');

/**
 * Guardia module-root-hygiene: le 5 regole sulla root di ogni modulo.
 *
 * 1. nessuna cartella con maiuscole;
 * 2. nessuna cartella di tooling (bashscripts, graphify-out, tools, ...);
 * 3. un solo *.code-workspace, chiamato _module_<nome>_fila5.code-workspace,
 *    dove <nome> viene dal remote git del modulo (`.git/config`);
 * 4. README.md e CHANGELOG.md presenti, al massimo 6 file .md in totale;
 * 5. `.github/skills` assente e ignorato: `/.github/skills/` nel .gitignore del modulo.
 *
 * Il dataset e' per modulo: il messaggio d'errore nomina modulo e violazione.
 *
 * @see Modules/Xot/docs/bmad/stories/module-root-hygiene.story.md
 */

if (! function_exists('moduleRootHygieneModules')) {
    /**
     * Moduli con repo git propria (`Modules/<Mod>/.git`); esclude Modules/docs.
     *
     * @return array<string, array{0: string}>
     */
    function moduleRootHygieneModules(): array
    {
        $modulesDir = dirname(__DIR__, 3);
        $dataset = [];

        /** @var list<string> $dirs */
        $dirs = glob($modulesDir.'/*', GLOB_ONLYDIR);

        foreach ($dirs as $dir) {
            if (! file_exists($dir.'/.git')) {
                continue;
            }

            $dataset[basename($dir)] = [$dir];
        }

        return $dataset;
    }
}

if (! function_exists('moduleRootHygieneRemoteName')) {
    /**
     * Nome dal remote git: preferisce `laraxot`, ripiega sul primo remote.
     * Da `git@github.com:laraxot/module_activity_fila5.git` ricava `activity`.
     */
    function moduleRootHygieneRemoteName(string $moduleDir): ?string
    {
        $configFile = $moduleDir.'/.git/config';
        if (! is_file($configFile)) {
            return null;
        }

        $remoteUrls = [];
        $currentRemote = null;

        /** @var list<string> $lines */
        $lines = file($configFile, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            if (preg_match('/^\s*\[remote "([^"]+)"\]/', $line, $section) === 1 && isset($section[1])) {
                $currentRemote = $section[1];

                continue;
            }

            if (preg_match('/^\s*\[/', $line) === 1) {
                $currentRemote = null;

                continue;
            }

            if ($currentRemote !== null && preg_match('/^\s*url\s*=\s*(\S+)/', $line, $url) === 1 && isset($url[1])) {
                $remoteUrls[$currentRemote] = $url[1];
            }
        }

        $chosen = $remoteUrls['laraxot'] ?? (array_values($remoteUrls)[0] ?? null);
        if ($chosen === null) {
            return null;
        }

        if (preg_match('#/module_([a-z0-9]+)_fila5(?:\.git)?$#i', $chosen, $name) !== 1 || ! isset($name[1])) {
            return null;
        }

        return strtolower($name[1]);
    }
}

dataset('module_roots', fn (): array => moduleRootHygieneModules());

it('ha dei moduli da controllare', function (): void {
    expect(moduleRootHygieneModules())->not->toBe([]);
});

it('root modulo senza cartelle con maiuscole', function (string $moduleDir): void {
    /** @var list<string> $dirs */
    $dirs = glob($moduleDir.'/*', GLOB_ONLYDIR);

    $found = [];
    foreach ($dirs as $dir) {
        if (preg_match('/[A-Z]/', basename($dir)) === 1) {
            $found[] = basename($dir);
        }
    }

    expect($found)->toBe(
        [],
        basename($moduleDir).': cartelle con maiuscole in root: '.implode(', ', $found),
    );
})->with('module_roots');

it('root modulo senza cartelle di tooling vietate', function (string $moduleDir): void {
    $forbidden = [
        'bashscripts',
        'graphify-out',
        'tools',
        'scripts',
        '.agents',
        '.claude-audit',
        '.vscode',
        'build',
        '.claude',
        '.codex',
        '.opencode',
        'tests/graphify-out',
        '.github/skills',
    ];

    $found = array_values(array_filter(
        $forbidden,
        static fn (string $rel): bool => file_exists($moduleDir.'/'.$rel) || is_link($moduleDir.'/'.$rel),
    ));

    expect($found)->toBe(
        [],
        basename($moduleDir).': cartelle vietate presenti: '.implode(', ', $found),
    );
})->with('module_roots');

it('root modulo con un solo .code-workspace chiamato dal remote', function (string $moduleDir): void {
    $module = basename($moduleDir);
    $name = moduleRootHygieneRemoteName($moduleDir);

    expect($name)->not->toBeNull($module.': remote git assente o non in forma module_<nome>_fila5');

    /** @var list<string> $workspaces */
    $workspaces = glob($moduleDir.'/*.code-workspace');
    $found = array_map('basename', $workspaces);

    expect($found)->toBe(
        ['_module_'.$name.'_fila5.code-workspace'],
        $module.': workspace attesi solo _module_'.$name.'_fila5.code-workspace, trovati: '.implode(', ', $found),
    );
})->with('module_roots');

it('root modulo con README, CHANGELOG e al massimo 6 .md', function (string $moduleDir): void {
    $module = basename($moduleDir);
    /** @var list<string> $markdown */
    $markdown = glob($moduleDir.'/*.md');
    $found = array_map('basename', $markdown);

    expect(in_array('README.md', $found, true))->toBeTrue($module.': manca README.md');
    expect(in_array('CHANGELOG.md', $found, true))->toBeTrue($module.': manca CHANGELOG.md');
    expect(count($found))->toBeLessThanOrEqual(
        6,
        $module.': '.count($found).' file .md in root (max 6): '.implode(', ', $found),
    );
})->with('module_roots');

it('root modulo con /.github/skills/ nel .gitignore', function (string $moduleDir): void {
    $module = basename($moduleDir);
    $gitignore = $moduleDir.'/.gitignore';
    /** @var list<string> $lines */
    $lines = is_file($gitignore) ? file($gitignore, FILE_IGNORE_NEW_LINES) : [];
    $lines = array_map('trim', $lines);

    expect(in_array('/.github/skills/', $lines, true))->toBeTrue(
        $module.': manca la riga /.github/skills/ nel .gitignore del modulo',
    );
})->with('module_roots');
