---
title: "GetModulePathByGeneratorAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Module\\GetModulePathByGeneratorAction"
qmd: "GetModulePathByGeneratorAction percorso modulo generatore config modules paths module_path RuntimeException"
---

# GetModulePathByGeneratorAction

Restituisce il percorso di una cartella di un modulo, risolto dalla chiave `modules.paths.generator.{generatorPath}.path` della configurazione nwidart. Codice: `app/Actions/Module/GetModulePathByGeneratorAction.php:11-27`.

## Input

- `string $moduleName`: nome del modulo (`execute`, riga 13).
- `string $generatorPath`: chiave del generatore, es. `config` (riga 13).

## Output

- `string`: percorso assoluto della cartella (righe 15-17, 22).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MODULE-PATH-GEN-INV-1` | Il percorso relativo è letto con `Config::string('modules.paths.generator.{generatorPath}.path')`. Codice: riga 15. Test citato (senza group): `tests/Unit/Actions/Module/GetModuleConfigActionTest.php:23,38` (mock) | — (non dimostrato) |
| `MODULE-PATH-GEN-INV-2` | Se `module_path()` lancia `ModuleNotFoundException`, prova `base_path('Modules/{modulo}')/{relativo}`; se esiste lo ritorna. Codice: righe 16-22. Nessun test citato. | — (non dimostrato) |
| `MODULE-PATH-GEN-INV-3` | Se nessuno dei due percorsi esiste: `RuntimeException` ("Module path not found"). Codice: righe 23-25. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno. Sola lettura di configurazione e filesystem.

## Errori

- `RuntimeException` quando il percorso non esiste, con l'eccezione precedente come causa.

## Non fa

- Non usa il trait `QueueableAction`, a differenza delle altre Action del modulo. Non cambia il comportamento, ma è incoerente con la convenzione.
- Dubbio: il comportamento di `Config::string` su chiave mancante non è verificato.
- Marker `@contract` aggiunto nel docblock della classe.
