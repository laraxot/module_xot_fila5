---
qmd: "contratto di comportamento action behavioral contract input output invarianti effetti collaterali errori non fa group pest promesso dimostrato"
title: "Regola — Contratto di comportamento delle Action"
type: rule
module: Xot
tags: [rule, actions, contract, ai-readability, testing, harness]
created: 2026-11-18
updated: 2026-11-26
status: active
related:
  - ../adr/0012-behavioral-contract-governance.md
  - ../../tests/Unit/Docs/ActionContractsAreCompleteTest.php
  - ../../tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php
  - ../../../../../docs/harness-porting.md
---

# Contratto di comportamento delle Action

La logica di business sta nelle Action (`Modules/<Modulo>/app/Actions`). Il nome dice *cosa* fa un'Action; il contratto dice
*cosa promette*: senza, chi la chiama (una persona o un agente AI) deve ricostruirlo leggendo il codice, e sbaglia proprio sui
casi limite. Il contratto e' la regola **scritta**; il test sotto la rende **verificabile**.

> Ripristinato il 2026-11-26: il file era stato aggiunto il 2026-11-24 e cancellato dal commit di massa `56bf06697` del
> 2026-11-25 (690 file), mentre AGENTS.md, i test e oltre venti README di pacchetto continuavano a citarlo.

## Dove e in che formato

Ogni modulo e tema ha `docs/contracts/` (e `docs/adr/` per il perche' delle scelte). Un file per Action, nome in kebab-case
della classe (`create-ticket-action.md`), frontmatter `type: contract` e `action: "<FQCN>"`, sei sezioni nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Il docblock dell'Action contiene il riferimento editoriale `@see docs/contracts/<file>.md` e il marker machine-readable
`@contract`, cosi' chi legge il codice e gli strumenti del progetto trovano il file:

```php
/**
 * Unico punto di creazione di una segnalazione.
 *
 * @see docs/contracts/create-ticket-action.md
 * @contract docs/contracts/create-ticket-action.md
 */
```

«Non fa» e' la sezione che evita piu' errori: dice dove *non* cercare un comportamento, e dove cercarlo.

## Invarianti: un ID, un test

La sezione `Invarianti` e' una tabella `| ID | Regola | Group Pest |`. L'ID e' stabile (`<SCOPE>-INV-<N>`, per esempio
`COMMENT-APPROVE-INV-1`): si cambia il testo, non l'ID. Ogni invariante ha almeno un test Pest con `->group('<ID>')`, cosi'
`vendor/bin/pest --group=<ID>` e' la prova minima di una singola promessa (ADR [0012](../adr/0012-behavioral-contract-governance.md)).

Il contratto separa **promesso** da **dimostrato**: se nessun test prova una regola, la colonna `Group Pest` dice
`— (non dimostrato)` e la riga entra nel «Backlog test» del README dei contratti del pacchetto. Un'invariante senza prova non
si presenta come verificata, e un group che non esiste non si scrive.

Un comportamento legacy si documenta com'e', con i suoi limiti espliciti («Limite noto: …»): documentarlo non autorizza a
estenderne i difetti nel codice nuovo.

## Quando

- Ogni Action nuova o modificata che scrive dati, chiama un servizio esterno o ha effetti collaterali (notifiche, code, file,
  cache, denaro, permessi, dati personali).
- Le Action pure (formattano, calcolano) possono farne a meno.

## Verifica

- `Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php`: ogni `docs/contracts/*.md` con `type: contract` ha le sei
  sezioni nell'ordine, la sua `action` esiste e il docblock dell'Action contiene `@contract`; le Action dei moduli condivisi
  nell'elenco `REQUIRED` hanno il contratto.
- Il modulo del progetto elenca le proprie Action obbligatorie nel suo test (es. `tests/Unit/ActionContractsTest.php`).
- `Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`: ogni modulo e tema ha `docs/contracts/` e `docs/adr/`;
  ogni ADR ha Contesto, Decisione, Alternative scartate, Conseguenze.

Un contratto che non corrisponde piu' al codice e' peggio di nessun contratto: chi cambia il comportamento aggiorna il
contratto nello stesso commit, e il test dell'Action prova le righe del contratto.

## Origine

Il formato viene dal workshop Laravel Day 2026 ([laravelday-harness-workshop](https://github.com/robertogallea/laravelday-harness-workshop),
`docs/contracts/`): un contratto per operazione, invarianti con ID, un group Pest per ID. FixCity lo adatta: contratti nel
modulo o tema owner (non in un catalogo di root), intestazioni in italiano, `@see` e `@contract` nel docblock. Cosa e' stato
portato e cosa no: [docs/harness-porting.md](../../../../../docs/harness-porting.md).
