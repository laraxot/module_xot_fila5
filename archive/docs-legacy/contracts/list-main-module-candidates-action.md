---
title: "ListMainModuleCandidatesAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\ListMainModuleCandidatesAction"
qmd: "ListMainModuleCandidatesAction moduli principali candidati pannello Filament AdminPanelProvider moduli abilitati"
---

# ListMainModuleCandidatesAction

Elenca i moduli abilitati che possono essere il modulo principale, cioè quelli con un pannello Filament. Codice: `app/Actions/ListMainModuleCandidatesAction.php` (classe a riga 22, `execute()` a riga 31).

## Input

- Nessuno.

## Output

- `array<string, string>`: nome => nome, ordinato per chiave.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MAIN-MODULE-CANDIDATES-INV-1` | Solo moduli abilitati (`Module::allEnabled()`). Test: `tests/Unit/Datas/XotConfigDataTest.php` (menzione). | — (non dimostrato) |
| `MAIN-MODULE-CANDIDATES-INV-2` | Un modulo è candidato solo se esiste il file `app/Providers/Filament/AdminPanelProvider.php`. Test: come sopra. | `MAIN-MODULE-CANDIDATES-INV-2` |
| `MAIN-MODULE-CANDIDATES-INV-3` | Il risultato è ordinato per nome. Test: come sopra. | — (non dimostrato) |

## Effetti collaterali

Lettura di filesystem.

## Errori

- `Webmozart` se il nome del modulo non è stringa.

## Non fa

- Non verifica che il provider si carichi né che il pannello sia valido.
