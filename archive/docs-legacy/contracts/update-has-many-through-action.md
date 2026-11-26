---
title: "HasManyThroughAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Update\\HasManyThroughAction"
qmd: "Update HasManyThroughAction non implementato LogicException stub hasManyThrough"
---

# HasManyThroughAction

Stub per l'aggiornamento di una `hasManyThrough`: non implementato. Codice: `app/Actions/Model/Update/HasManyThroughAction.php` (classe a riga 16, `execute()` a riga 23).

## Input

- `Model $_model`, `RelationDTO $_relationDTO`: non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `UPDATE-HMT-INV-1` | Lancia sempre `\LogicException('Update\HasManyThroughAction not implemented')`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\LogicException` sempre.

## Non fa

- Non scrive.
