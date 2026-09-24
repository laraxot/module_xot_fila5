<<<<<<< HEAD
<<<<<<< .merge_file_5k59kv
=======
<<<<<<< .merge_file_vIvlEA
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Yu4C1v
=======
<<<<<<< HEAD
<<<<<<< .merge_file_zq8VWP
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_Z1KnwD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_dGvMn0
>>>>>>> .merge_file_p6DdLH
<<<<<<< .merge_file_5k59kv
=======
>>>>>>> .merge_file_tIAMKO
>>>>>>> .merge_file_Yu4C1v
---
name: issue-02-hasxotform
description: "Repo: git@github.com:laraxot/modulexotfila5.git"
metadata:
  type: bmad
---

<<<<<<< .merge_file_5k59kv
=======
<<<<<<< .merge_file_vIvlEA
=======
>>>>>>> .merge_file_Yu4C1v
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_5k59kv
=======
>>>>>>> .merge_file_tIAMKO
>>>>>>> .merge_file_Yu4C1v
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_5k59kv
=======
<<<<<<< .merge_file_vIvlEA
=======
=======
>>>>>>> .merge_file_Yu4C1v
<<<<<<< .merge_file_zq8VWP
=======
<<<<<<< .merge_file_Z1KnwD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_dGvMn0
>>>>>>> .merge_file_p6DdLH
<<<<<<< .merge_file_5k59kv
=======
>>>>>>> .merge_file_tIAMKO
>>>>>>> .merge_file_Yu4C1v
>>>>>>> laraxot/dev
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
