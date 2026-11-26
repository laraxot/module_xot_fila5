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
contract, prove e receipt. Il suo guard è una policy fail-closed: una regola
ritorna un deny con un ID tracciabile e la prima regola che nega vince. Il
repository FixCity possiede invece già un guard minimale, indipendente dal
bootstrap Laravel, con exit 2 per i divieti e fail-open quando il payload non è
leggibile. Copiare il workshop intero introdurrebbe un secondo orchestratore e
farebbe sembrare equivalenti due garanzie con semantica diversa.

## Driver della decisione

- Bloccare azioni distruttive prima dell'esecuzione.
- Funzionare anche con bootstrap Laravel rotto.
- Lasciare prove ripetibili.
- Distinguere un blocco preventivo da una verifica post-edit e da una prova di
  consegna.
- Non duplicare BMAD, Second Brain o `docs/contracts/`.

## Decisione

Adottiamo i pattern del workshop per fasi, mantenendo esplicito il confine:

1. `AGENTS.md`, `.harness/memory/*`, guard e fatti verificabili restano la fonte
   locale già adottata.
2. `docs/contracts/` conserva la promessa comportamentale e le invarianti; la story
   BMAD del modulo owner fornisce il perimetro del lavoro.
3. Il guard locale resta fail-open solo per errori propri o payload illeggibili;
   i divieti riconosciuti restano fail-closed con motivo e trace. Il passaggio a
   un guard fail-closed completo richiede prima fixture per gli errori del guard,
   per non trasformare un crash in un blocco infinito.
4. Un eventuale `post-edit` può eseguire controlli mirati sui file appena scritti
   e restituire contesto all'agente; non sostituisce lo stop finale e non decide
   da solo che il lavoro è fatto.
5. Un Change Receipt deve riportare almeno scope/diff, verifiche, esiti e
   verdetto; il workshop lo persiste per run. FixCity non lo rende ancora
   obbligatorio perché il suo ambiente di lavoro è condiviso e spesso contiene
   bootstrap o modifiche concorrenti non attribuibili a una singola run.
6. Checkpoint e replay sono adottati come pattern di recovery e diagnosi: un
   checkpoint deve permettere di riprendere da uno stato noto, mentre il replay
   deve usare fixture isolate e confrontare l'evento atteso, la regola e il
   contesto prodotto. Non sono autorizzazione a fare rollback distruttivi.
7. `.harness/memory/facts.md` conserva fatti verificabili con il comando di
   riverifica; `lessons.md` registra un fallimento osservato solo se produce un
   controllo concreto e definisce quando rimuoverlo. Le decisioni architetturali
   restano in ADR e il lavoro resta nelle story owner-locali.
8. Ogni estensione dell'harness deve avere un ADR Xot, un controllo source-level
   e una procedura di recovery. L'harness non può modificare `.env`, migrazioni
   protette, storia Git o dati reali.

## Alternative scartate

- Copiare il workshop integralmente: duplicazione di hook, stato e lifecycle,
  oltre alla diversa semantica fail-open/fail-closed.
- Limitarsi alla prosa: non previene le violazioni già osservate.
- Rendere ogni story un task contract separato: aumenta il coordinamento senza
  migliorare le modifiche ordinarie.

## Conseguenze

- Le convenzioni di tutti i moduli e temi possono puntare a uno standard Xot unico,
  mantenendo i contratti nei rispettivi owner.
- Un receipt completo resta un miglioramento successivo, non una falsa prova di
  qualità se PHPStan o i test non partono; la sua assenza è quindi una lacuna
  dichiarata, non un esito verde implicito.
- Post-edit, checkpoint e replay potranno ridurre il costo dei fallimenti, ma
  richiedono stato per run e fixture compatibili con il worktree condiviso.
- Il guard rimane una rete euristica: i controlli devono essere piccoli,
  source-level e coperti da fixture/test prima di irrigidire la policy.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Harness/GuardTest.php`
- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`
- `php .harness/bin/verify-facts`
- audit dei link relativi in `docs/adr/` e `docs/contracts/` di moduli e temi.

## Evidenza primaria

Il confronto è stato fatto con il repository [laravelday-harness-workshop](https://github.com/robertogallea/laravelday-harness-workshop), in particolare con
`.harness/rules/guard.php`, `.harness/bin/post-edit`, `.harness/bin/receipt`,
`.harness/bin/stop`, `.harness/bin/replay`, `.harness/memory/facts.md` e
`.harness/memory/lessons.md`.
