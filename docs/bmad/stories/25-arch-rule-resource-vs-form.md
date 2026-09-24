<<<<<<< HEAD
<<<<<<< .merge_file_bMRnKQ
=======
<<<<<<< .merge_file_5cTezV
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_fkO4oF
=======
<<<<<<< HEAD
<<<<<<< .merge_file_P3VNLD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_aNXj4c
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DUJojZ
>>>>>>> .merge_file_38Hamt
<<<<<<< .merge_file_bMRnKQ
=======
>>>>>>> .merge_file_CeKWRR
>>>>>>> .merge_file_fkO4oF
---
name: 25-arch-rule-resource-vs-form
description: "Repo: git@github.com:laraxot/modulexotfila5.git"
metadata:
  type: bmad
---

<<<<<<< .merge_file_bMRnKQ
=======
<<<<<<< .merge_file_5cTezV
=======
>>>>>>> .merge_file_fkO4oF
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_bMRnKQ
=======
>>>>>>> .merge_file_CeKWRR
>>>>>>> .merge_file_fkO4oF
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_bMRnKQ
=======
<<<<<<< .merge_file_5cTezV
=======
=======
>>>>>>> .merge_file_fkO4oF
<<<<<<< .merge_file_P3VNLD
=======
<<<<<<< .merge_file_aNXj4c
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DUJojZ
>>>>>>> .merge_file_38Hamt
<<<<<<< .merge_file_bMRnKQ
=======
>>>>>>> .merge_file_CeKWRR
>>>>>>> .merge_file_fkO4oF
>>>>>>> laraxot/dev
# BMAD Story 25 — Regola architetturale: XotBaseResource vs XotBaseResourceForm

**Repo:** `git@github.com:laraxot/module_xot_fila5.git`
**Modulo:** `Xot` (regola valida per tutti i moduli)
**Trigger:** `XotBaseResource` NON deve avere `getFormSchema()`; `XotBaseResourceForm` (via `HasXotForm`) SÌ (astratto).

## Regola
- `Modules\Xot\Filament\Resources\XotBaseResource` → NO `getFormSchema()` (è una Resource, non un Form)
- `Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm` → `abstract public function getFormSchema(): array` (SÌ, via `HasXotForm`)
- I file che estendono `XotBaseResource` NON devono dichiarare `getFormSchema()` (violazione architetturale)
- I file Schema (`*Form.php` che estendono `XotBaseResourceForm`) DEVONO implementare `getFormSchema()`

## Violazioni trovate (batch)
- `SnapshotResource.php`, `StoredEventResource.php` (Activity)
- `ArticleResource.php`, `BannerResource.php`, `CategoryResource.php` (Blog)
- `BomResource.php` (Bom)
- `Catalog*` (Catalog)
- `MenuResource.php` (Cms) — nota: ha anche `getFormSchemaOld()`
- Altri moduli (da verificare con `grep -rln`)

## Correzione
Per ogni file violazione: rimuovere `getFormSchema()` dalla Resource, mantenere nello Schema (`*Form.php`) tramite `XotBaseResourceForm`.
