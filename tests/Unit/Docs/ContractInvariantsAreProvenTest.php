<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Docs;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

use function Safe\file_get_contents;
use function Safe\glob;
use function Safe\preg_match;
use function Safe\preg_match_all;

/*
 * @see Modules/Xot/docs/rules/action-behavioral-contract.md (sezione «Invarianti: un ID, un test»)
 * @see Modules/Xot/docs/adr/0012-behavioral-contract-governance.md
 *
 * Source-level (nessuna app, nessun DB). Il contratto e' la promessa, il group Pest e' la prova.
 * Tre modi in cui la promessa diventa falsa senza che nessuno se ne accorga:
 *  1. il contratto dichiara una prova (colonna «Group Pest») ma nessun test ha quel ->group();
 *  2. lo stesso ID invariante e' definito da due contratti: `--group=<ID>` proverebbe due cose;
 *  3. un test porta ->group('<SCOPE>-INV-<N>') che nessun contratto definisce (refuso o contratto sparito).
 * Un'invariante dichiarata «— (non dimostrato)» non e' un errore: e' il backlog onesto del pacchetto.
 */

const INVARIANT_PROOF_ID = '[A-Z][A-Z0-9]*(?:-[A-Z0-9]+)*-INV-\d+';

/**
 * README e INDEX esclusi (ripetono le righe nel backlog dei test del pacchetto) e i template (righe di esempio).
 *
 * @return list<string> percorsi assoluti dei file di contratto
 */
function invariantProofContractFiles(): array
{
    $root = dirname(__DIR__, 5);
    $contracts = [];
    foreach ([...glob($root.'/Modules/*/docs/contracts/*.md'), ...glob($root.'/Themes/*/docs/contracts/*.md')] as $path) {
        if (is_string($path) && ! in_array(strtolower(basename($path)), ['readme.md', 'index.md', '0000-template.md', '_template.md', 'template.md'], true)) {
            $contracts[] = $path;
        }
    }

    return $contracts;
}

/**
 * @return list<array{file: string, id: string, proofs: list<string>}> una riga per invariante; `proofs` vuoto = non dimostrata
 */
function invariantProofRows(): array
{
    $rows = [];
    foreach (invariantProofContractFiles() as $file) {
        $matches = [];
        // L'ID della prima cella può stare tra apici inversi (stile dei contratti di Xot) o nudo (gli altri pacchetti).
        preg_match_all('/^\|\s*`?('.INVARIANT_PROOF_ID.')`?\s*\|(.*)\|\s*$/m', file_get_contents($file), $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $cells = explode('|', $match[2]);
            $proofs = [];
            preg_match_all('/`([A-Z0-9][A-Z0-9-]*)`/', $cells[array_key_last($cells)], $proofs);
            $rows[] = ['file' => $file, 'id' => $match[1], 'proofs' => array_values($proofs[1])];
        }
    }

    return $rows;
}

/** @return array<string, true> ID dei group dichiarati nei test di tutti i moduli e temi */
function invariantProofDeclaredGroups(): array
{
    static $groups = null;
    if ($groups !== null) {
        return $groups;
    }

    $groups = [];
    $root = dirname(__DIR__, 5);
    foreach ([...glob($root.'/Modules/*/tests'), ...glob($root.'/Themes/*/tests')] as $directory) {
        if (! is_string($directory)) {
            continue;
        }
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS));
        foreach ($files as $file) {
            if (! $file instanceof SplFileInfo || $file->getExtension() !== 'php') {
                continue;
            }
            $source = file_get_contents($file->getPathname());
            if (stripos($source, 'group(') === false) {
                continue;
            }
            // Due forme: `->group('ID')` (Pest) e `#[Group('ID')]` (attributo PHPUnit, usato nei test a classe).
            $calls = [];
            preg_match_all('/(?:->group|#\[Group)\(([^)]*)\)/', $source, $calls);
            foreach ($calls[1] as $arguments) {
                $ids = [];
                preg_match_all('/[\'"]([A-Z0-9][A-Z0-9-]*)[\'"]/', $arguments, $ids);
                foreach ($ids[1] as $id) {
                    $groups[$id] = true;
                }
            }
        }
    }

    return $groups;
}

it('has a Pest group for every invariant a contract claims as proven', function (): void {
    $declared = invariantProofDeclaredGroups();
    $problems = [];
    foreach (invariantProofRows() as $row) {
        foreach ($row['proofs'] as $group) {
            if (! isset($declared[$group])) {
                $problems[] = basename(dirname($row['file'], 3)).'/'.basename($row['file']).': '.$row['id']
                    .' dichiara `'.$group.'` ma nessun test ha ->group(\''.$group.'\')';
            }
        }
    }

    expect($problems)->toBe([]);
})->group('contract-proof');

it('defines every invariant ID in exactly one contract', function (): void {
    $definedIn = [];
    foreach (invariantProofRows() as $row) {
        $definedIn[$row['id']][basename(dirname($row['file'], 3)).'/'.basename($row['file'])] = true;
    }
    $problems = [];
    foreach ($definedIn as $id => $files) {
        if (count($files) > 1) {
            $problems[] = $id.' e\' definito in '.implode(', ', array_keys($files));
        }
    }

    expect($problems)->toBe([]);
})->group('contract-proof');

it('has a contract row for every invariant group a test declares', function (): void {
    $defined = [];
    foreach (invariantProofRows() as $row) {
        $defined[$row['id']] = true;
    }
    $orphans = [];
    foreach (array_keys(invariantProofDeclaredGroups()) as $group) {
        if (preg_match('/^'.INVARIANT_PROOF_ID.'$/', (string) $group) === 1 && ! isset($defined[$group])) {
            $orphans[] = (string) $group;
        }
    }
    sort($orphans);

    expect($orphans)->toBe([]);
})->group('contract-proof');
