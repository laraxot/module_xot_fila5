---
title: PHPStan Modules full scan — verifica 0 errori
qmd: phpstan modules scan 2026-11-25 devin zero errors larastan stale cache
epic: Xot
status: done
---

# PHPStan Modules full scan — 2026-11-25 (devin)

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
