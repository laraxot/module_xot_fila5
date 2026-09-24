<<<<<<< .merge_file_MDK1Bj
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_PcgmPA
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< .merge_file_PcgmPA
<<<<<<< HEAD
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
---
module: theme
topic: translation-structure
canonical: ../../../Themes/docs/shared-components/TRANSLATION_STRUCTURE.md
---

See canonical documentation: ../../../Themes/docs/shared-components/TRANSLATION_STRUCTURE.md
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> da9ae01a0 (.)
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_VnEtbB
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_NDBPYd
# Translation Directory Structure

## Rule: No `lang/lang/` Redundancy

Translation directories must follow Laravel convention:

```
Modules/ModuleName/lang/{locale}/file.php
```

**NOT**:
```
Modules/ModuleName/lang/lang/{locale}/file.php  ← WRONG
```

### Why

- DRY principle: `lang/lang/` is redundant
- Laravel expects `lang/{locale}/` directly
- Prevents path resolution confusion

### Fixed

- 2026-03-12: Removed `Job/lang/lang/` and `User/lang/lang/`

### Reference

See `project_docs/TRANSLATION_DIRECTORY_RULES.md` for full details.
<<<<<<< .merge_file_MDK1Bj
<<<<<<< HEAD
=======
<<<<<<< .merge_file_PcgmPA
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
=======
---
module: theme
topic: translation-structure
canonical: ../../../Themes/docs/shared-components/TRANSLATION_STRUCTURE.md
---

See canonical documentation: ../../../Themes/docs/shared-components/TRANSLATION_STRUCTURE.md
>>>>>>> .merge_file_VnEtbB
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_NDBPYd
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
