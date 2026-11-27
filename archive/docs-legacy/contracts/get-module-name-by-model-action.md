---
title: "GetModuleNameByModelAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Module\\GetModuleNameByModelAction"
qmd: "GetModuleNameByModelAction nome modulo da istanza modello Eloquent delega classe"
---

# GetModuleNameByModelAction

Dato un modello Eloquent, restituisce il nome del modulo a cui appartiene la sua classe. Codice: `app/Actions/Module/GetModuleNameByModelAction.php:10-17`.

## Input

- `Model $model`: istanza Eloquent (`execute`, riga 14).

## Output

- `string`: nome del modulo (riga 16).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MODULE-NAME-MODEL-INV-1` | Delega a `GetModuleNameByModelClassAction` con `$model::class`. Codice: riga 16. Test citato (senza group): `tests/Unit/Actions/Module/GetModuleNameActionsTest.php:6,38` | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non valida che la classe sia in `Modules\`: il risultato dipende da `GetModuleNameByModelClassAction`.
- Marker `@contract` aggiunto nel docblock della classe.
