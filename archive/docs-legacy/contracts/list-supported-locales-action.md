---
title: "ListSupportedLocalesAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\ListSupportedLocalesAction"
qmd: "ListSupportedLocalesAction lingue supportate laravellocalization codice nome nativo"
---

# ListSupportedLocalesAction

Elenca le lingue supportate con il nome nativo. Codice: `app/Actions/ListSupportedLocalesAction.php` (classe a riga 19, `execute()` a riga 26).

## Input

- Nessuno.

## Output

- `array<string, string>`: codice => nome nativo.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `SUPPORTED-LOCALES-INV-1` | Le lingue sono quelle di `LaravelLocalization::getSupportedLocales()`. Test: `tests/Unit/Datas/XotConfigDataTest.php` (menzione). | — (non dimostrato) |
| `SUPPORTED-LOCALES-INV-2` | Se manca `native`, il codice è usato come nome. Test: come sopra. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `Webmozart` se le proprietà di una lingua non sono array.

## Non fa

- Non verifica che i file di traduzione esistano per ogni lingua.
