---
title: "ExportXlsByLazyCollection — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Export\\ExportXlsByLazyCollection"
qmd: "ExportXlsByLazyCollection export Excel LazyCollection LazyCollectionExport download"
---

# ExportXlsByLazyCollection

Esporta una `LazyCollection` in Excel tramite `LazyCollectionExport`.

Codice: `app/Actions/Export/ExportXlsByLazyCollection.php:13-36`.

## Input

- `LazyCollection $collection`.
- `string $filename` (default `test.xlsx`).
- `array $fields`: convertiti a stringhe con `array_values` e `strval`.

## Output

`BinaryFileResponse` da `Excel::download`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XLS-LAZY-INV-1` | il file generato ha il nome `$filename` sia nell'export sia nel download (righe 32-34). Test: Nessun test dedicato. | — (non dimostrato) |
| `XLS-LAZY-INV-2` | `$fields` arriva all'export come lista di stringhe, con chiavi riindicizzate (riga 30). Test: Nessun test dedicato. | — (non dimostrato) |

## Effetti collaterali

Download via layer Excel; nessuna scrittura diretta.

## Errori

Nessuna eccezione propria.

## Non fa

- Non verifica che la sorgente sia ripetibile o lazy-safe.
- Comportamento con `$fields` vuoto delegato a `LazyCollectionExport` (non verificato).
