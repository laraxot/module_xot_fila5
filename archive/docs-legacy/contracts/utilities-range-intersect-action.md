---
title: "RangeIntersectAction (Utilities) — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Utilities\\RangeIntersectAction"
qmd: "RangeIntersectAction intersezione intervalli interi max min false vuota utilities"
---

# RangeIntersectAction (Utilities)

Calcola l'intersezione tra due intervalli numerici chiusi `[a, b]` e `[c, d]` come `[max(inizi), min(fini)]`. Codice: `app/Actions/Utilities/RangeIntersectAction.php`.

## Input

- `int $a`, `int $b`: primo intervallo (`execute()`).
- `int $c`, `int $d`: secondo intervallo (`execute()`).

## Output

- `array{0: int, 1: int}|false`: `[inizio, fine]` dell'intersezione se `maxStart <= minEnd`, altrimenti `false` (`execute()`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `UTIL-RANGE-INV-1` | `maxStart = max($a, $c)` e `minEnd = min($b, $d)`; se `maxStart <= minEnd` ritorna `[$maxStart, $minEnd]`. Codice: `execute()`. Test citato (senza group): non verificato | — (non dimostrato) |
| `UTIL-RANGE-INV-2` | Se `maxStart > minEnd` (intervalli disgiunti) ritorna `false`. Codice: `execute()`. Test citato (senza group): non verificato | — (non dimostrato) |

## Effetti collaterali

Nessuno. Calcolo puro.

## Errori

- Nessuna eccezione.

## Non fa

- Non normalizza intervalli invertiti (`a > b`): nessun controllo sugli estremi.
- Non è l'omonima `Modules\Xot\Actions\Arr\RangeIntersectAction` (catena di rami): contratto separato in [range-intersect-action](range-intersect-action.md).
