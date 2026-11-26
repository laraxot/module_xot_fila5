---
title: "RangeIntersectAction (Arr) — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Arr\\RangeIntersectAction"
qmd: "RangeIntersectAction intersezione intervalli interi a0 b0 a1 b1 false vuota"
---

# RangeIntersectAction (Arr)

Calcola l'intersezione tra due intervalli interi `[a0, b0]` e `[a1, b1]` con una catena di rami. Codice: `app/Actions/Arr/RangeIntersectAction.php`.

## Input

- `int $a0`, `int $b0`: primo intervallo (`execute()`).
- `int $a1`, `int $b1`: secondo intervallo (`execute()`).

## Output

- `array<int, int>|false`: `[inizio, fine]` dell'intersezione, oppure `false` se vuota (`execute()`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `ARR-RANGE-INV-1` | Ramo 1: `a1 in [a0,b0]` e `b0 <= b1` -> `[a1, b0]`. Codice: `execute()`. Test: `tests/Unit/Actions/Arr/RangeIntersectActionTest.php` | `ARR-RANGE-INV-1` |
| `ARR-RANGE-INV-2` | Ramo 2: `a0 in [a1,b0]` e `b0 <= b1` -> `[a0, b0]`. Codice: `execute()`. Test: come sopra | `ARR-RANGE-INV-2` |
| `ARR-RANGE-INV-3` | Ramo 3: `a1 in [a0,b1]` e `b1 <= b0` -> `[a1, b1]`. Codice: `execute()`. Test: come sopra | `ARR-RANGE-INV-3` |
| `ARR-RANGE-INV-4` | Rami di scarto: `a0 < a1`, o `a0 > b1`, o `b1 > b0` -> `false`. Codice: `execute()`. Test citato (senza group): come sopra | — (non dimostrato) |
| `ARR-RANGE-INV-5` | Caso residuo: `[a0, b1]`. Codice: `execute()`. Test citato (senza group): come sopra | — (non dimostrato) |

## Effetti collaterali

Nessuno. Calcolo puro.

## Errori

- Nessuna eccezione.

## Non fa

- Non normalizza intervalli invertiti (`a > b`): nessun controllo su `a0 <= b0` né `a1 <= b1`.
- Dubbio: la semantica è l'intersezione di intervalli chiusi, ma il ramo residuo è raggiunto per deduzione dai rami di scarto. Da confermare con i test prima di estendere l'uso.
- Non è l'omonima `Modules\Xot\Actions\Utilities\RangeIntersectAction` (implementazione `max`/`min`): contratto separato in [utilities-range-intersect-action](utilities-range-intersect-action.md).
