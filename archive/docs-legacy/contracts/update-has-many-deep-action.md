---
title: "HasManyDeepAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Update\\HasManyDeepAction"
qmd: "Update HasManyDeepAction non implementato LogicException stub"
---

# HasManyDeepAction

Stub per l'aggiornamento di una `hasManyDeep`: non implementato. Codice: `app/Actions/Model/Update/HasManyDeepAction.php` (classe a riga 16, `execute()` a riga 20).

## Input

- `Model $_model`, `RelationDTO $_relationDTO`: non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `UPDATE-HMD-INV-1` | Lancia sempre `\LogicException('Update\HasManyDeepAction not implemented')`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\LogicException` sempre.

## Non fa

- Non scrive.
