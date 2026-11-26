---
title: "SafeArrayCastAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Cast\\SafeArrayCastAction"
qmd: "SafeArrayCastAction cast sicuro mixed array default toArray stdClass scalare chiavi required filter"
---

# SafeArrayCastAction

Converte un valore `mixed` in array, con default per i casi non gestiti. Codice: `app/Actions/Cast/SafeArrayCastAction.php`.

## Input

- `mixed $value`: valore da convertire.
- `?array $default = []`: restituito per null e per i tipi non gestiti.

## Output

- `array`. Regole in ordine: array → chiavi normalizzate; null → default; oggetto con `toArray()` → il suo risultato se è array; `stdClass` → cast; oggetto con `__toArray()`; altri oggetti → proprietà pubbliche (`get_object_vars` dalla classe Action); scalare → `[valore]`; altro → default.
- Helper: `executeWithKeys` restituisce default se manca una chiave richiesta; `executeWithFilter` tiene solo le chiavi ammesse; `executeWithValueType` converte i valori con i cast scalari (`string`, `int`, `float`, `bool`); tipo sconosciuto → array invariato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CAST-ARR-INV-1` | Un array in input è restituito come array. Test: `tests/Unit/Actions/Cast/SafeArrayCastActionTest.php` | `CAST-ARR-INV-1` |
| `CAST-ARR-INV-2` | Null produce `$default ?? []`. Test: `tests/Unit/Actions/Cast/SafeCastActionsTest.php` | `CAST-ARR-INV-2` |
| `CAST-ARR-INV-3` | Uno scalare diventa un array a un elemento con chiave `0`. Test: `tests/Unit/Actions/Cast/SafeCastActionsTest.php` | `CAST-ARR-INV-3` |
| `CAST-ARR-INV-4` | `executeWithKeys` restituisce il default se una chiave richiesta manca. Test: `tests/Unit/Actions/Cast/SafeArrayCastActionTest.php` | `CAST-ARR-INV-4` |
| `CAST-ARR-INV-5` | Le conversioni non lanciano eccezioni per tipi non gestiti. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno. Chiama `toArray()` o `__toArray()` su oggetti, se presenti.

## Errori

- Nessuno dall'Action. Eccezioni lanciate da `toArray()` o `__toArray()` si propagano.

## Non fa

- `normalizeArray` converte le chiavi in stringa, ma PHP riconverte le chiavi numeriche in `int`: di fatto non cambia le chiavi.
- Non normalizza ricorsivamente gli array annidati.
- Per oggetti usa solo le proprietà pubbliche.
