---
title: "PHPStan fix modulo Xot — 5 errori azzerati"
type: story
status: done
epic: Xot
qmd: "phpstan xot trait unused requiresoperationalpermissions safe functions pest symlink"
related:
  - ./phpstan-modules-remediation.story.md
  - ../../wiki/decisions/module-admin-role-policy-bypass.md
---
# PHPStan fix modulo Xot — 5 errori azzerati

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

Cluster E della remediation `phpstan-modules-remediation`.

## Errori e fix

| File | Errore | Fix |
|---|---|---|
| `app/Models/Policies/Concerns/RequiresOperationalPermissions.php` | `trait.unused` | Wired via `OperationalXotBasePolicy` (base per moduli operativi Roosko/Waste). |
| `tests/Unit/ThemePublicSymlinkTest.php:27` | `glob` unsafe | `use function Safe\glob` + guard `is_string` (Safe\glob ritorna `list<mixed>`). |
| `tests/Unit/ThemePublicSymlinkTest.php:40` | `readlink` unsafe | `use function Safe\readlink`. |
| `tests/Unit/ThemePublicSymlinkTest.php:54` | `toBeTrue()` ridondante | Rimosso `expect(true)`; assertion significativa `is_dir($themeDir)` nel ramo senza `package.json` (evita anche Pest risky). |
| `tests/Unit/ThemePublicSymlinkTest.php:59` | `file_get_contents` unsafe | `use function Safe\file_get_contents` (ritorna `string`). |

## Ambiente

`public_html/themes/{One,Zero}` erano file di testo (checkout con `core.symlinks=false`
materializza i symlink git come copie). Convertiti in symlink reali
`../../laravel/Themes/{One,Zero}/public`, come da SSoT
`docs/wiki/rules/theme-public-symlink.md`. `git status` resta pulito.

## Esito

- `phpstan analyse Modules/Xot` → **0 errori, exit 0**.
- `pest` ThemePublicSymlinkTest + RequiresOperationalPermissionsTest → **8 passed (12 assertions)**.
- `XotBasePolicyTest` ha 1 failure **pre-esistente** (`hasRole('xot::admin')` non mockato):
  file lockato da altro agente (`codex-root`, task `xot-policy-ability-deny`) — non toccato,
  fix lasciato al detentore del lock.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
