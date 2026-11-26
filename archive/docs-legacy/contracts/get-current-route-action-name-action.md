---
title: "GetCurrentRouteActionNameAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Route\\GetCurrentRouteActionNameAction"
qmd: "GetCurrentRouteActionNameAction nome metodo controller route corrente snake case Controller"
---

# GetCurrentRouteActionNameAction

Restituisce il nome del metodo del controller della route corrente, in snake_case. Codice: `app/Actions/Route/GetCurrentRouteActionNameAction.php`.

## Input

- Nessuno. Legge la route corrente.

## Output

- `string`: metodo dopo `@`, senza namespace e senza suffisso `Controller`, in snake_case.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `ROUTE-CUR-ACT-INV-1` | Il risultato è il nome del metodo in snake_case, es. `ShowItem` → `show_item`. Test: `tests/Unit/Actions/Route/CurrentRouteActionsTest.php` | `ROUTE-CUR-ACT-INV-1` |

## Effetti collaterali

Nessuno.

## Errori

- `RuntimeException` se la route corrente non ha un controller (propagata da `GetCurrentRouteHandlerAction`).

## Non fa

- Se la stringa handler non contiene `@`, restituisce l'intero handler in snake_case.
