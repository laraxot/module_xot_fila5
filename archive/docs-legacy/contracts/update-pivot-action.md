---
title: "PivotAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Update\\PivotAction"
qmd: "Update PivotAction pivot non implementato LogicException stub"
---

# PivotAction

Stub per l'aggiornamento dei dati pivot: non implementato. Codice: `app/Actions/Model/Update/PivotAction.php` (classe a riga 16, `execute()` a riga 20).

## Input

- `Model $_model`, `RelationDTO $_relationDTO`: non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `UPDATE-PIVOT-INV-1` | Lancia sempre `\LogicException('Update\PivotAction not implemented')`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\LogicException` sempre.

## Non fa

- Non scrive.
