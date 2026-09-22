---
title: "Continuazione BMAD — Domani (XotBaseExporter/CollectionExport)"
type: module-fix
scope: Xot
epic: "5"
bmad_version: v3.30.1
updated_at: '2026-09-22'
status: in-progress
related:
  - export-eager-load-contract.story.md
  - ../../../Ptv/docs/bmad/stories/5.151-export-scheda-xls-parity.story.md
  - ../../../Ptv/docs/bmad/stories/5.157-export-xls1-crash-cross-module-ratings.story.md
---

# Xot — Continuazione Domani

## Stato verificato ora (sessione 2026-09-22)

- `CollectionExport::castCell()` pubblico, condiviso da `CollectionExport::map()`
  e `XotBaseExporter::resolveColumns()`'s `state()` — unica cella per entrambi
  i canali di export (custom `export_xls` e nativo `export_xls1`).
- `XotBaseExportAction` (`app/Filament/Actions/XotBaseExportAction.php`,
  unica definizione — il duplicato orfano in `app/Filament/Actions/Header/`
  e' stato rimosso) serializza `resource` + `tableFilters` + `livewireClass`
  negli `options`, cosi' `XotBaseExporter::getCachedColumns()` (nel job) usa
  lo stesso `GetTransKeyAction` input del canale custom.
- PHPStan max isolato (tmpDir dedicato) su tutti i file toccati inclusa
  `XotBaseExporterTest.php`: **0 errori**. `git status`: pulito, pushato.
- Pest non eseguito: DB 10.100.200.53 down (verificato 2x oggi,
  `nc -z -w3 10.100.200.53 3306`). Stesso bug noto `QG_DB_DOWN`.

## Priorita' domani

1. **`export-eager-load-contract`** (ready) — `XotBaseExporter`/`ExportXlsAction`
   hanno `ratings`/`ratingMorphs` hardcoded (accoppiamento a Rating). Proposta:
   `getXlsEagerLoad()` sul Resource, letto da entrambi i canali. E' il fix
   "pulito" per il crash cross-modulo documentato in
   `Ptv/5.157-export-xls1-crash-cross-module-ratings` (todo, alta priorita':
   `SchedaExporter::modifyQuery()` fa `with(['ratings','ratingMorphs'])` senza
   guardia, esplode su model Performance/Progressioni che non hanno quelle
   relation). Valutare insieme, non in isolamento — stessa causa radice.
2. Pest: riprovare l'intera suite Xot (in particolare
   `tests/Unit/Exports/XotBaseExporterTest.php`) appena il DB e' raggiungibile.

## Second brain

`qmd query` su "XotBaseExporter getXlsEagerLoad ratings hardcoded" prima di
riprendere; `qmd update` dopo ogni chiusura.
