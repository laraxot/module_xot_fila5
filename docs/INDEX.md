---
title: "Xot — Indice canonico docs"
status: verified
module: Xot
date: 2026-10-20
updated: 2026-10-20
tags: [xot, docs, module, index, bmad, actions, verified, no-services, framework]
---

> Indice canonico. **Status:** verified · **Date:** 2026-10-20 · **No-Services:** `app/Services/` assente; 62 Actions in `app/Actions/`; framework base (`BaseResource`, `BasePage`, `BasePanelProvider`).

> Convenzione: [Docs Organization — Modules & Themes](./conventions/docs-organization.md)

# Xot — Indice docs

Modulo Xot (base/fondazione del framework Laraxot: XotBase, BaseResource, BasePage, BasePanelProvider, servizio dispatcher, atti, servizi→azioni, transazioni, traduzioni, qualità PHPStan zero, contratti modulari, regole naming e namespace).

## Panoramica
- [README.md](./README.md) — identità, quick start, limiti, ownership
- [decision-log.md](./decision-log.md) — decisioni (riallineamento `cadb1578e`, contratto HasRecursiveRelationships)
- [graphify-out gitignore](./bmad/graphify-out-gitignore.md) — artefatto graphify mai in git (no LFS)
- [structure.md](./structure.md) / [core/architecture.md](./core/architecture.md) — struttura e architettura

## File chiave / Key files
- `docs/` — `INDEX.md`, `00-INDEX.md`, `README.md`, `bmad/` (dossier, stories), `core/`, `base/`, `filament/`
- `app/Actions/` — 62 Actions (`ConfigAction`, `ArrayAction`, `Blade/`, `Artisan/`, `Composer/`, `Debug/`, `Export/`, `AI/`); No-Services (`app/Services/` assente)
- `app/` — `XotBase`, `BaseResource`, `BasePage`, `BasePanelProvider`, `Contracts/`, `Models/`

## Relazioni
- **Geo** — usa `QueueableAction` contract per geocoding
- **User** — usa `BaseResource`, `Socialite` integration
- **Fixcity** — usa `BasePage`, `BasePanelProvider`, `QueueableAction`
- **Comment / Media / Event / Job / Lang / Rating / Seo / Tenant / Ticket / Mobile / Cms / Gdpr / Notify / AI / Activity / Blog** — tutti consumano componenti Xot

## Decisioni
- [`docs/decisions/action-conversion.md`](docs/decisions/action-conversion.md) — BMAD: conversione Services → Queueable Actions (wave globale) per il framework base

## Architettura
- [core/](./core/) — core (architecture.md, naming-conventions.md)
- [base/](./base/) — base resource (installation.md, url-not-found.md)
- [models/](./models/) — modelli base
- [filament/](./filament/) — integrazione Filament, widget, risorse, pagine
- [migration/](./migration/) — regole e guide di migrazione
- [migrations/](./migrations/) — esempi di migrazione
- [service/](./service/) — servizi (eliminati; riferimento storico)
- [theme/](./theme/) — gestione temi
- [data/](./data/) — data objects, meta tag
- [contracts/](./contracts.md) — contratti

## PHPStan / Qualità
- [phpstan/](./phpstan/) — report per livello (`level_1`..`level_9`, `level.md`, `.json`)
- [bmad/phpstan-status.md](./bmad/phpstan-status.md) — stato vivo (2026-10-20: `analyse Modules` → 0 errori, wave3)
- [phpstan-zero.md](./phpstan-zero.md) — stato storico (2026-09-07)
- [quality-gates.md](./quality-gates.md) — gate qualità (2026-07-28)
- [stato-qualita-progetto.md](./stato-qualita-progetto.md) — stato storico (2026-08-31)
- [development/phpstan-guide.md](./development/phpstan-guide.md) — guida PHPStan

Gate 2026-10-20: 0 errori file-level; 254 `.md` in docs/, 71 voci radice, nessun `index.md` in radice (come da `00-INDEX.md`).

## BMAD / Stories

<!--
GateGuard facts:
1. Supersedes BMAD list without tomorrow handoff hub.
2. Linked from README.md and conventions/docs-organization.md.
3. Edit existing INDEX.md.
4. User verbatim: "fa tutte le bmad stories per continuare domani"
-->

- [stories/tomorrow-handoff.story.md](./stories/tomorrow-handoff.story.md) — **hub continua domani**
- [bmad/](./bmad/) — dossier BMAD
- [bmad/code-quality-wave.md](./bmad/code-quality-wave.md) — qualità + Filament XotBase
- [bmad/brainstorming-services-to-actions-wave.md](./bmad/brainstorming-services-to-actions-wave.md) — Services→Actions
- [bmad/stories/livewire-to-filament-widgets-fleet.story.md](./bmad/stories/livewire-to-filament-widgets-fleet.story.md) — fleet Livewire→Widgets
- [stories/services-to-actions-global-wave.story.md](./stories/services-to-actions-global-wave.story.md) — hub Services
- [stories/](./stories/) — storie feature
- Convenzione docs: [conventions/docs-organization.md](./conventions/docs-organization.md)

## Struttura (sottocartelle chiave)
- `bmad/` — dossier BMAD
- `stories/` — storie feature
- `wiki/` — wiki (index.md, log.md, concepts/, rules/, memories/); duplicati `wiki/INDEX.md`, `wiki/index.md`
- `concepts/` — concetti architetturali
- `archive/` — archivi storici (moduli, namespace, naming, phpstan, storia)
- `consolidated/` — consolidamenti (duplicati con suffisso `-1-1`, `-2`; divergenza con `architecture/`)
- `standards/` — standard (coding, namespace, naming, psr4); marcati `stale`
- `rules/` — regole (laraxot-rules.md, prompt-rules.md, xot-base-section-rule.md)
- `tests/` / `testing/` — testing
- `development/` — guide sviluppo (coding-standards, current-progress, data-objects, enums, filament-forms, queueable-actions, performance-module)

## Duplicati storici mantenuti
- `00-INDEX.md` — indice operativo canonico (13 KB, 2026-10-20)
- `index.md` — mantenuto (884 byte)
- `INDEX.md` — mantenuto (798 byte; aggiornato ora con frontmatter canonico)
- `README.md` — mantenuto
- `CHANGELOG.MD` / `changelog.MD` — mantenuti (differenza maiuscola)
- `archive/`, `legacy/`, `raw/`, `consolidated/`, `_integration/`, `-integration/` — mantenuti
- `bmad/readme.md`, `bmad/index.md`, `bmad/README.md` — mantenuti
- `wiki/index.md` / `wiki/INDEX.md` — mantenuti come indici di sezione
- `phpstan/` — mantenuto; `level_N.json` duplicati (maiuscole/minuscole)

---
*Aggiornato: 2026-10-20 — conforme a `docs-organization.md`; `00-INDEX.md` resta indice operativo; `INDEX.md` aggiornato al canonico; nessun file cancellato o rinominato; `phpstan.neon` non toccato.*
