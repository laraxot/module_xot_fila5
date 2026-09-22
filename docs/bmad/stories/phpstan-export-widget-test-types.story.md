---
id: "xot-phpstan-export-test-types"
title: "PHPStan: CollectionExport WithMapping<mixed> + test types"
status: review
scope: module:Xot
related:
  - ./collection-export-intestazioni-esplicite.story.md
  - ../../../app/Exports/CollectionExport.php
  - ../../../tests/Unit/Exports/CollectionExportLabelledFieldsTest.php
  - ../../../tests/Unit/Exports/XotBaseExporterTest.php
qmd: "phpstan CollectionExport WithMapping mixed labelledRows XotBaseExporter filters"
---

# PHPStan 19 — metà Xot export tests

**Perché.** `map()` gia' accettava `mixed` (array rows + `data_get` sui path rating).
`@implements WithMapping<Model>` mentiva e faceva fallire i test che esportano array.
`Collection` e' invariante: `Collection<int, array<...>>` ≠ `Collection<int|string, mixed>`.

## Fix

- `CollectionExport`: `@implements WithMapping<mixed>`
- `labelledRows()`: return `Collection<int|string, mixed>`
- `resolveExporterColumns`: `@param array<string, mixed> $filters`

PHPStan sui file: 0. `analyse Modules` da rilanciare. Pest skip (DB 53).
