---
tags: [documentation]
created: 2026-09-26
qmd: "phpstan merge parse recovery 2026 09 25.story"
issues: []
discussions: []
title: "PHPStan merge parse recovery — Xot contract"
type: story
module: Xot
epic: quality
story_id: "phpstan-merge-parse-recovery-2026-09-25"
status: done
updated: 2026-09-25
---
# Problema

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

La scansione PHPStan terminava con un fatal parse error in `HasRecursiveRelationshipsContract`: il file conteneva marker annidati e due dichiarazioni incompatibili di `newEloquentBuilder()`.

# Risoluzione

Confrontate base e varianti dell’indice. È stata mantenuta la variante integra che conserva il contratto di adjacency list, le proprietà PHPDoc e `getLabel()`, con una sola firma tipizzata `newEloquentBuilder(Builder $query)`.

# Criteri di accettazione

- [x] Nessun marker di merge nel contratto.
- [x] Una sola dichiarazione di `newEloquentBuilder()`.
- [x] Verifica `php -l` superata.
- [ ] PHPStan globale finale: eseguito dal coordinamento principale.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
