---
title: "PHPStan zero + merge markers — Xot (2026-11-25)"
type: story
module: Xot
status: done
epic: code-quality
track: quick-flow
story_id: phpstan-zero-merge-markers-xot
qmd: "xot merge markers phpstan XotData getUserByEmail InstructionReferences ClassResolution"
related:
  - ./phpstan-conflict-markers-bootstrap.story.md
  - ./phpstan-modules-zero-swarm.story.md
---
# PHPStan zero + merge markers — Xot

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

## Perché

Core contracts/datas: `XotData::getUserByEmail` deve usare `new $user_class()`;
test unitari con marker su path CLAUDE/docs non devono riferire Geo/Notify fantasmi.

## Lock

`bashscripts/lock/phpstan-zero-20261125-Xot.lock`

## Acceptance criteria

1. [x] `XotData::getUserByEmail` → `new $user_class()` (già corretto; verificato)
2. [x] Zero marker in `app/` e `tests/**/*.php`
3. [x] PHPStan `Modules/Xot` exit 0

## File chiave

| File | Decisione |
|------|----------|
| `app/Datas/XotData.php` | `new $user_class()` confermato |
| `tests/.../InstructionReferencesExistTest.php` | Root CLAUDE locali (no Geo) |
| `tests/.../ClassResolutionUsesGetClassNameTest.php` | Ref `Ptv/docs/...` |

## Gate

- PHPStan Xot: 0 errori (exit 0)


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
