---
title: "phpstan-analyse-modules-24.story (alias)"
status: superseded
superseded_by: "./phpstan-analyse-modules.story.md"
type: alias
updated: 2026-11-24
qmd: "xot phpstan-analyse-modules-24.story alias"
---
# Alias

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

Contenuto consolidato in [./phpstan-analyse-modules.story.md](./phpstan-analyse-modules.story.md).


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
