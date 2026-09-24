---
title: "no app/Support — Actions e Adapters"
type: concept
tags: [xot, actions, adapters, queueable-action, support, refactor]
created: 2026-07-12
updated: 2026-07-13
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
<<<<<<< HEAD
<<<<<<< .merge_file_waEJPb
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_4yvlhx
<<<<<<< HEAD
=======
>>>>>>> .merge_file_AUewK4
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_3kwnDH
=======
=======
<<<<<<< HEAD
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
| `PaDesignColors` | `Actions/PaDesignColorsAction` (`filamentPalette()` + `execute()`) |
| `MorphToOneRelationSupport` | `Actions/Model/CreateMorphToOneRelatedModelAction` |

## Chiusura `app/Services` (2026-07-13)

- `HtmlService::toPdf()` → `Actions/Html/HtmlToPdfAction`.
- `RouteService` → otto Action nel contesto `Actions/Route/`, una per use case.
- Il solo chiamante runtime storico di `RouteService::inAdmin()` usa ora l'helper globale canonico.
- Nessuna facade multi-metodo e nessuna injection Action→Action: il bordo pubblico resta
  `app(Action::class)->execute(...)`.
<<<<<<< HEAD
<<<<<<< .merge_file_waEJPb
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_4yvlhx
=======
>>>>>>> 930f8146 (Check & fix styling)
=======
| `PaDesignColors` | `Actions/Design/GetPaFilamentPaletteAction` |
| `MorphToOneRelationSupport` | `Actions/Model/CreateMorphToOneRelatedModelAction` |

**Nota (2026-07-13):** nessun duplicato `ResolvePanelModuleAction` — panel multi-metodo resta solo su `PanelModuleAdapter`.
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_AUewK4
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_3kwnDH
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

## Perché

- **Adapter**: binding multi-metodo (`PdfBuilderContract`, Filament Panel ↔ nwidart)
- **Action**: palette PA, create MorphToOne — un entrypoint `execute()`
- `MetatagData` / `XotServiceProvider` delegano a `GetPaFilamentPaletteAction`

## Collegamenti

- [filament-pa-design-colors.md](filament-pa-design-colors.md)
- [queueable-action-trait-mandatory.md](queueable-action-trait-mandatory.md)
