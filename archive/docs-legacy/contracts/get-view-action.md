---
title: "GetViewAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\GetViewAction"
qmd: "GetViewAction vista nome risolto pub_theme modulo percorso file panels actions home acts admin"
---

# GetViewAction

Risolve il nome della vista Blade da un file o dal chiamante, con priorità al tema pubblico. Codice: `app/Actions/GetViewAction.php` (classe a riga 16, `execute()` a riga 28).

## Input

- `string $tpl = ''`: suffisso opzionale di vista.
- `string $file0 = ''`: percorso del file; se vuoto si usa il chiamante.

## Output

- `view-string`: nome della vista esistente.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `GET-VIEW-INV-1` | Se esiste `pub_theme::<percorso>[.tpl]` viene restituita quella. Test: nessuno diretto (`tests/Arch/debt.php` cita la classe: non è un test). | — (non dimostrato) |
| `GET-VIEW-INV-2` | Altrimenti `<modulo minuscolo>::<percorso>[.tpl]`, con la struttura `Modules/<M>/app/...` attesa dagli indici fissi. Test: nessuno. | — (non dimostrato) |
| `GET-VIEW-INV-3` | Per `panels.actions.` il percorso è riscritto su `home.acts.` (admin se `inAdmin()`) e `-action` è rimosso. Test: nessuno. | — (non dimostrato) |
| `GET-VIEW-INV-4` | Se la vista non esiste, `\Exception('View [...] not found')`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno: solo `view()->exists()`.

## Errori

- `\Exception` se la vista non è trovata.

## Non fa

- Dipende da indici fissi sul percorso (`$arr[1]`, `$arr[4]`): un file fuori dalla struttura prevista produce un nome sbagliato.
