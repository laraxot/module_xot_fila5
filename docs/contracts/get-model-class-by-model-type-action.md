---
title: "GetModelClassByModelTypeAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\GetModelClassByModelTypeAction"
qmd: "GetModelClassByModelTypeAction morph_map tipo modello classe config risoluzione"
---

# GetModelClassByModelTypeAction

Risolve il FQCN da un tipo morph leggendo `config('morph_map')`. Codice: `app/Actions/GetModelClassByModelTypeAction.php` (classe a riga 18, `execute()` a riga 25).

## Input

- `string $model_type`.

## Output

- `string`: FQCN.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `GET-MODEL-CLASS-TYPE-INV-1` | `morph_map` deve essere un array, altrimenti `\Exception`. Test: `tests/Unit/Actions/GetModelActionsTest.php`, `tests/Unit/Actions/ModelTypeActionsTest.php`. | — (non dimostrato) |
| `GET-MODEL-CLASS-TYPE-INV-2` | Il tipo deve essere presente nel `morph_map` e il valore una stringa. Test: come sopra. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `\Exception` se `morph_map` non è array; `Webmozart` se il tipo manca.

## Non fa

- Non ha fallback di scansione dei moduli, a differenza di `Model/GetModelClassByModelNameAction`.
