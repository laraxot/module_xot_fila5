---
title: "SaveJsonArrayAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Arr\\SaveJsonArrayAction"
qmd: "SaveJsonArrayAction salva array JSON pretty print crea cartella file_put_contents Safe sovrascrive"
---

# SaveJsonArrayAction

Scrive un array come JSON formattato su file, creando la cartella se manca. Codice: `app/Actions/Arr/SaveJsonArrayAction.php:18-35` (`execute()` a riga 25).

## Input

- `array<int|string, mixed> $data` (`execute`, riga 25).
- `string $filename`: percorso assoluto o relativo di destinazione (riga 20).

## Output

- `bool`: `(bool)` dei byte scritti da `Safe\file_put_contents` (riga 33).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XOT-SAVE-JSON-INV-1` | Il file scritto contiene JSON che, decodificato, restituisce lo stesso array (anche vuoto) e `execute()` restituisce `true` (righe 27, 33). | `XOT-SAVE-JSON-INV-1` |
| `XOT-SAVE-JSON-INV-2` | Il contenuto è `Safe\json_encode($data, JSON_PRETTY_PRINT)` (riga 27): i test non verificano la formattazione. Test citati dal contratto precedente, non annotati con il group: `tests/Unit/Actions/ArrayArrActionsTest.php:96`, `tests/Unit/Actions/Arr/SaveArrayActionsTest.php:34`. | — (non dimostrato) |
| `XOT-SAVE-JSON-INV-3` | La cartella del file è creata (`File::ensureDirectoryExists`, riga 31) prima della scrittura. | — (non dimostrato) |
| `XOT-SAVE-JSON-INV-4` | Un file esistente è sovrascritto senza backup (riga 33). | — (non dimostrato) |

ID precedenti (prefisso `ARR-SAVEJSON-INV-`, mai citati altrove): il numero 1 si è diviso in `XOT-SAVE-JSON-INV-1` (round-trip, provato) e `XOT-SAVE-JSON-INV-2` (formattazione); il numero 2 è ora `XOT-SAVE-JSON-INV-3`; il numero 3 è ora `XOT-SAVE-JSON-INV-4`.

## Effetti collaterali

Ordine: encode in memoria, creazione della cartella, scrittura del file. Nessuna transazione, nessun evento, nessuna coda.

## Errori

- Le funzioni `Safe\*` lanciano eccezioni su encode o I/O fallito. Nessuna gestione locale.

## Non fa

- Non scrive in modo atomico (nessun file temporaneo + rename).
- Marker `@contract` aggiunto nel docblock della classe.
