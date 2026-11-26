---
title: "GetFilenameByClassnameAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Classes\\GetFilenameByClassnameAction"
qmd: "GetFilenameByClassnameAction percorso file classe duplicato Class reflection base_path"
---

# GetFilenameByClassnameAction

Ritorna il percorso del file sorgente di una classe. Codice: `app/Actions/Classes/GetFilenameByClassnameAction.php` (classe a riga 14, `execute()` a riga 18). Copia identica di `Class/GetFilenameByClassnameAction`: il comportamento è descritto nel suo contract.

## Input

- `string $class_name`: FQCN.

## Output

- `string`: percorso del file.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CLASSES-FILENAME-INV-1` | Stesso comportamento di `Class/GetFilenameByClassnameAction`, già descritto e testato (`tests/Unit/Actions/Classes/GetFilenameByClassnameActionTest.php`). | — (non dimostrato) |

## Effetti collaterali

Autoload tramite reflection. Nessuna scrittura.

## Errori

- `\Exception` nel caso di risultato non stringa.

## Non fa

- Duplicato: la rimozione di una delle due copie è una decisione da prendere sui chiamanti, non in questo contract.
