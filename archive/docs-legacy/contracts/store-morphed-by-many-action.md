---
title: "MorphedByManyAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Store\\MorphedByManyAction"
qmd: "Store MorphedByManyAction morphedByMany non implementato LogicException stub"
---

# MorphedByManyAction

Stub per la creazione di una `morphedByMany`: non implementato. Codice: `app/Actions/Model/Store/MorphedByManyAction.php` (classe a riga 16, `execute()` a riga 20).

## Input

- `Model $_model`, `RelationDTO $_relationDTO`: non usati.

## Output

- Nessuno: lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `STORE-MORPHED-BY-INV-1` | Lancia sempre `\LogicException('Store\MorphedByManyAction not implemented')`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\LogicException` sempre.

## Non fa

- Non scrive.
