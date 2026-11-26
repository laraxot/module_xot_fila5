---
title: "BuildLanguageUrlAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Route\\BuildLanguageUrlAction"
qmd: "BuildLanguageUrlAction URL lingua placeholder stub punto interrogativo"
---

# BuildLanguageUrlAction

Dovrebbe costruire l'URL di cambio lingua. Nel codice restituisce sempre un placeholder. Codice: `app/Actions/Route/BuildLanguageUrlAction.php`.

## Input

- Nessuno.

## Output

- `string`: sempre `'?'`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `ROUTE-LANGURL-INV-1` | Il risultato è sempre `'?'`. Test: `tests/Unit/Actions/Route/RouteActionsTest.php` | `ROUTE-LANGURL-INV-1` |

## Effetti collaterali

Nessuno.

## Errori

- Nessuno.

## Non fa

- Non costruisce alcun URL di cambio lingua. Sembra uno stub: il chiamante va verificato prima di farne affidamento.
