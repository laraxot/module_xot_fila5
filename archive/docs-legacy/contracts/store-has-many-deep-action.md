---
title: "HasManyDeepAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Store\\HasManyDeepAction"
qmd: "Store HasManyDeepAction non implementato LogicException stub relazione deep"
---

# HasManyDeepAction

Stub per la creazione di una `hasManyDeep`: non implementato. Codice: `app/Actions/Model/Store/HasManyDeepAction.php` (classe a riga 16, `execute()` a riga 20).

## Input

- `Model $_model`, `RelationDTO $_relationDTO`: non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `STORE-HMD-INV-1` | Lancia sempre `\LogicException('Store\HasManyDeepAction not implemented')`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\LogicException` sempre.

## Non fa

- Non scrive. Se `StoreAction` incontra questa relazione, il padre è già salvato quando l'eccezione arriva (nessuna transazione).
