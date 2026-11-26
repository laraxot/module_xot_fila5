---
title: "GetThemeAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Theme\\GetThemeAction"
qmd: "GetThemeAction tema attivo config theme.active default contratto Xot"
---

# GetThemeAction

Restituisce il nome del tema attivo letto da `config('theme.active')`. Codice: `app/Actions/Theme/GetThemeAction.php`.

## Input

- Nessuno. `execute()` non ha parametri; legge la config.

## Output

- `string`: il valore di `theme.active` se è una stringa, altrimenti `'default'`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `THEME-GET-INV-1` | Se `theme.active` è una stringa, il risultato è quella stringa. Test: `tests/Unit/Actions/Theme/ThemeActionsTest.php` | `THEME-GET-INV-1` |
| `THEME-GET-INV-2` | Se la chiave manca o non è una stringa, il risultato è `'default'`. Test citato (senza group): `tests/Unit/Actions/Theme/ThemeActionsTest.php` (riferisce la classe) | — (non dimostrato) |

## Effetti collaterali

Nessuno. Sola lettura della config, nessuna scrittura, nessun evento.

## Errori

- Nessuno. L'Action non lancia eccezioni.

## Non fa

- Non verifica che il tema esista su disco o in `resources/themes`.
- Non legge sessione, cookie o richiesta: il tema è quello in config del processo.
