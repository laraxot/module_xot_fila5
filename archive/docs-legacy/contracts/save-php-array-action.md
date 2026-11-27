---
title: "SavePhpArrayAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Arr\\SavePhpArrayAction"
qmd: "SavePhpArrayAction array PHP una chiave per riga var_export return file lang nested inline clean code"
---

# SavePhpArrayAction

Salva un array come file PHP `return [...]` con una chiave per riga, senza array annidati inline. Codice: `app/Actions/Arr/SavePhpArrayAction.php:23-70` (`execute()` a riga 30, `exportArray()` a riga 41).

## Input

- `array<int|string, mixed> $data` (`execute`, riga 30).
- `string $filename`: file di destinazione (riga 26).

## Output

- `bool`: `(bool)` dei byte scritti da `Safe\file_put_contents` (riga 35).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XOT-SAVE-PHP-INV-1` | Il file scritto, caricato con `require`, restituisce lo stesso array salvato (anche annidato) e `execute()` restituisce `true` (righe 32-35). | `XOT-SAVE-PHP-INV-1` |
| `XOT-SAVE-PHP-INV-2` | Il file scritto dichiara `declare(strict_types=1);`: ha la forma `<?php`, riga vuota, `declare(strict_types=1);`, riga vuota, `return <array>;` (riga 33). Il test asserisce la sola presenza della direttiva. | `XOT-SAVE-PHP-INV-2` |
| `XOT-SAVE-PHP-INV-3` | Un array annidato non è mai scritto su una riga sola: una chiave per riga, con rientro di 4 spazi per livello (righe 41-59); un array vuoto è `[]` (righe 43-45). Il test prova «mai inline» (`'navigation' => [` seguito da a capo) e non il numero di spazi. | `XOT-SAVE-PHP-INV-3` |
| `XOT-SAVE-PHP-INV-4` | Le chiavi intere sono scritte senza apici, le chiavi stringa con `var_export` (riga 52). | — (non dimostrato) |
| `XOT-SAVE-PHP-INV-5` | I valori non array sono scritti con `var_export` (riga 68). | — (non dimostrato) |

ID precedenti (prefisso `ARR-SAVEPHP-INV-`, mai citati altrove): il numero 1 è ora `XOT-SAVE-PHP-INV-3`, il 2 è ora `XOT-SAVE-PHP-INV-4`, il 3 è ora `XOT-SAVE-PHP-INV-2`, il 4 è ora `XOT-SAVE-PHP-INV-5`; `XOT-SAVE-PHP-INV-1` (round-trip) è nuovo. Test citato dal contratto precedente e non annotato: `tests/Unit/Actions/ArrayArrActionsTest.php:97`.

## Effetti collaterali

Scrittura del file (sovrascrive). Non crea la cartella di destinazione, a differenza di `SaveJsonArrayAction`.

## Errori

- Le funzioni `Safe\*` lanciano eccezioni su I/O fallito.

## Non fa

- Non scrive in modo atomico.
- Non valida il contenuto né la leggibilità della chiave.
- Limite noto: `Modules/Xot/tests/Arch/debt.php:16` elenca questa classe nel debito `php` (uso di `var_export`, righe 52 e 68).
