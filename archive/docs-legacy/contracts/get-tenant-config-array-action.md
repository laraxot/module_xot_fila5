---
title: "GetTenantConfigArrayAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Config\\GetTenantConfigArrayAction"
qmd: "GetTenantConfigArrayAction legge configurazione tenant array file php getRequire chiavi stringa"
---

# GetTenantConfigArrayAction

Legge il file di configurazione del tenant `{name}.php` e restituisce il suo array con sole chiavi stringa. Codice: `app/Actions/Config/GetTenantConfigArrayAction.php:10-39`.

## Input

- `string $name`: nome della configurazione, senza estensione (`execute`, riga 17).

## Output

- `array<string, mixed>`: configurazione del tenant, o `[]` (righe 21-38).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CONFIG-TENANT-ARR-INV-1` | Il percorso è quello risolto da `GetTenantConfigPathAction`. Se il file non esiste, ritorna `[]`. Codice: righe 19-23. Test: `tests/Unit/Actions/Config/GetTenantConfigActionsTest.php:35,52`; `tests/Unit/Actions/Config/GetTenantConfigArrayActionTest.php:22` | `CONFIG-TENANT-ARR-INV-1` |
| `CONFIG-TENANT-ARR-INV-2` | Se il file non restituisce un array, ritorna `[]`. Codice: righe 25-29. Test: come sopra | `CONFIG-TENANT-ARR-INV-2` |
| `CONFIG-TENANT-ARR-INV-3` | Sono conservate solo le chiavi stringa; le chiavi intere sono scartate. Codice: righe 31-38. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Lettura del file con `File::getRequire`, che esegue il codice PHP del file. Nessuna scrittura.

## Errori

- Nessuna eccezione propria. Gli errori del file di configurazione si propagano.

## Non fa

- Non valida `$name`: eventuali segmenti di percorso passano alla risoluzione del path.
- Non valida i valori.
- Marker `@contract` aggiunto nel docblock della classe.
