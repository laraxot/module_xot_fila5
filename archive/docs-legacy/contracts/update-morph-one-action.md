---
title: "MorphOneAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Update\\MorphOneAction"
qmd: "Update MorphOneAction morphOne aggiorna crea lang locale filtra null"
---

# MorphOneAction

Aggiorna o crea il figlio di una `morphOne`, impostando `lang` e scartando i valori `null`. Codice: `app/Actions/Model/Update/MorphOneAction.php` (classe a riga 23, `execute()` a riga 36).

## Input

- `Model $model`: il padre.
- `RelationDTO $relationDTO`: `name` è il nome della relazione, `data` gli attributi.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `UPDATE-MORPH-ONE-INV-1` | `lang` mancante è impostato alla locale corrente. Test: nessuno. | — (non dimostrato) |
| `UPDATE-MORPH-ONE-INV-2` | I valori `null` sono rimossi dai dati prima della scrittura: non è possibile azzerare un campo a `null` con questo percorso. Test: nessuno. | — (non dimostrato) |
| `UPDATE-MORPH-ONE-INV-3` | Se il figlio esiste: `update()`; altrimenti `create()`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

`UPDATE` o `INSERT` del figlio. Nessuna transazione.

## Errori

- `InvalidArgumentException` se la relazione non è `MorphOne`.

## Non fa

- Non cancella il figlio.
