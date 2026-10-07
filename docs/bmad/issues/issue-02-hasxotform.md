---
title: "issue 02 hasxotform"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "issue 02 hasxotform"
issues: []
discussions: []
---

# Issue GH #02 — HasXotForm: istanza + colonne dinamiche

**Repo:** `git@github.com:laraxot/module_xot_fila5.git`
**Title:** `[Xot] HasXotForm: form() istanza, ->columns($this->getFormColumns())`
**Labels:** `refactor`, `xot`, `filament`, `forms`

## Descrizione
`HasXotForm` deve esporre `form()` come metodo di istanza e leggere `getFormColumns()` invece del valore hardcoded `2`.

## Plan
Vedi `docs/bmad/stories/02-refactor-hasxotform.md`.

## Checklist
- [ ] `form()` non statico
- [ ] `getFormColumns()` non statico
- [ ] `getFormSchema()` non statico (già astratto)
- [ ] `->columns(2)` rimosso
- [ ] `->columns($this->getFormColumns())` aggiunto
- [ ] PHPStan livello 6 verde

## Comandi
```bash
cd laravel/Modules/Xot
gh issue create --title "[Xot] HasXotForm: form() istanza, ->columns(\$this->getFormColumns())" \
  --body-file docs/bmad/issues/issue-02-hasxotform.md \
  --label refactor --label xot --label filament --label forms
```

## Backlink
- Story: `docs/bmad/stories/02-refactor-hasxotform.md`
- Discussion: `docs/bmad/discussions/01-traits-composition.md`
