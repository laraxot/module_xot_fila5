---
title: "GetModuleConfigAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Module\\GetModuleConfigAction"
qmd: "GetModuleConfigAction legge config modulo file php array eccezione config file not found"
---

# GetModuleConfigAction

Carica il file di configurazione `{config}.php` della cartella `config` di un modulo e restituisce il suo array con sole chiavi stringa. Codice: `app/Actions/Module/GetModuleConfigAction.php:10-45`.

## Input

- `string $moduleName`: nome del modulo (`execute`, riga 17).
- `string $config`: nome del file senza estensione (riga 17).

## Output

- `array<string, mixed>`: contenuto del file, solo chiavi stringa (righe 30-43).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MODULE-CONFIG-INV-1` | Il percorso è `{cartella config del modulo}/{config}.php`, risolto con `GetModulePathByGeneratorAction`. Se il file manca, lancia `\Exception` ("Config file not found"). Codice: righe 19-23. Test: `tests/Unit/Actions/Module/GetModuleConfigActionTest.php:29,44,64` | `MODULE-CONFIG-INV-1` |
| `MODULE-CONFIG-INV-2` | Il file deve restituire un array, altrimenti `\Exception`. Codice: righe 25-28. Test: `tests/Unit/Actions/Module/GetModuleConfigActionTest.php` | `MODULE-CONFIG-INV-2` |
| `MODULE-CONFIG-INV-3` | Sono conservate solo le chiavi stringa. Codice: righe 33-40. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Lettura e esecuzione del file PHP di configurazione. Nessuna cache: ogni chiamata ricarica il file.

## Errori

- `\Exception` generica per file mancante o non array. Nessuna eccezione tipizzata.

## Non fa

- Non valida `$config`: il parametro non è normalizzato rispetto a `..`.
- Marker `@contract` aggiunto nel docblock della classe.
