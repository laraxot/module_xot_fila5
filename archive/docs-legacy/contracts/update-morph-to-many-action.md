---
title: "MorphToManyAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Update\\MorphToManyAction"
qmd: "Update MorphToManyAction morphToMany sync syncWithoutDetaching pivot associativo"
---

# MorphToManyAction

Aggiorna una `morphToMany`: con lista di id fa `sync`, con dati pivot fa `syncWithoutDetaching`. Codice: `app/Actions/Model/Update/MorphToManyAction.php` (classe a riga 23, `execute()` a riga 35).

## Input

- `Model $row`: il padre (non usato nel corpo).
- `RelationDTO $relationDTO`: `rows` è `MorphToMany`; `data` è una lista di id, un array con `to`/`from`, oppure un array associativo con dati pivot.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `UPDATE-MORPH-TO-MANY-INV-1` | Con `to`/`from` si usa `data['to']` (default `[]`). Test: nessuno. | — (non dimostrato) |
| `UPDATE-MORPH-TO-MANY-INV-2` | Lista non associativa: `sync()`, che rimuove i collegamenti non presenti. Test: nessuno. | — (non dimostrato) |
| `UPDATE-MORPH-TO-MANY-INV-3` | Associativo: per ogni voce array si chiama `syncWithoutDetaching([id => pivot])`; le voci non array sono ignorate in silenzio. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

`sync` o `syncWithoutDetaching` sulla pivot. Nessuna transazione.

## Errori

- `\Exception` se `data` non è un array; `InvalidArgumentException` se `rows` non è `MorphToMany`.

## Non fa

- Non crea i correlati, solo collegamenti.
