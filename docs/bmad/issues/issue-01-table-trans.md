<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_1OyY5C
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_twtNwX
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_cOWpO7
>>>>>>> .merge_file_pPMTif
---
name: issue-01-table-trans
description: "Repo: git@github.com:laraxot/modulexotfila5.git"
metadata:
  type: bmad
---

<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_1OyY5C
=======
<<<<<<< .merge_file_twtNwX
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_cOWpO7
>>>>>>> .merge_file_pPMTif
>>>>>>> laraxot/dev
# Issue GH #01 — Rimuovere TransTrait ridondante da XotBaseResourceTable

**Repo:** `git@github.com:laraxot/module_xot_fila5.git`
**Title:** `[Xot] Rimuovere TransTrait ridondante da XotBaseResourceTable`
**Labels:** `refactor`, `xot`, `traits`

## Descrizione
`XotBaseResourceTable` importa `TransTrait` due volte (dichiarazione + `use`), ma il trait `HasXotTable` (già usato) lo include. La duplicazione va eliminata per evitare futuri conflitti di composizione e warning static analyzer.

## Plan
Vedi `docs/bmad/stories/01-refactor-table-trans.md`.

## Checklist
- [ ] Rimuovere `use Modules\Xot\Filament\Traits\TransTrait;`
- [ ] Rimuovere `use TransTrait;`
- [ ] PHPStan livello 6 verde
- [ ] Verifica: `grep -rn "TransTrait" app/Filament/Resources/Tables/XotBaseResourceTable.php` → 0

## Comandi
```bash
cd laravel/Modules/Xot
gh issue create --title "[Xot] Rimuovere TransTrait ridondante da XotBaseResourceTable" \
  --body-file docs/bmad/issues/issue-01-table-trans.md \
  --label refactor --label xot --label traits
```

## Backlink
- Story: `docs/bmad/stories/01-refactor-table-trans.md`
- Discussion: `docs/bmad/discussions/01-traits-composition.md`
