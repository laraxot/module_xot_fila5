<<<<<<< HEAD
<<<<<<< .merge_file_PUGNr5
=======
<<<<<<< .merge_file_oluWYz
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_GBuWPU
=======
<<<<<<< HEAD
<<<<<<< .merge_file_Msa9mA
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< .merge_file_N7No2T
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_IxYfUn
>>>>>>> .merge_file_gD26w4
<<<<<<< .merge_file_PUGNr5
=======
>>>>>>> .merge_file_vPGSaH
>>>>>>> .merge_file_GBuWPU
---
name: 04-refactor-infolist
description: "Repo: git@github.com:laraxot/modulexotfila5.git"
metadata:
  type: bmad
---

<<<<<<< .merge_file_PUGNr5
=======
<<<<<<< .merge_file_oluWYz
=======
>>>>>>> .merge_file_GBuWPU
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_PUGNr5
=======
>>>>>>> .merge_file_vPGSaH
>>>>>>> .merge_file_GBuWPU
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_PUGNr5
=======
<<<<<<< .merge_file_oluWYz
=======
=======
>>>>>>> .merge_file_GBuWPU
<<<<<<< .merge_file_Msa9mA
=======
<<<<<<< .merge_file_N7No2T
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_IxYfUn
>>>>>>> .merge_file_gD26w4
<<<<<<< .merge_file_PUGNr5
=======
>>>>>>> .merge_file_vPGSaH
>>>>>>> .merge_file_GBuWPU
>>>>>>> laraxot/dev
# BMAD Story 04 — XotBaseResourceInfolist: istanza + HasXotInfolist

**Repo:** `git@github.com:laraxot/module_xot_fila5.git`
**File:** `app/Filament/Resources/Schemas/XotBaseResourceInfolist.php`
**Branch:** `refactor/xot-base-resource-infolist-instance`

## Contesto
Replicare la logica di `XotBaseResourceForm` (story 03): istanza non statica, metodi `getInfolistSchema()` non statici, `configure()` statico che delega via `app(static::class)`. Manca il trait `HasXotInfolist`.

## Azioni
1. Creare `app/Filament/Traits/HasXotInfolist.php` con `infolist(Schema $schema): Schema` istanza e `getInfolistColumns(): int` (default 2)
2. `XotBaseResourceInfolist` aggiunge `use HasXotInfolist;`
3. `getInfolistSchema(): array` diventa non statico
4. `configure()` resta `final public static`, delega a `app(static::class)->infolist($schema)`
5. Niente regressioni sulle view Filament esistenti

## Acceptance criteria
- `grep -n "use HasXotInfolist" app/Filament/Resources/Schemas/XotBaseResourceInfolist.php` → 1
- PHPStan livello 6 verde
- `php artisan view:cache` non lancia errori

## Backlink
- Issue GH: `docs/bmad/issues/issue-04-infolist.md`
- Discussion: `docs/bmad/discussions/01-traits-composition.md`
