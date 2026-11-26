---
title: "ConfigAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\ConfigAction"
qmd: "ConfigAction singleton getInstance make istanza configurazione vuota"
---

# ConfigAction

Singleton senza comportamento. Codice: `app/Actions/ConfigAction.php` (classe a riga 14). Non usa `QueueableAction`.

## Input

- Nessuno.

## Output

- `self`: l'unica istanza del processo, da `getInstance()` o `make()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CONFIG-ACTION-INV-1` | `getInstance()` e `make()` restituiscono sempre la stessa istanza nel processo. Test: `tests/Unit` menzioni generiche, nessun test diretto. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuno.

## Non fa

- Non legge né scrive configurazione: il nome non corrisponde al comportamento.
