---
title: "SafeIntCastAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Cast\\SafeIntCastAction"
qmd: "SafeIntCastAction cast intero sicuro stringa separatori punto virgola troncamento id intervallo default"
---

# SafeIntCastAction

Converte un valore `mixed` in `int` con default. Codice: `app/Actions/Cast/SafeIntCastAction.php`.

## Input

- `mixed $value`, `?int $default = 0`.

## Output

- `int`. Regole: int invariato; float finito → troncamento; non finito → default; null → default; stringa → `parseStringToInt`; bool → `1`/`0`; array con un solo elemento → ricorsione; oggetto con `__toString` → parse; altro → default.
- `parseStringToInt`: rimuove `,`, spazi e `.`; se numerico converte; altrimenti prende le cifre iniziali; altrimenti default.
- `executeWithRange`: clamp. `executeAsId`: minimo 1.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CAST-INT-INV-1` | Un float viene troncato, non arrotondato. Test: `tests/Unit/Actions/Cast/SafeIntCastActionTest.php` | `CAST-INT-INV-1` |
| `CAST-INT-INV-2` | Un valore null produce il default. Test: `tests/Unit/Actions/Cast/SafeCastActionsTest.php` | `CAST-INT-INV-2` |
| `CAST-INT-INV-3` | La stringa `"0"` con default diverso da zero deve restituire `0`. Il codice restituisce il default (`empty("0")`). Bug. Nessun test citato. | — (non dimostrato) |
| `CAST-INT-INV-4` | Il punto decimale in una stringa non deve cambiare il valore intero (`"1.5"` → `1`). Il codice lo rimuove (`"1.5"` → `15`). Bug. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione.

## Non fa

- Bug `CAST-INT-INV-4`: `str_replace` rimuove il punto, quindi `"1.5"` diventa `15` e `"3,7"` diventa `37`. Il caso è reale solo per input con punto decimale; va corretto con un test dedicato.
- Bug `CAST-INT-INV-3`: stesso difetto di `empty("0")` di `SafeFloatCastAction`.
- `executeAsId` restituisce almeno `1`: uno zero diventa `1`.
