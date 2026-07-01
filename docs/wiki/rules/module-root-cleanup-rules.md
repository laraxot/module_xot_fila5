---
title: "Module root cleanup rules"
type: rule
tags: [module, structure, cleanup, naming, root-hygiene]
created: 2026-01-21
updated: 2026-07-01
qmd: "module root no txt files no uppercase folders only readme"
issues: []
discussions: []
related:
  - ../../../../../../docs/wiki/memories/module-root-hygiene.md
  - ../concepts/module-root-uppercase-folders-archive.md
---

# Module root cleanup rules

## Root `laravel/Modules/<Modulo>/`

### File `.txt`

- **Vietato** nella root
- Spostare in `docs/raw/root-import/` (nome lowercase) o convertire in `.md` se è conoscenza da wiki

### File `.md`

- **Solo** `README.md` in root
- Tutti gli altri: studiare → sistemare (frontmatter se wiki) → `docs/raw/` o `docs/wiki/`
- Nomi: minuscolo, trattini, **no date** nel filename

### Cartelle

- Solo **lowercase** alla root (`app`, `config`, `database`, `docs`, `helpers`, …)
- **Vietato**: `Config/`, `Helpers/`, `Services/`, `Datas/`, `Filament/` alla root del modulo
- Canonico Xot: `app/Datas/`, `app/Filament/`, `app/Helpers/`, `helpers/Helper.php`, `config/`

## Audit e fix automatici

```bash
bash bashscripts/tools/audit-module-root-hygiene.sh
bash bashscripts/tools/audit-module-root-hygiene.sh Notify
bash bashscripts/tools/fix-module-root-hygiene.sh
```

## Check pre-commit

Eseguire l'audit prima di commit che toccano la root di un modulo.
