---
title: "Decision log — Xot"
type: decision-log
module: Xot
status: active
created: 2026-10-16
updated: 2026-10-19
tags: [bmad, decision-log, xot]
qmd: "decision log xot"
related:
  - ../bmad-planning.md
  - ../bmad-brainstorming.md
  - ./project-context.md
---

# Decision log — Xot

## 2026-10-19 — Il modello della migration sta nel nome file

- **Decisione:** su `*_create_{modello}_table.php` non si scrive `$model_class`.
  `XotBaseMigration::getModelClass()` prende il modello da `_create_` … `_table.php`
  e il modulo dal path (`Modules\{Modulo}\Models\{Modello}`).
- **Perché:** la riga esplicita duplica un contratto che il file ha già.
  `$model_class` resta solo quando il nome file non segue quel contratto.

## 2026-10-16 — Kit BMAD owner

- **Decisione:** adottare `docs/bmad-planning.md` + `docs/bmad-brainstorming.md` + `docs/bmad/filament-blueprint.md` come SSoT di planning per questo owner.
- **Perche:** rimuovere stub copiati "Ticket Timeline" non pertinenti; allineare second brain e Filament blueprint allo scopo reale.
- **Track:** `bmad-method`
