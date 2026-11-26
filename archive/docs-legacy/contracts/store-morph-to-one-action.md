---
title: "MorphToOneAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Store\\MorphToOneAction"
qmd: "Store MorphToOneAction morphToOne lang locale create delega CreateMorphToOneRelatedModelAction"
---

# MorphToOneAction

Crea il modello correlato di una `morphToOne`, delegando a `CreateMorphToOneRelatedModelAction`. Codice: `app/Actions/Model/Store/MorphToOneAction.php` (classe a riga 18, `execute()` a riga 22).

## Input

- `Model $_model`: non usato.
- `RelationDTO $relationDTO`: `rows` è la relazione, `data` gli attributi.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `STORE-MORPH-TO-ONE-INV-1` | Se `data` non ha `lang`, lo imposta alla locale corrente. Il valore è scritto anche sull'oggetto DTO. Test: nessuno. | — (non dimostrato) |
| `STORE-MORPH-TO-ONE-INV-2` | Il correlato è sempre creato con `create()` tramite `CreateMorphToOneRelatedModelAction`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Un `INSERT` del correlato. Nessuna transazione.

## Errori

- Eccezioni di `CreateMorphToOneRelatedModelAction` e del database.

## Non fa

- Non aggiorna un correlato esistente: a ogni salvataggio ne crea uno nuovo.
