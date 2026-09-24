---
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
title: "Module root cleanup rules"
type: rule
tags: [module, theme, structure, cleanup, naming, root-hygiene]
created: 2026-01-21
updated: 2026-07-08
qmd: "module theme root no txt max four md readme changelog license agents nwidart no uppercase folders sacred manifest never delete"
issues:
  - "https://github.com/laraxot/base_ptvx_fila5/issues/124"
  - "https://github.com/laraxot/base_techplanner_fila5/issues/39"
discussions:
  - "https://github.com/laraxot/base_ptvx_fila5/discussions/273"
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
related:
  - ../../../../../../docs/wiki/memories/module-theme-root-hygiene.md
  - ../../../../../../docs/wiki/concepts/nwidart-module-skeleton-contract.md
  - ../../../../../../.cursor/rules/module-root-hygiene.mdc
---

# Module & theme root cleanup rules

## Perché

La root di modulo/tema è il **contratto nwidart** visibile a CI, Dependabot e agenti. File spuri (.txt, decine di .md) creano rumore, collisioni Git e preload contesto inutile. La conoscenza va in `docs/`.

## Regole obbligatorie

### File `.txt`

- **VIETATO** nella root
- Spostare in `docs/raw/root-import/` (note grezze) o convertire in `.md` in `docs/wiki/`

### File `.md` — max 4

Ammessi **solo** questi nomi in root:

| File | Ruolo |
|------|--------|
| `README.md` | Vetrina modulo/tema |
| `CHANGELOG.md` | Release notes |
| `LICENSE.md` | Licenza (se serve) |
| `AGENTS.md` | Stub agente on-demand (≤25 righe) |

Tutto il resto → `docs/raw/root-import/` o `docs/wiki/`. Duplicati `changelog.md` / `CHANGELOG.MD` → un solo `CHANGELOG.md`.

### Cartella `tests/AuditCoverage/` — vietata

- **VIETATO** in ogni modulo/tema (scaffold AI, mai committare)
- Se presente: `rm -rf tests/AuditCoverage`
- `.gitignore` deve contenere `tests/AuditCoverage/`
- Canon: [tests-audit-coverage-forbidden](../concepts/tests-audit-coverage-forbidden.md)
- Fix: `bash bashscripts/tools/ensure-audit-coverage-gitignore.sh`

### Cartelle maiuscole

- **VIETATO** nella root (`Config/`, `Helpers/`, …)
- Canonico: `app/`, `config/`, `helpers/` lowercase sotto root o sotto `app/`

### File `.code-workspace` — esattamente 1

- **OBBLIGATORIO**: esattamente 1 file `.code-workspace` per modulo/tema
- Nome: `_<nome>.code-workspace` in minuscolo (es. `_geo.code-workspace`, `_ui.code-workspace`)
- **VIETATO**: file `.code-workspace` di altri moduli/temi nella root (es. `_activity.code-workspace` in UI)
<<<<<<< HEAD
=======
=======
title: "Module Root Cleanup Rules"
type: rule
tags: [module, structure, cleanup, naming]
created: 2026-01-21
updated: 2026-07-01
qmd: module root no txt files no uppercase folders only readme nwidart sacred manifest never delete
issues: []
discussions: []
related:
  - ../../../../../../docs/wiki/concepts/nwidart-module-skeleton-contract.md
  - ../../../../../../docs/wiki/memories/nwidart-sacred-manifests-incident.md
---

# Module Root Cleanup Rules

## Regole obbligatorie per la root dei moduli

### File .txt
- **VIETATO**: Nessun file `.txt` nella root del modulo
- Tutti i file `.txt` devono essere rimossi o convertiti in `.md` e spostati in `docs/`

### File .md
- **OBBLIGATORIO**: Solo `README.md` nella root del modulo
- Tutti gli altri file `.md` devono essere:
  1. Studiati e valutati
  2. Sistematizzati (aggiunto frontmatter se necessario)
  3. Spostati in `docs/` (preferibilmente `docs/wiki/` per documentazione conoscenza)

### Cartelle con caratteri maiuscoli
- **VIETATO**: Nessuna cartella con caratteri maiuscoli nella root del modulo
- Tutte le cartelle devono essere lowercase con underscore o dash (es. `app/`, `database/`, `config/`)
- Cartelle con maiuscole devono essere eliminate o rinominate in lowercase
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

## Mai toccare (nwidart)

`composer.json`, `module.json`, `package.json`, `vite.config.js`, `.github/` — vedi [nwidart-module-skeleton-contract.md](../../../../../../docs/wiki/concepts/nwidart-module-skeleton-contract.md).

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
## Comandi

```bash
bash bashscripts/tools/audit-module-root-hygiene.sh
bash bashscripts/tools/fix-module-root-hygiene.sh
bash bashscripts/tools/guard-nwidart-module-skeleton.sh
```

## Scope

Moduli: `laravel/Modules/<Modulo>/` · Temi: `laravel/Themes/<Tema>/` — **solo root**, non sottocartelle.
<<<<<<< HEAD
=======
=======
```bash
bash bashscripts/tools/guard-nwidart-module-skeleton.sh
bash bashscripts/tools/audit-module-sacred-artifacts.sh
```

## Azione di cleanup
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

Per ogni modulo:

```bash
cd Modules/<Modulo>

# 1. Trova file .txt nella root
find . -maxdepth 1 -name "*.txt" -type f

# 2. Trova file .md nella root (escluso README.md)
find . -maxdepth 1 -name "*.md" -type f | grep -v README.md

# 3. Trova cartelle con maiuscoli nella root
find . -maxdepth 1 -type d | grep -E "[A-Z]"
```

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
## Stato Xot 2026-07-06

Le cartelle `Datas/`, `_docs/`, `claude-code-bmad-skills/`, `Filament/`, `Providers/` non esistono nella root di `Modules/Xot`. La root Xot contiene solo `README.md` come markdown e nessun `.txt`.

<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
## Canon

- Questa regola deve essere applicata a tutti i moduli
- Check periodico prima di commit
