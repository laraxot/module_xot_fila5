---
title: "PHPStan zero errori su Modules"
type: story
module: Xot
epic: code-quality
status: superseded
track: quick-flow
qmd: "phpstan zero errori modules stub superseded by phpstan-modules-zero-swarm"
related:
  - ./phpstan-modules-zero-swarm.story.md
  - ./phpstan-modules-remediation.story.md
  - ./phpstan-modules-swarm-session.story.md
canonical: ./phpstan-modules-zero-swarm.story.md
---
# PHPStan zero errori su Modules

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

## Stato

**Superseded** dalla campagna attiva [phpstan-modules-zero-swarm.story.md](./phpstan-modules-zero-swarm.story.md)
(`Xot/phpstan-modules-zero-swarm`). Questo file resta come stub storico per i backlink.

## Contesto originale

PHPStan su `Modules` con obiettivo zero errori, senza `@phpstan-ignore`, baseline o
cast silenziatori. Standing order: `cd laravel && ./vendor/bin/phpstan analyse Modules`.

## Note (ancora valide, dettagli nella story canonica)

- Source-first; `mixed` last resort
- Swarm parallelo con lock; flock max-3
- Pest gate obbligatorio (o skip documentato su production)
- Non mass-delete docs; non toccare `vendor/`


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
