<<<<<<< HEAD
<<<<<<< .merge_file_pvoJSD
=======
<<<<<<< .merge_file_IMpNVS
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_7JTjdP
=======
<<<<<<< HEAD
<<<<<<< .merge_file_tFQzrS
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_ERiHyX
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_q8WYVW
>>>>>>> .merge_file_CRYYwr
<<<<<<< .merge_file_pvoJSD
=======
>>>>>>> .merge_file_DsZQ87
>>>>>>> .merge_file_7JTjdP
---
name: 25f-tests-getformschema
description: "Modulo: multi (Activity, Cms, Job, Lang, Media, Notify, Tenant, User)"
metadata:
  type: bmad
---

<<<<<<< .merge_file_pvoJSD
=======
<<<<<<< .merge_file_IMpNVS
=======
>>>>>>> .merge_file_7JTjdP
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_pvoJSD
=======
>>>>>>> .merge_file_DsZQ87
>>>>>>> .merge_file_7JTjdP
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_pvoJSD
=======
<<<<<<< .merge_file_IMpNVS
=======
=======
>>>>>>> .merge_file_7JTjdP
<<<<<<< .merge_file_tFQzrS
=======
<<<<<<< .merge_file_ERiHyX
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_q8WYVW
>>>>>>> .merge_file_CRYYwr
<<<<<<< .merge_file_pvoJSD
=======
>>>>>>> .merge_file_DsZQ87
>>>>>>> .merge_file_7JTjdP
>>>>>>> laraxot/dev
# 25f — Correggere test con static call getFormSchema() su Resource

**Modulo:** multi (Activity, Cms, Job, Lang, Media, Notify, Tenant, User)
**File:** `tests/*/*/*Test.php` che chiamano `Resource::getFormSchema()`
**Fix:** sostituire con `app(ResourceSchema::class)->getFormSchema()` o rimuovere test non più valido.
**Regola BMAD:** `getFormSchema()` non è su `XotBaseResource` ma su `XotBaseResourceForm`.

**File noti:**
- Activity: `tests/Feature/FilamentTest.php`, `tests/Unit/Filament/ResourceExtensionTest.php`
- Cms: `tests/Unit/Filament/Resources/*.php`
- Job, Lang, Media, Notify, Tenant, User
