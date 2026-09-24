<<<<<<< HEAD
<<<<<<< .merge_file_uu1iS0
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
<<<<<<< .merge_file_YeLZZ3
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_byfRWx
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Vkj6JN
>>>>>>> .merge_file_KRvkT7
>>>>>>> .merge_file_x494jk
---
name: 01-refactor-table-trans
description: "Repo: git@github.com:laraxot/modulexotfila5.git"
metadata:
  type: bmad
---

<<<<<<< .merge_file_uu1iS0
=======
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_x494jk
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_uu1iS0
=======
=======
<<<<<<< .merge_file_YeLZZ3
=======
<<<<<<< .merge_file_byfRWx
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Vkj6JN
>>>>>>> .merge_file_KRvkT7
>>>>>>> .merge_file_x494jk
>>>>>>> laraxot/dev
# BMAD Story 01 — Rimuovere TransTrait ridondante

**Repo:** `git@github.com:laraxot/module_xot_fila5.git`
**File:** `app/Filament/Resources/Tables/XotBaseResourceTable.php`
**Branch:** `fix/xot-base-resource-table-trans-trait`

## Contesto
`XotBaseResourceTable` dichiara `use TransTrait;` ma il trait `HasXotTable` (già usato dalla classe astratta) lo include internamente. Composizione doppia non necessaria.

## Azioni
1. Rimuovere `use Modules\Xot\Filament\Traits\TransTrait;` (linea 10)
2. Rimuovere `use TransTrait;` (linea 22)
3. Nessun cambiamento semantico: `trans()` resta disponibile via `HasXotTable`

## Acceptance criteria
- `grep -rn "TransTrait" app/Filament/Resources/Tables/XotBaseResourceTable.php` → 0 risultati
- PHPStan livello 6 verde
- `php artisan` non lancia eccezioni

## Backlink
- Issue GH: `docs/bmad/issues/issue-01-table-trans.md`
- Discussion: `docs/bmad/discussions/01-traits-composition.md`
