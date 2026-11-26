---
title: "GetModuleNameByModelClassAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Module\\GetModuleNameByModelClassAction"
qmd: "GetModuleNameByModelClassAction nome modulo classe modello Modules Models Str between usata GetViewByModelClassAction"
---

# GetModuleNameByModelClassAction

Estrae il nome del modulo da un FQCN di modello, come il segmento tra `Modules\` e `\Models\`. È usata da `GetViewByModelClassAction`. Codice: `app/Actions/Module/GetModuleNameByModelClassAction.php:10-19`.

## Input

- `string $model_class`: FQCN del modello (`execute`, riga 14).

## Output

- `string`: nome del modulo (righe 16-18).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MODULE-NAME-MODELCLASS-INV-1` | Il risultato è `Str::between($class, 'Modules\\', '\Models\\')`. Codice: righe 16-18. Test: `tests/Unit/Actions/Module/GetModuleNameActionsTest.php:7,15,23`; `:34` (mock nel test del delegato) | `MODULE-NAME-MODELCLASS-INV-1` |
| `MODULE-NAME-MODELCLASS-INV-2` | Il ramo `is_string` è sempre vero: il fallback `(string)` è inattivo. Codice: riga 18. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione.

## Non fa

- Duplicato funzionale di `GetModuleNameByClassAction`: codice identico. Da consolidare in un intervento successivo; non modificato qui.
- Dubbio come per `GetModuleNameByClassAction` sul caso senza `\Models\`.
- Marker `@contract` aggiunto nel docblock della classe.
