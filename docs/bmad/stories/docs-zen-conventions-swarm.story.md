---
title: "Swarm docs moduli e temi: convenzioni .md, ridondanza, inquinamento generato"
type: story
status: in-progress
module: Xot
epic: docs-second-brain
story_id: docs-zen-conventions-swarm
created: 2026-11-25
updated: 2026-11-25
qmd: "docs moduli temi convenzioni md kebab-case nomi senza date frontmatter qmd duplicati esatti md5 template fabbricati annidamento ricorsivo docs/wiki/laravel/Modules models/models swarm random"
related:
  - ./git-objects-slimming-independent-repos.story.md
  - ./phpstan-modules-swarm-devin-session.story.md
---

# Swarm docs moduli e temi

## Perche'

Gate PHPStan `analyse Modules` = **0 errori** (2026-11-25, cache privata, exit 0; un primo run aveva 2 internal
error transitori su Notify `MailTemplate`/`NotificationTemplate`, riscritti alle 10:37 dal merge `a6a34ea` durante l'analisi).
Il debito reale e' nei docs: rumore che degrada QMD, gonfia la storia git (vedi story slim) e confonde gli agenti.

## Baseline (21 cartelle docs, 15908 `.md`)

| Problema | Numero |
|---|---:|
| copie esatte (md5) oltre la prima | 1408 |
| nomi con data/timestamp | 20 |
| nomi non kebab (esclusi README/CHANGELOG/00-INDEX) | ~1804 |
| senza frontmatter | 439 |
| senza chiave `qmd` | 562 |
| annidamenti generati (`docs/wiki/laravel/Modules/...`, `models/models/...`) | presenti |
| template generici fabbricati (`product_roadmap`, `sprint_planning`, `user_research`...) | 9-11 moduli |

## Swarm (ordine random `shuf`, lock `bashscripts/lock/docs-zen-20261125-<Mod>.lock`)

| Lane | Moduli |
|---|---|
| A | Notify |
| B | User |
| C | Lang, Tenant, Three, UI |
| D | One, Performance, Zero, Ptv, IndennitaResponsabilita, Pdnd, Incentivi |
| E | Sigma, Progressioni, Job, Xot |
| F | Media, IndennitaCondizioniLavoro, Activity, Rating |

Ogni lane scrive/aggiorna `docs/bmad/stories/docs-zen-conventions.story.md` nel modulo/tema owner.

## Acceptance criteria

- [ ] 0 nomi con data, 0 non-kebab (eccezioni README/CHANGELOG/00-INDEX, `*.story.md` invariati)
- [ ] 0 file senza frontmatter/`qmd`
- [ ] copie esatte e annidamenti generati rimossi con link aggiornati
- [ ] nessun link nuovo rotto verso file rinominati/rimossi
- [ ] story di modulo con prima/dopo; `qmd update`

## Gate

Solo `.md`: PHPStan/Pint/Pest non applicabili (skip documentato), PHPStan gia' 0.
