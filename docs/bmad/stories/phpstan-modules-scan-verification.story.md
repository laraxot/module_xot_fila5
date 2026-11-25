---
title: PHPStan Modules full scan — verifica 0 errori
qmd: phpstan modules scan 2026-11-25 devin zero errors larastan stale cache
epic: Xot
status: done
---
# PHPStan Modules full scan — 2026-11-25 (devin)

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

## Esito

- `php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules --error-format=raw --no-progress` con `/tmp/phpstan` cancellato (cache fresca): **exit 0, 0 errori**.
- Primo run sul result-cache esistente ha mostrato 7 errori in `Modules/Activity/tests/Unit/*` (class.notFound TestCase, pest redundants, ReflectionType::getName): **falsi positivi da `larastan_migrations.*.cache` stale**. Dopo pulizia cache: 0 errori.
- Grep `<<<<<<<` su `laravel/Modules/**/*.php`: match solo nei test `NoConflictMarkers*Test` (pattern letterali). Nessun marker committato residuo nel codice PHP.

## Conclusione

Baseline PHPStan level max resta a 0 errori. Nessuna modifica codice necessaria. Pest saltato: nessun file applicativo toccato (gate proporzionato).

## Debiti ereditati (non di questa sessione)

- `Xot/merge-conflict-markers-md-bonifica` (in-progress): ~3650 file non-PHP con marker.
- `Xot/merge-conflict-markers-committed-bonifica` (in-progress): verificare chiusura lato PHP.
- `Xot/phpstan-modules-bootstrap-duplicate-lines` (review): Pest bloccato da TestDatabaseGuard.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
