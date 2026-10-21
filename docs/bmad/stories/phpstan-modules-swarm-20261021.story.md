---
title: "PHPStan Modules zero — swarm random 2026-10-21"
type: story
status: in-progress
module: Xot
epic: quality-fleet
story_id: "xot-phpstan-modules-swarm-20261021"
track: quality/fleet
created: 2026-10-21
updated: 2026-10-21
tags: [phpstan, swarm, bmad, second-brain, filament-blueprint, docs]
qmd: "phpstan modules zero swarm random bmad second brain filament blueprint docs modules themes prompt"
related:
  - ./phpstan-zero-errors-modules.story.md
  - ./phpstan-ptv-incentivi-indennitaresponsabilita.story.md
  - ./swarm-phpstan-modular-docs-org.story.md
  - ../../../../Themes/Zero/docs/bmad/stories/quality-gates-phpstan-swarm-2026-09-23.story.md
  - ../../../User/docs/bmad/stories/user-module-independent-of-comment.story.md
---

# PHPStan Modules zero — swarm random 2026-10-21

## Obiettivo

Portare `cd laravel && ./vendor/bin/phpstan analyse Modules` a **0 errori**,
lavorando alla sorgente del problema (scopo e funzionalità del codice, non soppressione),
con swarm/subagent in parallelo e ordine random, dentro BMAD + second brain +
filament blueprint. Aggiornare e riordinare le docs di moduli e temi e rivedere i
prompt in `bashscripts/docs/prompts`.

## Perché (sorgente, non sintomo)

Un errore PHPStan è un contratto implicito violato: tipo sbagliato, firma incompatibile,
dipendenza trasversale non dichiarata, API Filament usata fuori dal contratto Xot.
La correzione deve ripristinare il comportamento previsto (Action, trait, resource,
widget) e, se il codice è morto, rimuoverlo. Baseline dichiarata: 0 errori
(`phpstan-zero-errors-modules.story.md`); ogni errore è una regressione.

## Acceptance criteria

- [ ] `phpstan analyse Modules/<Modulo>` verde per ogni modulo toccato.
- [ ] `phpstan analyse Modules` verde a fine giro (o debito residuo documentato con causa).
- [ ] Nessuna soppressione nuova in `phpstan.neon`; nessun `@phpstan-ignore` senza motivo scritto.
- [ ] User resta indipendente da Comment (composer + codice + test + docs).
- [ ] Docs di moduli/temi aggiornate con indice canonico e frontmatter; nessun duplicato esatto.
- [ ] `bashscripts/docs/prompts` riordinati (indice + set canonico, duplicati assorbiti).
- [ ] Pest verde nello scope toccato su host non di produzione (host attuale: NOLWA004, ok).
- [ ] Story di cluster nei docs dei moduli owner; `docs/sprint-status.yaml` aggiornato.
- [ ] Second brain: memoria/regola aggiornata e `qmd update` (se disponibile).

## Vincoli

- Lock `bashscripts/lock/` prima degli edit; moduli con lock di altri agenti: non toccare.
- Docs BMAD sempre in `Modules/<Mod>/docs/bmad/` e `Themes/<Tema>/docs/bmad/`.
- Mai `migrate:fresh`, `--force`, `RefreshDatabase`; host `10.100.200.15` = niente test.
- Array PHP: una chiave per riga. Niente `->label()` hardcoded nelle UI.
- Estendere le basi Xot, mai le classi Filament dirette.
- Forward-only: niente reset/rewrite di storia.

## Ordine random e cluster (prima ondata)

| Cluster | Moduli | Owner |
|---|---|---|
| A | Rating, Activity, Media | subagent phpstan-a |
| B | UI, Notify, Job, Incentivi | subagent phpstan-b |
| C | User (+ decoupling Comment) | subagent phpstan-c |
| D | prompts + docs temi/moduli | subagent docs-d |

Seconda ondata (dopo lo scarico dei run concorrenti): Xot, Ptv, Performance,
Progressioni, Lang, Indennita*, Sigma, Pdnd, Tenant.

## Note di coordinamento

- Un altro processo sta eseguendo `phpstan analyse .` e `analyse Modules` sulla stessa
  macchina: i run full-tree sono rumorosi (errori di parse transitori su file in
  scrittura). La verifica affidabile è **per modulo**.
- I lock `Pdnd`, `Sigma`, `Tenant`, `Lang`, `IndennitaResponsabilita-phpstan-fix` sono
  del 2026-10-06: da considerare stale solo dopo verifica con `lock/check.sh` e
  assenza di processi attivi; non rimuoverli a mano senza motivo.

## Dev Agent Record

- 2026-10-21: creata story orchestratrice; avvio swarm random su cluster A-D.
