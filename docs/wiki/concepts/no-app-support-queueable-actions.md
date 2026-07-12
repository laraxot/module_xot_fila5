---
title: "no app/Support — Actions e Adapters"
type: concept
tags: [xot, actions, adapters, queueable-action, support, refactor]
created: 2026-07-12
updated: 2026-07-12
qmd: "Xot module no app Support PanelModule PdfBuilder PaDesignColors MorphToOne"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/372"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - ../../../../docs/wiki/rules/queueable-action-trait-mandatory.md
  - filament-pa-design-colors.md
  - ../../User/docs/wiki/concepts/no-app-support-queueable-actions.md
---

# no `app/Support/` — Actions e Adapters

## Scopo

Nel modulo Xot **non** esiste più `app/Support/`. Multi-metodo su contratti/framework → `app/Adapters/`; logica singola → `app/Actions/` con `QueueableAction` + `execute()`.

## Migrazione (2026-07-12)

| Legacy `app/Support/` | Destinazione |
|----------------------|--------------|
| `PanelModuleResolver` | `Adapters/Filament/PanelModuleAdapter` |
| `PanelModuleSupport` | Eliminato (duplicato morto) |
| `PdfBuilderAdapter` | `Adapters/PdfBuilderAdapter` |
| `PaDesignColors` | `Actions/Design/GetPaFilamentPaletteAction` |
| `MorphToOneRelationSupport` | `Actions/Model/CreateMorphToOneRelatedModelAction` |

## Perché

- **Adapter**: binding multi-metodo (`PdfBuilderContract`, Filament Panel ↔ nwidart)
- **Action**: palette PA, create MorphToOne — un entrypoint `execute()`
- `MetatagData` / `XotServiceProvider` delegano a `GetPaFilamentPaletteAction`

## Collegamenti

- [filament-pa-design-colors.md](filament-pa-design-colors.md)
- [queueable-action-trait-mandatory.md](queueable-action-trait-mandatory.md)
