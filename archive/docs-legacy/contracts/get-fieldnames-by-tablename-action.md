---
title: "GetFieldnamesByTablenameAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Query\\GetFieldnamesByTablenameAction"
qmd: "GetFieldnamesByTablenameAction nomi colonne tabella connessione validazione InvalidArgumentException"
---

# GetFieldnamesByTablenameAction

Restituisce i nomi delle colonne di una tabella su una connessione indicata. Codice: `app/Actions/Query/GetFieldnamesByTablenameAction.php` (classe a riga 17, `execute()` a riga 30).

## Input

- `string $table`: nome della tabella, non vuoto.
- `?string $connectionName`: connessione; default `database.default`.

## Output

- `list<string>`: nomi delle colonne.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `GET-FIELDNAMES-INV-1` | Tabella vuota: `InvalidArgumentException`. Test: nessuno. | — (non dimostrato) |
| `GET-FIELDNAMES-INV-2` | La connessione deve rispondere a `getPdo()`, altrimenti `InvalidArgumentException`. Test: nessuno. | — (non dimostrato) |
| `GET-FIELDNAMES-INV-3` | La tabella deve esistere, altrimenti `InvalidArgumentException`. Test: nessuno. | — (non dimostrato) |
| `GET-FIELDNAMES-INV-4` | Il risultato è `getColumnListing()` con indici rinumerati. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Apre la connessione per il controllo `getPdo()`. Nessuna scrittura.

## Errori

- `InvalidArgumentException` per ogni errore, anche infrastrutturale: qualsiasi `Throwable` in lettura colonne è riavvolto in `InvalidArgumentException`, il che nasconde la natura del guasto.

## Non fa

- Non cachea.
