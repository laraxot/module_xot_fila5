---
title: "GetResourceClassNameByModelClassAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Filament\\GetResourceClassNameByModelClassAction"
qmd: "GetResourceClassNameByModelClassAction Resource canonica pannello corrente Filament getModelResource LogicException XotBaseResource"
---

# GetResourceClassNameByModelClassAction

Restituisce la Resource Filament registrata nel pannello corrente per un modello.

Codice: `app/Actions/Filament/GetResourceClassNameByModelClassAction.php:25-53`.

## Input

- `string $modelClass`: deve estendere `Model`.

## Output

`class-string<XotBaseResource>`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `FIL-RESCLASS-INV-1` | il modello deve estendere `Model` (riga 35). Test: Nessun test dedicato. | — (non dimostrato) |
| `FIL-RESCLASS-INV-2` | se il pannello corrente non ha Resource per il modello lancia `LogicException` (righe 39-46). Test: Nessun test dedicato. | — (non dimostrato) |
| `FIL-RESCLASS-INV-3` | la Resource trovata deve estendere `XotBaseResource` (riga 49). Test: Nessun test dedicato. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

`Assert` per modello o Resource non validi; `LogicException` per Resource assente.

## Non fa

- Dipende dal pannello corrente: la stessa chiamata può cambiare pannello.
