---
title: "ADR — Harness per gli agenti: guide scritte (ADR, contratti) + sensori eseguibili (test, guard)"
type: decision
status: accepted
created: 2026-11-19
updated: 2026-11-24
module: Xot
decision-makers: [marco76tv, agente Claude]
tags: [adr, harness, agenti, guard, hook, adr, contracts, bmad, second-brain]
qmd: "harness agenti laravelday workshop guard pretooluse lessons adr contracts invarianti group pest sensori guide feedforward feedback"
related:
  - ../rules/action-behavioral-contract.md
  - ../concepts/agent-harness-guide.md
  - ../../tests/Unit/Harness/GuardTest.php
  - ../../tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php
  - ../../tests/Unit/Docs/ActionContractsAreCompleteTest.php
  - ../../../../../.harness/memory/lessons.md
---

# ADR: harness minimo, mappato su quello che il progetto ha già

## Contesto

Su questo repo lavorano più agenti (Claude, Codex, Cursor) e una sync automatica. Le regole esistono (AGENTS.md, wiki
`docs/wiki/rules`, memorie, story BMAD) ma erano quasi tutte prosa: un agente le legge, o no, e niente impedisce di
violarle. Fallimenti osservati: merge di sync committato con 2.424 file con marker (2026-11-19); 12 moduli con un
`docs/adr/README.md` identico e nessun ADR; un ADR copiato dal workshop con classi inesistenti qui; un test di
documentazione rosso che nessuno vedeva (2026-11-24). Il workshop laravelday-harness (R. Gallea, Laravel Day 2026)
propone un harness in sei livelli: task delimitato, ambiente leggibile, azioni controllate, esecuzione durevole,
evidenza, apprendimento. Quanto ne adottiamo, e in che forma, senza duplicare BMAD, wiki e second brain?

## Decisione

Adottiamo i pezzi che trasformano una regola in un **controllo eseguibile**, ciascuno mappato su una struttura esistente
e ciascuno nato da una lezione (`.harness/memory/lessons.md`, con condizione di rimozione):

| Workshop | Qui |
|---|---|
| `AGENTS.md` mappa, `CLAUDE.md` stub | Stessi file, stub ≤50 righe; rimandano al canon ADR/contratti del pacchetto owner. |
| `docs/adr/NNNN-*.md` (MADR breve) | `docs/adr/<argomento>.md` **in ogni modulo e tema**, senza numeri né date; sezioni Contesto, Decisione, Alternative scartate, Conseguenze, **Verifica** (= *Confirmation*). |
| `docs/contracts/<op>.md` + `INDEX.md` | `docs/contracts/<action-kebab>.md` in ogni pacchetto; `README.md` è l'indice (uno solo). Invarianti in tabella con ID `<PREFISSO>-INV-<N>` e group Pest omonimo; docblock `@contract`. |
| `verify-port` (linter di struttura) | `PackagesHaveContractsAndAdrTest` + `ActionContractsAreCompleteTest`, source-level, nella suite Pest. |
| Guard PreToolUse + trace | `.harness/bin/guard` (PHP puro), regole `secrets.env`, `migration.destructive`, `db.fresh`, `git.rewind`; blocchi in `.harness/runs/trace.jsonl` (gitignored). Registrato come hook PreToolUse in `.claude/settings.json` (cartella ignorata da git: si registra per checkout; la stessa voce è in `bashscripts/ai/.agents/settings.json` per i progetti che usano il symlink). Il comando non fa nulla dove il guard manca. |
| `lessons.md` | `.harness/memory/lessons.md`. |
| Task Contract `T-NNN` | La **story BMAD** del modulo owner (scope, criteri, evidenza, write-back): nessun file in più. |
| `progress.md`, `decisions.md` | La story BMAD e, per le decisioni difficili da invertire, un ADR del pacchetto owner. |
| `[ATTESA-UMANO]: <domanda>` | Stesso marcatore, usato dai messaggi del guard e da AGENTS.md. |

## Alternative scartate

- **Adottare il kit del workshop così com'è** (`.harness/tasks`, stop hook con receipt che rilancia PHPStan e Pest a ogni
  "fatto"): su sessioni che toccano 26 pacchetti lo stop costerebbe minuti ogni volta, e il Task Contract duplica la story BMAD.
- **Solo documentazione** (riscrivere CLAUDE.md come manuale): è quello che c'era, e non ha impedito nessuno dei fallimenti.
- **ADR e contratti centrali in `docs/` di root**: rompono l'ownership dei moduli, che sono repo git propri condivisi tra
  progetti; il canon vive nel pacchetto che possiede il codice.
- **Numerazione `NNNN-` degli ADR come nel workshop**: vietata dalla regola dei nomi file del progetto (nessun numero né
  data nel nome); due progetti che condividono Xot hanno già prodotto numeri doppi (`0006` ×2, `0010`/`00010`).

## Conseguenze

- Buono: le regole più costose da violare (dati, segreti, storia git) sono bloccate prima che succeda, con traccia.
- Buono: un ADR o un contratto vuoto, copiato o scollegato dal codice fa fallire un test; un'invariante dichiarata coperta
  da un group che non esiste pure.
- Buono: chi apre un pacchetto trova nel README di `docs/adr` e `docs/contracts` l'indice di tutto, senza cercare nella wiki.
- Cattivo: il guard è euristico sui comandi shell (una rete, non un muro), e può dare falsi positivi (es. un messaggio di
  commit che contiene «reset --hard»): si riformula il comando.
- Cattivo: molte invarianti nascono con group `—` (debito dichiarato); il valore cresce solo se chi tocca un'Action aggiunge
  il test del suo group.

## Verifica

```bash
cd laravel && composer harness:check   # = pest Modules/Xot/tests/Unit/Harness + PackagesHaveContractsAndAdrTest + ActionContractsAreCompleteTest
```

- `GuardTest`: ogni regola ha un caso che scatta e uno vicino che passa; gira senza bootstrap Laravel.
- Ogni voce di `.harness/memory/lessons.md` nomina un pezzo che esiste (revisione).
