<<<<<<< HEAD
<<<<<<< .merge_file_kARtLV
=======
<<<<<<< .merge_file_TXpRAn
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_imqleF
=======
<<<<<<< HEAD
<<<<<<< .merge_file_iwrm4y
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_wfoLQe
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_jU8TMc
>>>>>>> .merge_file_aqGKLA
<<<<<<< .merge_file_kARtLV
=======
>>>>>>> .merge_file_ayPJpT
>>>>>>> .merge_file_imqleF
---
name: 07-hr-table-filters
description: "Repo: git@github.com:laraxot/modulexotfila5.git"
metadata:
  type: bmad
---

<<<<<<< .merge_file_kARtLV
=======
<<<<<<< .merge_file_TXpRAn
=======
>>>>>>> .merge_file_imqleF
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_kARtLV
=======
>>>>>>> .merge_file_ayPJpT
>>>>>>> .merge_file_imqleF
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_kARtLV
=======
<<<<<<< .merge_file_TXpRAn
=======
=======
>>>>>>> .merge_file_imqleF
<<<<<<< .merge_file_iwrm4y
=======
<<<<<<< .merge_file_wfoLQe
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_jU8TMc
>>>>>>> .merge_file_aqGKLA
<<<<<<< .merge_file_kARtLV
=======
>>>>>>> .merge_file_ayPJpT
>>>>>>> .merge_file_imqleF
>>>>>>> laraxot/dev
# BMAD Story 07 — HR: compatibilità getTableFilters()

**Repo:** `git@github.com:laraxot/module_xot_fila5.git`
**Modulo:** `HR`
**File:** `Modules/HR/app/Filament/Resources/AbsenceRequestResource/Tables/AbsenceRequestsTable.php`
**Errore:** `method.childReturnType` — `getTableFilters()` deve restituire `array<int|string, BaseFilter>` (come `XotBaseResourceTable`), non `array<string, Action>`.

## Azione
Correggere il type hint del return della filtrazione.
