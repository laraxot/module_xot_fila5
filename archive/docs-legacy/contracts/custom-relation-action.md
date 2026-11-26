---
title: "CustomRelationAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Update\\CustomRelationAction"
qmd: "Update CustomRelationAction relazione custom righe chiave primaria UpdateAction senza associazione"
---

# CustomRelationAction

Aggiorna i campi delle righe di una relazione custom, senza associarle né scollegarle. Codice: `app/Actions/Model/Update/CustomRelationAction.php` (classe a riga 18, `execute()` a riga 28).

## Input

- `Model $model`: il padre (non usato nel corpo).
- `RelationDTO $relationDTO`: `data` è una lista di array; ogni array deve contenere la chiave primaria del correlato.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `UPDATE-CUSTOM-INV-1` | Ogni elemento è un array (`Assert::isArray`). Test: `tests/Unit/Actions/Model/Update/CustomRelationActionTest.php`. | — (non dimostrato) |
| `UPDATE-CUSTOM-INV-2` | Un elemento con chiave primaria viene passato a `UpdateAction` senza alcuna associazione. Test: `tests/Unit/Actions/Model/Update/CustomRelationActionTest.php`. | `UPDATE-CUSTOM-INV-2` |
| `UPDATE-CUSTOM-INV-3` | Un elemento senza chiave primaria lancia `LogicException`. Test: `tests/Unit/Actions/Model/Update/CustomRelationActionTest.php` (copertura del ramo non verificata). | — (non dimostrato) |

## Effetti collaterali

`UPDATE` (o `firstOrCreate` in `UpdateAction` per un modello senza chiave) sulle righe. Nessuna transazione: l'eccezione a metà lascia le righe precedenti già scritte.

## Errori

- `LogicException` per righe senza chiave primaria.

## Non fa

- Non crea collegamenti né cancella righe.
