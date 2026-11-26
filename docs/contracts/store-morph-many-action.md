---
title: "MorphManyAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Store\\MorphManyAction"
qmd: "Store MorphManyAction morphMany non implementato LogicException stub"
---

# MorphManyAction

Stub per la creazione di una `morphMany`: non implementato. Codice: `app/Actions/Model/Store/MorphManyAction.php` (classe a riga 16, `execute()` a riga 20).

## Input

- `Model $_model`, `RelationDTO $_relationDTO`: non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `STORE-MORPH-MANY-INV-1` | Lancia sempre `\LogicException('Store\MorphManyAction not implemented')`. Test: nessuno diretto. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\LogicException` sempre.

## Non fa

- Non scrive. La versione di aggiornamento è in `Update/MorphManyAction`, che è implementata.
