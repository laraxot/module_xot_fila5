---
title: "ArrayToRawJsAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Arr\\ArrayToRawJsAction"
qmd: "ArrayToRawJsAction array PHP RawJs oggetto JavaScript x-data attributo HTML chiavi apici escape Chart.js"
---

# ArrayToRawJsAction

Converte un array PHP in un letterale JavaScript (oggetto) incapsulato in `RawJs`, pronto per attributi HTML tipo `x-data="..."`. Codice: `app/Actions/Arr/ArrayToRawJsAction.php:29-66`.

## Input

- `array<int|string, mixed> $array`: array associativo, anche annidato (`execute`, riga 29).

## Output

- `RawJs`: `RawJs::make('{...}')` con le coppie `chiave: valore` separate da `, ` (riga 43).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `ARR-RAWJS-INV-1` | Le chiavi che non sono identificatori (`^[a-zA-Z_][a-zA-Z0-9_]*$`) sono emesse tra apici singoli, con l'apice escapato. Codice: righe 47-50. Test citato (senza group): `tests/Unit/Actions/Arr/ArrayToRawJsActionTest.php` (presente; copertura di questo ramo non verificata) | — (non dimostrato) |
| `ARR-RAWJS-INV-2` | Un valore `RawJs` è emesso raw via `(string) $raw` (Stringable/`__toString`), senza quoting. Codice: `rawJsExpression()`. Test: come sopra | `ARR-RAWJS-INV-2` |
| `ARR-RAWJS-INV-3` | Valori scalari: bool -> `true`/`false`, null -> `null`, numerici -> senza apici, altro -> stringa tra apici singoli con backslash e apice escapati (via `SafeStringCastAction`). Codice: righe 52-66. Test citato (senza group): come sopra | — (non dimostrato) |
| `ARR-RAWJS-INV-4` | Gli array annidati sono convertiti ricorsivamente nello stesso formato. Codice: righe 36-37. Test: come sopra | `ARR-RAWJS-INV-4` |

## Effetti collaterali

Nessuno. Funzione pura: nessuna scrittura, nessuna coda, nessun servizio esterno.

## Errori

- Nessuna eccezione propria. Eventuali eccezioni di `SafeStringCastAction::cast()` si propagano.

## Non fa

- Non applica escaping HTML: la sicurezza dell'attributo dipende dal contesto in cui il risultato viene stampato.
- Dubbio: `is_numeric()` accetta anche stringhe con spazi o notazione esponenziale, che vengono emesse senza apici. Non verificato se qualche chiamante passa stringhe non controllate.
- Marker `@contract` aggiunto nel docblock della classe.
