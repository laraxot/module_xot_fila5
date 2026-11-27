---
title: "SafeStringCastAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Cast\\SafeStringCastAction"
qmd: "SafeStringCastAction cast stringa sicuro null bool scalare array oggetto stringa vuota"
---

# SafeStringCastAction

Converte un valore `mixed` in `string` senza eccezioni. Codice: `app/Actions/Cast/SafeStringCastAction.php`.

## Input

- `mixed $value`.

## Output

- `string`. Regole: stringa invariata; null → `''`; bool → `'1'`/`'0'`; scalare → cast a stringa; array o oggetto → `''`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CAST-STR-INV-1` | Null e array/oggetti producono `''`. Test: `tests/Unit/Actions/Cast/SafeStringCastActionTest.php` | `CAST-STR-INV-1` |
| `CAST-STR-INV-2` | `true` produce `'1'`, `false` produce `'0'`. Test: `tests/Unit/Actions/Cast/SafeStringCastActionTest.php` | `CAST-STR-INV-2` |
| `CAST-STR-INV-3` | Non lancia eccezioni per nessun tipo. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuno.

## Non fa

- Ignora oggetti con `__toString`: restituisce `''`.
- Il blocco commentato sui `BackedEnum` non è attivo.
