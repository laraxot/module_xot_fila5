---
title: "MorphedByManyAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Update\\MorphedByManyAction"
qmd: "Update MorphedByManyAction morphedByMany non implementato LogicException stub"
---

# MorphedByManyAction

Stub per l'aggiornamento di una `morphedByMany`: non implementato. Codice: `app/Actions/Model/Update/MorphedByManyAction.php` (classe a riga 16, `execute()` a riga 23).

## Input

- `Model $_model`, `RelationDTO $_relationDTO`: non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `UPDATE-MORPHED-BY-INV-1` | Lancia sempre `\LogicException('Update\MorphedByManyAction not implemented')`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\LogicException` sempre.

## Non fa

- Non scrive.
