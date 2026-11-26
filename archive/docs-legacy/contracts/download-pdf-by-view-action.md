---
title: "DownloadPdfByViewAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Pdf\\DownloadPdfByViewAction"
qmd: "DownloadPdfByViewAction download PDF vista ListRecords ExportPdfAction nome file slug StreamDownloadPdfAction"
---

# DownloadPdfByViewAction

Genera un PDF da una vista Blade e restituisce la risposta di download, delegando a `StreamDownloadPdfAction`.

Codice: `app/Actions/Pdf/DownloadPdfByViewAction.php:17-54`.

## Input

- `string $view`: nome vista (es. `modulo::nome.index.pdf`).
- `array $viewParams`: dati per la vista.
- `?string $filename`: se nullo, derivato dalla vista.

## Output

`StreamedResponse` prodotta da `StreamDownloadPdfAction`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `DOWNLOAD-PDF-INV-1` | senza `$filename` il nome è derivato così: parte dopo `::`, senza `.pdf` finale, punti→trattini, slug, suffisso `.pdf` (righe 33, 43-53). Test: Nessun test dedicato. | — (non dimostrato) |
| `DOWNLOAD-PDF-INV-2` | il rendering e la response sono delegati a `StreamDownloadPdfAction` con `view` e `data` valorizzati e `html` nullo (righe 35-40). Test: Nessun test dedicato. | — (non dimostrato) |

## Effetti collaterali

Nessuna scrittura su disco; rendering della vista tramite la Action delegata.

## Errori

Errori della Action delegata (vista mancante, Html2Pdf) si propagano.

## Non fa

- Il nome finale del download è `report-<filename>` perché `StreamDownloadPdfAction` antepone il prefisso.
- Non verifica l'esistenza della vista: lo fa la Action delegata.
