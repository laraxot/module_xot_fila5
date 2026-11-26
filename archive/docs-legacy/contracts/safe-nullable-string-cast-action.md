---
title: "SafeNullableStringCastAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Cast\\SafeNullableStringCastAction"
qmd: "SafeNullableStringCastAction stringa nullable stringa vuota null cast sicuro"
---

# SafeNullableStringCastAction

Converte un valore in `?string`: la stringa vuota diventa null. Codice: `app/Actions/Cast/SafeNullableStringCastAction.php`.

## Input

- `mixed $value`.

## Output

- `?string`: null se la stringa prodotta da `SafeStringCastAction` è vuota; altrimenti la stringa.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CAST-NSTR-INV-1` | Null o stringa vuota producono null. Test citato (senza group): `tests/Unit/Actions/Cast/SafeNullableStringCastActionTest.php` (riferisce la classe) | — (non dimostrato) |
| `CAST-NSTR-INV-2` | Il valore `false` produce `'0'`, non null. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuno.

## Non fa

- Non tratta `'0'` come assente.
