---
title: "Docs md hygiene debt (misura)"
type: note
module: Xot
status: active
tags:
  - documentation
  - hygiene
  - naming
  - frontmatter
created: 2026-11-25
updated: 2026-11-25
qmd: "docs markdown hygiene debt dated filenames frontmatter conflict markers modules themes notify user"
related:
  - ../bmad/stories/docs-md-filename-date-debt.story.md
  - ../bmad/stories/phpstan-modules-zero-swarm.story.md
  - ./redundancy-audit.md
  - ../../../../../docs/wiki/rules/markdown-documentation-standard.md
---

# Docs md hygiene debt — puntatore misurato

SSoT operativo della campagna: [docs-md-filename-date-debt.story.md](../bmad/stories/docs-md-filename-date-debt.story.md).
Questo file è solo un **puntatore corto** (misure + next), non un secondo inventario.

## Perché

I `.md` sotto `Modules/*/docs` e `Themes/*/docs` sono chiavi del second brain.
Date nel filename, duplicati exact/near e marker `<<<<<<<` degradano ricerca e gate
(bootstrap PHPStan fallisce su **PHP** con marker; i md contaminati restano rumore).

## Misura 2026-11-25 (Modules+Themes `docs/`)

| Metrica | Valore |
|---------|-------:|
| Totale `.md` | **15909** |
| Filename con data/year (tutti) | **~36** |
| di cui ACTIVE (non stub, excl. `cci-2026*`) | **0** (boy-scout 2026-11-25b: 5→0) |
| di cui stub `superseded_by` | **~32** |
| di cui dominio CCI (`cci-2026*`) | **4** (non debt) |
| Senza frontmatter `---` (sample globale) | **451** |
| Con marker `<<<<<<<` in `docs/` | **862** (stima sessione a; recount mirato sotto) |

### Conflict markers per owner (docs only)

Recount boy-scout 2026-11-25b (solo `<<<<<<<` in `docs/**/*.md`):
Notify **12**, Job **6**. Stima precedente Notify **666** / Job **25** = inventari
più ampi o stale — non rieseguiti in massa qui.

**Policy:** non collassare in massa i md. Collapse solo SSoT attivi
(`README.md` / `index.md` / `00-index.md` del modulo). Boy-scout: Notify+Job
SSoT **0** marker → nessun collapse.

### Duplicati (Notify/User/Xot/Activity)

- Exact hash groups: **~624** (≥2 file identici) → **~1392** path coinvolti
- Hotspot: User archive/`models*` nested, Activity `phpstan-fixes-activity-*`,
  Notify `xot-base-classes-*` / `project_docs/roadmaps/*` UPPER+kebab+`-N`

## Wave eseguita in questa sessione

10 path Notify ACTIVE → stub `superseded_by` (2 root: contenuto spostato in
`*-historical.md`; 8 roadmaps: historical già presente). **Nessun delete.**

## Residui ACTIVE

**Chiusi boy-scout 2026-11-25b** (4 stub + 1 già stub ISO User):
Notify `final-implementation-report-2025-10`, User archive/`_archive` year-2025×3,
User `git-conflicts-resolution-2025-01-27` (già alias). ISO-day find Modules+Themes:
**3** path, tutti stub (Zero×2 + User×1).

## Non fare

- Mass-delete / mass-rewrite indici auto-generati
- Rinomine >10 senza lock + verifica collisioni
- Trattare `cci-2026-*` come debt data

## Vedi anche

- Sprint: `docs/sprint-status.yaml` → `Xot/docs-md-filename-date-debt`
- PHPStan campagna: [phpstan-modules-zero-swarm.story.md](../bmad/stories/phpstan-modules-zero-swarm.story.md)
- Handoff root (puntatore): `docs/chat/handoff-phpstan-modules-swarm.md`
