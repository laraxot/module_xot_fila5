---
title: "Igiene root modulo e tema — file obbligatori"
type: concept
tags: [module, theme, hygiene, workspace, releaserc]
updated: 2026-11-17
qmd: "module theme root hygiene code-workspace releaserc package.json testbench vite tailwind"
related:
  - ../../../bmad/stories/module-root-hygiene.story.md
  - ../../../../../../bashscripts/ai/wiki/memories/module-workspace-name-from-remote.md
  - ../../../../../../docs/stories/all-modules-phpstan-zero-errors.story.md
---

# Igiene root modulo e tema

## Perche'

Ogni modulo/tema e' una **repo autonoma** (`git -C`). Senza i file root standard non si puo'
aprire in IDE, fare release semantic, build Vite/Tailwind, ne' testbench/PHPStan in isolamento.

## Obbligatori in root

| File | Scopo |
|------|--------|
| `_<repo_snake>.code-workspace` | Workspace IDE; nome = remote (`module_xot_fila5` → `_module_xot_fila5.code-workspace`) |
| `.releaserc.json` | semantic-release |
| `composer.json` | dipendenze PHP del pacchetto |
| `module.json` / `theme.json` | manifest nwidart / tema |
| `package.json` | script npm + vite |
| `tailwind.config.js` | design tokens FO/BO |
| `postcss.config.js` | pipeline CSS con Tailwind |
| `vite.config.js` | build asset |
| `testbench.yaml` | orchestra test isolati del modulo |
| `README.md` | scopo e come sviluppare |
| `LICENSE` | licenza |
| `CHANGELOG.md` | Keep a Changelog |

## Consigliati

- `config/config.php` con `name` e `icon` (religione modulo)
- `.gitignore` con tooling vietato (`bashscripts`, `graphify-out`, `.agents`, …)
- `docs/` owner (wiki + stories BMAD)

## Gate

```bash
bash bashscripts/quality-gates/audit-module-theme-root-files.sh
# Pest: Modules/Xot/tests/Unit/ModuleRootHygieneTest.php
```

Sessione 2026-11-17 pomeriggio: gate PASS su tutti i moduli/temi (vedi story
[all-modules-phpstan-zero-errors](../../../../../../docs/stories/all-modules-phpstan-zero-errors.story.md)).

Forward-only: se un file e' sparito dal working tree ma e' in HEAD, ripristinalo con
`git show HEAD:path > path` (mai `checkout`/`restore`).
