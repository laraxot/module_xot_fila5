---
title: "GetAllModelsByModuleNameAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\GetAllModelsByModuleNameAction"
qmd: "GetAllModelsByModuleNameAction modelli di un modulo app/Models snake reflection non abstract"
---

# GetAllModelsByModuleNameAction

Elenca le classi modello di un modulo leggendo `app/Models`. Codice: `app/Actions/Model/GetAllModelsByModuleNameAction.php`.

## Input

- `string $moduleName`: nome del modulo.

## Output

- `array<string, class-string>`: chiave = nome snake del file (senza `.php`), valore = FQCN `Modules\<Mod>\Models\<Nome>`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `GET-ALL-MODELS-MOD-INV-1` | Modulo inesistente o senza `app/Models`: ritorna `[]`. Prova: `execute()`. Test: `tests/Unit/ModuleServiceTest.php` (menzione). | — (non dimostrato) |
| `GET-ALL-MODELS-MOD-INV-2` | Sono letti solo i file `.php` direttamente nella cartella (non ricorsivo). Prova: `execute()`. Test: nessuno diretto. | — (non dimostrato) |
| `GET-ALL-MODELS-MOD-INV-3` | Le classi astratte sono escluse tramite `ReflectionClass::isAbstract()`. Prova: `execute()`. Test: `tests/Unit/ModuleServiceTest.php` («filters abstract classes out»). | `GET-ALL-MODELS-MOD-INV-3` |
| `GET-ALL-MODELS-MOD-INV-4` | Un file la cui classe non è caricabile viene saltato. Prova: `execute()`. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Lettura del filesystem e autoload delle classi via reflection. Nessuna scrittura.

## Errori

- Il `catch (\Exception)` vuoto ingoia gli errori di reflection senza log: un modello rotto sparisce dall'elenco in silenzio.

## Non fa

- Non verifica che la classe sia un Eloquent `Model`: un file non modello e non astratto viene incluso.
- Non ricorre nelle sottocartelle di `app/Models`.
