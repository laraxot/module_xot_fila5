---
title: "github discussion xot form infolist"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "github discussion xot form infolist"
issues: []
discussions: []
---

# Discussion: Unifying Form/Infolist base with traits HasXotForm / HasXotInfolist

Repo: laraxot/module_xot_fila5
Context: BMAD structural-change-form-infolist story.
Points:
- Trait provides `getFormColumns()` / `getInfolistColumns()` (default 2), instance-level configuration.
- Resources extend abstract base; `configure()` builds via `app(static::class)` (same as `XotBaseResourceTable`).
- Prevents static-method inheritance errors (`#[\Override]` mismatches) across User/Modules.
