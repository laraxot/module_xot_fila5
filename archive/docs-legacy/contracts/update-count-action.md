---
title: "UpdateCountAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\ModelClass\\UpdateCountAction"
qmd: "UpdateCountAction aggiorna contatore record modello information_schema table_rows upsert"
---

# UpdateCountAction

Scrive nel contatore `InformationSchemaTable` il numero di record indicato per un modello. Codice: `app/Actions/ModelClass/UpdateCountAction.php`.

## Input

- `string $modelClass`: FQCN del modello.
- `int $total`: numero da memorizzare.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MODEL-UPCOUNT-INV-1` | Dopo la chiamata, `table_rows` del modello vale `$total`. Test: `tests/Unit/Actions/ModelClass/CountActionsTest.php` | `MODEL-UPCOUNT-INV-1` |
| `MODEL-UPCOUNT-INV-2` | Non conta i record: usa il valore passato. Test: `tests/Unit/Actions/ModelClass/CountActionsTest.php` (tabella vuota, letto 10 dopo `execute($modelClass, 10)`). | `MODEL-UPCOUNT-INV-2` |

## Effetti collaterali

- `updateOrCreate` su `information_schema_tables` (scrittura).

## Errori

- Errori del database si propagano.

## Non fa

- Il commento nel codice "Method not implemented" è superato: il metodo `updateModelCount` esiste nel trait `InformationSchemaTableCounters`.
