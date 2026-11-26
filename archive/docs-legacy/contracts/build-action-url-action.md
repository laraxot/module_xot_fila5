---
title: "BuildActionUrlAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Route\\BuildActionUrlAction"
qmd: "BuildActionUrlAction URL azione route corrente sostituisce ultimo segmento nome route fallback hash"
---

# BuildActionUrlAction

Costruisce l'URL di un'azione sulla route corrente, sostituendo l'ultimo segmento del nome route con l'azione richiesta. Codice: `app/Actions/Route/BuildActionUrlAction.php`.

## Input

- `array $params`: `act` (default `show`), `query` (array, default `[]`), `row` (parametro posizionale opzionale).

## Output

- `string`: URL generato, oppure `'#'.<azione>` / `'#'.<route target>` come segnaposto.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `ROUTE-ACTURL-INV-1` | Senza route corrente con nome restituisce `'#'.$action`. Test: `tests/Unit/Actions/Route/BuildActionUrlActionTest.php` (route senza nome), `tests/Unit/XotExplicitZeroKillersTest.php` (fuori da una route). | `ROUTE-ACTURL-INV-1` |
| `ROUTE-ACTURL-INV-2` | Se la route di destinazione non è registrata restituisce `'#'.<target>`. Test: `tests/Unit/Actions/Route/BuildActionUrlActionTest.php` | `ROUTE-ACTURL-INV-2` |
| `ROUTE-ACTURL-INV-3` | Altrimenti genera l'URL con i parametri della route corrente, la riga e la query. Test citato (senza group): `tests/Unit/XotExplicitZeroKillersTest.php` (riferisce la classe) | — (non dimostrato) |

## Effetti collaterali

Nessuno. Solo generazione di URL.

## Errori

- `route()` lancia `UrlGenerationException` se mancano parametri richiesti.

## Non fa

- Non fa escape dei valori della query.
- I segnaposto `#...` non sono URL validi: il chiamante deve gestirli.
