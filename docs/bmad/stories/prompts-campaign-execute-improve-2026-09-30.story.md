---
title: "Campagna prompt: esegui su tutti i moduli e temi, poi migliora i 78 prompt"
type: story
status: in-progress
owner_module: Xot
created: 2026-09-30
agent: claude-code (PID 124849)
related:
  - ../../../../../../bashscripts/docs/prompts/
  - ../../../../../../bashscripts/ai/wiki/memories/swarm-subagents-parallel-standing-order.md
  - ../../prompts-campaign/catalog.md
---

# Campagna prompt: esegui su tutti i moduli e temi, poi migliora

## Richiesta utente

"Esegui e poi migliora tutti i prompt scritti dentro bashscripts/docs/prompts in ordine random
in parallelo utilizzando BMAD + second brain." Profondità scelta: **tutti i moduli e temi**.
Richiesta aggiuntiva: studiare online come usare al meglio LLM wiki / second brain e applicarlo
al progetto (installare e configurare gli strumenti necessari).

## Stato di partenza (verificato 2026-09-30 20:30 UTC)

- 78 file in `bashscripts/docs/prompts/` (repo git `bashscripts`, branch corrente).
- Altri agenti attivi sullo stesso repo: claude PID 69098, codex PID 88080. Uno sta ripulendo i
  prompt (solo cancellazioni: blocchi `MERGED FROM`, righe `role: developer` duplicate). 13 file
  hanno ancora marcatori `MERGED FROM`.
- `laravel/vendor` in popolamento (composer install di un altro agente), `.env` assente.
- Nessun lock sui prompt; `bashscripts/tools/claims-open.py` non esiste (standing order stale).
- QMD: 11158 documenti, 8282 senza embedding.
- Target: 14 moduli (tutti con `.git` proprio, remote `laraxot`, branch `dev`) + 3 temi
  (`Four` con git; `AdminLTE`, `BsItalia` senza git).

## Architettura della campagna

Ownership disgiunta per evitare collisioni di file e di indice git.

| Fase | Agente | Scope esclusivo | Output |
|---|---|---|---|
| 1 | C (catalogo) | sola lettura prompt | `laravel/Modules/Xot/docs/prompts-campaign/catalog.md` |
| 1 | SB (second brain) | qmd, wiki, hooks, tool install | wiki + regola + story sezione SB |
| 2 | M1 | Xot | `Xot/docs/prompts-campaign/execution-2026-09-30.md` |
| 2 | M2 | User | idem nel modulo |
| 2 | M3 | Cms, Seo | idem |
| 2 | M4 | Notify, Trade | idem |
| 2 | M5 | UI, Themes (Four, AdminLTE, BsItalia) | idem |
| 2 | M6 | Job, Activity | idem |
| 2 | M7 | Media, Lang | idem |
| 2 | M8 | AI, Tenant, Gdpr | idem |
| 2 | R1 | prompt di livello repo (git, gitmodules, report, convenzioni) | `Xot/docs/prompts-campaign/execution-repo-2026-09-30.md` |
| 3 | P1..P8 | ~10 file prompt ciascuno, disgiunti | prompt migliorati + changelog nel catalogo |

Regole per tutti gli agenti:

- Ordine dei prompt casuale (`shuf`), un lock per ogni file prima di modificarlo, rilettura
  subito prima dell'edit (altri agenti attivi).
- Forward-only: mai reset/checkout/restore/revert/force-push.
- Chiusura modulo (standing order 5): phpstan + phpmd + phpinsights + pest sul modulo intero,
  `docs/coverage.md`, commit nel repo del modulo, pull + push su tutti i remote.
- Nessun "fatto" senza output di verifica. Skip documentati con la causa reale.

## Checklist

- [ ] Fase 1: catalogo prompt (classe, essenza eseguibile, duplicati, difetti)
- [ ] Fase 1: second brain (ricerca web, installazione, configurazione, regola wiki)
- [ ] Fase 2: esecuzione su 14 moduli + 3 temi + livello repo
- [ ] Fase 3: miglioramento 78 prompt basato sulle evidenze della fase 2
- [ ] Chiusura: `qmd update`, commit bashscripts + root + Xot, memoria aggiornata

## Log agenti

(sezione aggiornata dal coordinatore a ogni rientro)
