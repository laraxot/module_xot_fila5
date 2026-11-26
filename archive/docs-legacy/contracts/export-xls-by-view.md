---
title: "ExportXlsByView — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Export\\ExportXlsByView"
qmd: "ExportXlsByView export Excel vista Blade ViewExport download"
---

# ExportXlsByView

Esporta una vista Blade in Excel tramite `ViewExport`.

Codice: `app/Actions/Export/ExportXlsByView.php:16-45`.

## Input

- `View $view`.
- `array $fields`: convertiti a stringhe.
- `string $filename` (default `test.xlsx`), `?string $transKey`.

## Output

`BinaryFileResponse` da `Excel::download`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XLS-VIEW-INV-1` | i campi sono passati a `ViewExport` come stringhe (riga 35-40). Test: Nessun test dedicato. | — (non dimostrato) |

## Effetti collaterali

Download via layer Excel; nessuna scrittura diretta.

## Errori

Nessuna eccezione propria.

## Non fa

- Non renderizza la vista da sé: il rendering è affidato a `ViewExport`.
