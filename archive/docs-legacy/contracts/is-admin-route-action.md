---
title: "IsAdminRouteAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Route\\IsAdminRouteAction"
qmd: "IsAdminRouteAction rotta admin segmento URL livewire sessione in_admin parametro"
---

# IsAdminRouteAction

Stabilisce se la richiesta corrente è una rotta di amministrazione. Codice: `app/Actions/Route/IsAdminRouteAction.php`.

## Input

- `array $params`: `in_admin` opzionale.

## Output

- `bool`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `ROUTE-ADMIN-INV-1` | Se `in_admin` è impostato, il risultato è `(bool)` di quel valore e l'URL non conta. Test citato (senza group): `tests/Unit/Actions/Route/RouteActionsTest.php` (riferisce la classe) | — (non dimostrato) |
| `ROUTE-ADMIN-INV-2` | Senza parametro, il primo segmento URL `admin` → `true`. Test citato (senza group): `tests/Unit/XotExecuteCoverage50Test.php` (riferisce la classe) | — (non dimostrato) |
| `ROUTE-ADMIN-INV-3` | Con primo segmento `livewire` è `true` solo se `session('in_admin')` è `true`. Test citato (senza group): `tests/Unit/Actions/Route/RouteActionsTest.php` (riferisce la classe) | — (non dimostrato) |

## Effetti collaterali

Nessuno. Legge la sessione.

## Errori

- Nessuno.

## Non fa

- Bug: `(bool)` su stringa `'false'` dà `true`. Un `in_admin` passato come stringa va normalizzato dal chiamante.
