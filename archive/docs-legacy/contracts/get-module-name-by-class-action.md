---
title: "GetModuleNameByClassAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Module\\GetModuleNameByClassAction"
qmd: "GetModuleNameByClassAction nome modulo da classe Modules Models Str between duplicato"
---

# GetModuleNameByClassAction

Estrae il nome del modulo da un FQCN di modello, come il segmento tra `Modules\` e `\Models\`. Codice: `app/Actions/Module/GetModuleNameByClassAction.php:10-19`.

## Input

- `string $model_class`: FQCN (`execute`, riga 14).

## Output

- `string`: nome del modulo (riga 16-18).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MODULE-NAME-CLASS-INV-1` | Il risultato è `Str::between($class, 'Modules\\', '\Models\\')`. Codice: righe 16-18. Test: `tests/Unit/Actions/Module/GetModuleNameActionsTest.php:14,22`; `tests/Unit/Actions/Module/ModuleActionsTest.php:6` | `MODULE-NAME-CLASS-INV-1` |
| `MODULE-NAME-CLASS-INV-2` | Il ramo `is_string` è sempre vero: `Str::between` restituisce una stringa. Il fallback `(string)` è inattivo. Codice: riga 18. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno. Calcolo puro.

## Errori

- Nessuna eccezione.

## Non fa

- Dubbio: per una classe senza `\Models\` il comportamento di `Str::between` (soggetto invariato o stringa vuota) va confermato sul test `GetModuleNameActionsTest.php:22`.
- Duplicato funzionale di `GetModuleNameByModelClassAction`: identico nel codice. Da consolidare in un intervento successivo; non modificato qui.
- Marker `@contract` aggiunto nel docblock della classe.
