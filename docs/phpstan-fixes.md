---
title: "phpstan fixes"
type: note
tags: [phpstan, xot, tests]
updated: 2026-10-20
qmd: "phpstan fixes xot wave r3 test guard"
status: draft
---

# Xot Module — PHPStan

## 2026-10-20 — wave r3 · gate modulo

```bash
cd laravel && php -d memory_limit=2048M ./vendor/bin/phpstan analyse Modules/Xot
# [OK] No errors
```

Test toccati: `HasCustomRelationsTest` (asserzione su `CustomRelation`); coverage pivot/morph con `getTable()`; `FixStructureTest.pest.php` (`PendingCommand` prima di `assertExitCode`); `XotHundredPercentCoverageTest` (`XotData::make()` in asserzione).

Stato coordinamento inter-modulo: [bmad/phpstan-status.md](./bmad/phpstan-status.md).

**Vincolo HasRecursiveRelationshipsContract**: solo PHPDoc sui metodi del contratto — niente return type nativi (compatibilità trait vendor / Rating).
