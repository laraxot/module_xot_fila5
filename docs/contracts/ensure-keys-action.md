---
title: "EnsureKeysAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Arr\\EnsureKeysAction"
qmd: "EnsureKeysAction allinea righe schema chiavi mancanti null JSON coerente modello riga incompleta"
---

# EnsureKeysAction

Allinea ogni riga di un dataset alle chiavi attese dallo schema: le chiavi mancanti diventano `null`, quelle presenti sono conservate. Codice: `app/Actions/Arr/EnsureKeysAction.php:14-40`.

## Input

- `array<int|string, array<string, mixed>|mixed> $data`: righe da allineare (`execute`, riga 23).
- `array<int|string, string|int> $keys`: chiavi attese dallo schema (riga 23).

## Output

- `array<int|string, array<string, mixed>>`: righe array allineate, con le chiavi originali di `$data` (righe 29-38).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `ARR-ENSURE-INV-1` | Ogni riga restituita contiene tutte le chiavi di `$keys` (convertite con `strval`); le mancanti valgono `null`. Codice: righe 27, 33. Nessun test citato. | — (non dimostrato) |
| `ARR-ENSURE-INV-2` | I valori già presenti nella riga vincono sul template (`array_replace`). Codice: riga 33. Nessun test citato. | — (non dimostrato) |
| `ARR-ENSURE-INV-3` | Le chiavi della riga non presenti nello schema sono conservate. Codice: riga 33. Nessun test citato. | — (non dimostrato) |
| `ARR-ENSURE-INV-4` | Le righe che non sono array sono scartate senza errore. Codice: righe 30-36. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno. Calcolo in memoria.

## Errori

- Nessuna eccezione. Gli elementi non validi vengono scartati silenziosamente.

## Non fa

- Non valida i tipi dei valori.
- Non rimuove le chiavi extra: lo schema non è una whitelist.
- Marker `@contract` aggiunto nel docblock della classe.
