---
title: "No shared Xot empty.php route require"
status: done
updated: 2026-11-24
qmd: "empty.php routes require ADR UI Lang Cms"
---
# Story — no shared empty route file

## Context and Problem Statement

`require base_path('Modules/Xot/routes/empty.php')` is cargo-cult: the file does not exist, adds cross-module coupling for zero routes, and arrived via unresolved merge markers.

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Why

`require base_path('Modules/Xot/routes/empty.php')` is cargo-cult: the file does not exist, adds cross-module coupling for zero routes, and arrived via unresolved merge markers.

## Done when

- [x] Conflict markers gone from UI/Lang/Cms route stubs
- [x] No `Xot/routes/empty` references under `Modules/`
- [x] ADR accepted: `docs/adr/0029-no-shared-empty-route-file.md`
- [x] ADR index updated


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
