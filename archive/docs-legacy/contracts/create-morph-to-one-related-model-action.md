---
title: "CreateMorphToOneRelatedModelAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\CreateMorphToOneRelatedModelAction"
qmd: "CreateMorphToOneRelatedModelAction morphToOne create relazione modello correlato Webmozart Assert"
---

# CreateMorphToOneRelatedModelAction

Crea il modello correlato di una relazione morphToOne chiamando `create()` sull'oggetto relazione. Codice: `app/Actions/Model/CreateMorphToOneRelatedModelAction.php`.

## Input

- `object $relation`: deve esporre il metodo `create` (verificato con `Assert::methodExists`, non con il tipo `MorphToOne`).
- `array<string, mixed> $attributes`: attributi passati a `create()`.

## Output

- `Model`: l'istanza restituita da `$relation->create($attributes)`, verificata con `Assert::isInstanceOf(Model::class)`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CREATE-MORPH-ONE-INV-1` | Se l'oggetto non ha `create`, l'Action lancia prima di qualsiasi scrittura. Prova: `execute()`. Test: nessuno. | — (non dimostrato) |
| `CREATE-MORPH-ONE-INV-2` | Il valore ritornato è esattamente il modello creato dalla relazione; nessuna altra scrittura. Prova: `execute()`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Un `INSERT` tramite la relazione. Nessuna transazione esplicita, nessun evento dispatchato dall'Action (restano quelli Eloquent del `create()`), nessuna coda, nessun servizio esterno.

## Errori

- `Webmozart\Assert\InvalidArgumentException` se manca `create` o se il risultato non è un `Model`.
- Le eccezioni del database si propagano.

## Non fa

- Non valida gli attributi e non imposta `lang`: lo fanno i chiamanti (`Model/Store/MorphToOneAction`, `Model/Update/MorphToOneAction`).
- Non cerca un record esistente: ogni chiamata crea. Vedi il contract di `Update/MorphToOneAction` per le conseguenze.
