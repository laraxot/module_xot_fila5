<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_tz3meF
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_OHq1SR
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ax8pSZ
>>>>>>> .merge_file_zroUHY
---
name: 09-intervention-phpstan
description: "Modulo: Intervention"
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
<<<<<<< .merge_file_tz3meF
=======
<<<<<<< .merge_file_OHq1SR
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ax8pSZ
>>>>>>> .merge_file_zroUHY
>>>>>>> laraxot/dev
# BMAD Story 09 — Intervention: 21 errori PHPStan

**Modulo:** `Intervention`
**Stato:** TODO
**Coordinamento:** `docs/swarm/INDEX.md` (agent-d)

## File da analizzare
- `app/Filament/Resources/InterventionResource/Schemas/InterventionForm.php`
- `app/Filament/Resources/InterventionResource/Tables/InterventionsTable.php`
- `app/Filament/Resources/InterventionResource.php`
- `app/Filament/Resources/DailyNoteResource/Schemas/DailyNoteForm.php`

## Quality gate
```bash
cd laravel/Modules/Intervention
../../vendor/bin/phpstan analyse . --no-progress --memory-limit=-1
```
