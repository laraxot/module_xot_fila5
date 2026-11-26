---
title: "GetCurrentRouteHandlerAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Route\\GetCurrentRouteHandlerAction"
qmd: "GetCurrentRouteHandlerAction handler controller@metodo route corrente eccezione closure"
---

# GetCurrentRouteHandlerAction

Restituisce la stringa `Classe@metodo` della route corrente. Codice: `app/Actions/Route/GetCurrentRouteHandlerAction.php`.

## Input

- Nessuno.

## Output

- `string`: valore dell'azione `controller` della route corrente.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `ROUTE-CUR-HDL-INV-1` | Il risultato è l'azione `controller` della route corrente. Test: `tests/Unit/Actions/Route/CurrentRouteActionsTest.php` | `ROUTE-CUR-HDL-INV-1` |
| `ROUTE-CUR-HDL-INV-2` | Se non c'è route o l'azione non è una stringa (es. closure) lancia `RuntimeException`. Test citato (senza group): `tests/Unit/Actions/Route/CurrentRouteActionsTest.php` (riferisce la classe) | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `RuntimeException`: `The current route has no controller action.`

## Non fa

- Non distingue route con metodo HTTP diverso.
