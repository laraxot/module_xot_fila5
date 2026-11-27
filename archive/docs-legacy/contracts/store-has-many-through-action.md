---
title: "HasManyThroughAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Store\\HasManyThroughAction"
qmd: "Store HasManyThroughAction non implementato LogicException stub hasManyThrough"
---

# HasManyThroughAction

Stub per la creazione di una `hasManyThrough`: non implementato. Codice: `app/Actions/Model/Store/HasManyThroughAction.php` (classe a riga 16, `execute()` a riga 20).

## Input

- `Model $_model`, `RelationDTO $_relationDTO`: non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `STORE-HMT-INV-1` | Lancia sempre `\LogicException('Store\HasManyThroughAction not implemented')`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\LogicException` sempre.

## Non fa

- Non scrive. Come per gli altri stub di Store, il padre è già salvato quando arriva l'eccezione.
