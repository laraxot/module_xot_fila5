---
title: "ADR — adozione incrementale dell'harness Laravel Day"
type: decision
status: accepted
module: Xot
created: 2026-11-26
updated: 2026-11-26
decision-makers: [utente, agenti del repository]
issues: []
qmd: "laravelday harness task contract receipt checkpoint guard FixCity"
---

# Adozione incrementale dell'harness Laravel Day

## Contesto

Il workshop `laravelday-harness-workshop` separa policy, hook, memoria, task
contract, prove e receipt. FixCity possiede già un harness più piccolo con
`.harness/bin/guard`, `verify-facts`, memoria verificabile e ADR 0018; copiare il
workshop intero introdurrebbe un secondo orchestratore e rischierebbe di sovrascrivere
le regole owner-local di moduli e temi.

## Driver della decisione

- Bloccare azioni distruttive prima dell'esecuzione.
- Funzionare anche con bootstrap Laravel rotto.
- Lasciare prove ripetibili.
- Non duplicare BMAD, Second Brain o `docs/contracts/`.

## Decisione

Adottiamo i pattern del workshop per fasi:

1. `AGENTS.md`, `.harness/memory/*`, guard e fatti verificabili restano la fonte
   locale già adottata.
2. `docs/contracts/` conserva la promessa comportamentale e le invarianti; la story
   BMAD del modulo owner fornisce il perimetro del lavoro.
3. Receipt, checkpoint e replay saranno aggiunti solo quando esiste un caso d'uso
   ripetibile e un test owner-local; non diventano un requisito per ogni modifica.
4. Ogni estensione dell'harness deve avere un ADR Xot, un controllo source-level e
   una procedura di recovery. L'harness non può modificare `.env`, migrazioni
   protette, storia Git o dati reali.

## Alternative scartate

- Copiare il workshop integralmente: duplicazione di hook, stato e lifecycle.
- Limitarsi alla prosa: non previene le violazioni già osservate.
- Rendere ogni story un task contract separato: aumenta il coordinamento senza
  migliorare le modifiche ordinarie.

## Conseguenze

- Le convenzioni di tutti i moduli e temi possono puntare a uno standard Xot unico,
  mantenendo i contratti nei rispettivi owner.
- Un receipt completo resta un miglioramento successivo, non una falsa prova di
  qualità se PHPStan o i test non partono.
- Il guard rimane una rete euristica: i controlli devono essere piccoli, source-level
  e coperti da test.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Harness/GuardTest.php`
- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`
- `php .harness/bin/verify-facts`
- audit dei link relativi in `docs/adr/` e `docs/contracts/` di moduli e temi.
