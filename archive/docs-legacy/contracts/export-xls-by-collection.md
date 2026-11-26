---
title: "ExportXlsByCollection — contratto"
type: contract
action: "Modules\\Xot\\Actions\\Export\\ExportXlsByCollection"
module: Xot
status: accepted
created: 2026-11-26
updated: 2026-11-26
qmd: "ExportXlsByCollection export Excel collection CollectionExport download Storage local executeWithSpreadsheet fields transKey xlsExport"
---

# ExportXlsByCollection

Esporta una collezione di record o di array in un file Excel tramite `CollectionExport` (Laravel Excel): `execute()` risponde con un download, `executeWithSpreadsheet()` scrive il file sul disco `local`. Codice: `app/Actions/Export/ExportXlsByCollection.php` (classe a riga 24, `execute()` a riga 38, `executeWithSpreadsheet()` a riga 66). I dati esportati sono quelli dei record passati dal chiamante, quindi possono contenere dati personali.

Valido per tutti i tenant che usano Xot: la usano le tre azioni Filament `ExportXlsAction` (header), `ExportTreeXlsAction` e `ExportXlsTableAction`.

## Input

- `Collection|EloquentCollection $collection`: le righe da esportare (Model oppure array).
- `string $filename` (default `test.xlsx`): nome del file scaricato (`execute`) o scritto (`executeWithSpreadsheet`).
- `?string $transKey` (solo `execute`): chiave di traduzione per le intestazioni implicite.
- `array<int|string, string> $fields`: chiave intera = percorso `data_get` con intestazione tradotta; chiave stringa = percorso con intestazione esplicita non tradotta (`CollectionExport.php:41-47`).

## Output

- `execute()`: `BinaryFileResponse` prodotta da `Excel::download` (riga 52).
- `executeWithSpreadsheet()`: `string`, percorso assoluto del file scritto su `Storage::disk('local')` (riga 72).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XOT-EXPORT-XLS-COLLECTION-INV-1` | `execute()` passa a `CollectionExport` collezione, `transKey` e `fields` così come ricevuti e restituisce il download di `Excel::download($export, $filename)`; non scrive sul disco applicativo (righe 44-52). Se la regola è violata, il file scaricato ha colonne o intestazioni diverse da quelle richieste dal chiamante. | — (non dimostrato) |
| `XOT-EXPORT-XLS-COLLECTION-INV-2` | Il formato misto di `$fields` è rispettato: una chiave stringa è il percorso e il suo valore l'intestazione, che non passa dalla traduzione; una chiave intera è un percorso con intestazione tradotta via `$transKey`; un percorso assente esporta una cella vuota senza saltare la colonna. La regola è implementata in `CollectionExport::headings()` e `map()` (`app/Exports/CollectionExport.php:79-136`); i test esistenti provano `CollectionExport`, non questa Action: `tests/Unit/Exports/CollectionExportLabelledFieldsTest.php` (da annotare con il group, vedi Backlog test). | — (non dimostrato) |
| `XOT-EXPORT-XLS-COLLECTION-INV-3` | `executeWithSpreadsheet()` scrive in modo sincrono il contenuto XLSX di `Excel::raw()` in `Storage::disk('local')` con il nome `$filename` e restituisce il percorso assoluto; un file con lo stesso nome viene sovrascritto (righe 68-74). Non usa `Excel::store()`, che accoderebbe l'export perché `CollectionExport` è `ShouldQueue`. | — (non dimostrato) |

## Effetti collaterali

In ordine, per `execute()`: costruzione di `CollectionExport`; `Excel::download` genera l'export e risponde con il file (file temporaneo gestito da Laravel Excel). Per `executeWithSpreadsheet()`: costruzione dell'export; `Excel::raw` produce i byte XLSX in memoria; `Storage::disk('local')->put` scrive il file (sovrascrive); si restituisce il percorso. Nessuna transazione, nessun evento, nessuna notifica, nessuna coda esplicita.

## Errori

- `InvalidArgumentException` (Webmozart `Assert::isInstanceOf`) quando `$fields` è vuoto e la prima riga non è un `Model` (`CollectionExport::getHead`, riga 71), o una riga non è un `Model` (`map`, riga 122): senza campi l'export ricava le intestazioni dagli attributi del primo Model. Protegge `XOT-EXPORT-XLS-COLLECTION-INV-2`.
- Gli errori di Laravel Excel e di `Storage` non sono catturati qui: si propagano al chiamante.

## Non fa

- Non autorizza e non filtra: l'autorizzazione è del chiamante (`ExportXlsAction` usa `->authorize('xlsExport')` a riga 54 e `Gate::authorize('xlsExport', ...)` a riga 58 di `app/Filament/Actions/Header/ExportXlsAction.php`; `ExportTreeXlsAction.php` ed `ExportXlsTableAction.php` non contengono nessuna chiamata `authorize` nel proprio file, e se un'altra autorizzazione le protegge non è accertato qui: da verificare, vedi Limite noto). Chi esporta dati personali ne risponde al livello dell'azione, non qui.
- Non mette la lista dei campi in sicurezza: con `$fields` vuoto esporta tutti gli attributi del primo Model; `ExportXlsAction` evita il caso fermandosi prima con un avviso (righe 74-80).
- Non è accodata: `execute()` risponde subito con il download.
- Limite noto: `executeWithSpreadsheet()` non ha chiamanti nel repository (nessun risultato di `rg "executeWithSpreadsheet" laravel/Modules laravel/Themes` fuori dalla classe stessa), quindi la sua promessa non è esercitata da nessun flusso reale. Non estenderla finché non serve.
- Limite noto: due dei tre chiamanti (`ExportTreeXlsAction`, `ExportXlsTableAction`) non hanno un'autorizzazione esplicita visibile nel loro file mentre esportano i campi dei record: difetto potenziale, non corretto in questa passata (solo documentazione).
- Limite noto: nessun test esercita l'Action (nessun file in `Modules/Xot/tests` cita `ExportXlsByCollection`).
