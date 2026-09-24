<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_a5S7V4
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_zOKU8Y
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_8UqWEH
>>>>>>> .merge_file_f7pN70
---
name: 05-viewrecord-infolist-override
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
<<<<<<< .merge_file_a5S7V4
=======
<<<<<<< .merge_file_zOKU8Y
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_8UqWEH
>>>>>>> .merge_file_f7pN70
>>>>>>> laraxot/dev
# BMAD Story 05 — ViewRecord non ridefinisce getInfolistSchema

**Repo:** `git@github.com:laraxot/module_xot_fila5.git`
**File:** `app/Filament/Resources/Pages/XotBaseViewRecord.php`
**Trigger:** `#[\Override]` su `getInfolistSchema()` rompe il parent inesistente.

## Regola
`XotBaseViewRecord` non espone `getInfolistSchema()`. Le pagine concrete non devono ridefinirlo; l'infolist è gestito da `XotBaseResourceInfolist` con schema separato (`Schemas/ResourceInfolist.php`).

## Acceptance criteria
- Nessun `getInfolistSchema` in `Modules/*/app/Filament/Resources/Pages/*.php`
- PHPStan 0 errori su `Modules/Xot` e `Modules/Geo`
