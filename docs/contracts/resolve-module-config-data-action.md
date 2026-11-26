---
title: "GetModuleConfigDataAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Config\\GetModuleConfigDataAction"
qmd: "GetModuleConfigDataAction classe modulo ConfigData Datas make Spatie Data dataClassFor null"
---

# GetModuleConfigDataAction

Dalla classe di un modello, Resource o pagina di un modulo, risolve la sua `{Modulo}ConfigData` e ne restituisce un'istanza. Codice: `app/Actions/Config/GetModuleConfigDataAction.php:18-58`.

## Input

- `string $class`: FQCN di una classe di un modulo (`execute`, riga 22). Per `dataClassFor`: stesso input (riga 39).

## Output

- `?Data`: istanza di `{Modulo}ConfigData`, oppure `null` (righe 22-32).
- `dataClassFor()` (statico): `class-string<Data>|null`, il FQCN della ConfigData (righe 39-58).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CONFIG-RESOLVE-INV-1` | Una classe che non inizia con `Modules\` non ha ConfigData: `null`. Codice: righe 43-45. Test: `tests/Unit/Actions/Config/GetModuleConfigDataActionTest.php:15,16` | `CONFIG-RESOLVE-INV-1` |
| `CONFIG-RESOLVE-INV-2` | Il nome atteso è `Modules\{Modulo}\Datas\{Modulo}ConfigData`: deve esistere ed estendere `Spatie\LaravelData\Data`, altrimenti `null`. Codice: righe 47-57. Test citato (senza group): `tests/Unit/Actions/Config/GetModuleConfigDataActionTest.php:24` | — (non dimostrato) |
| `CONFIG-RESOLVE-INV-3` | Se la classe ha il metodo `make`, lo chiama e ritorna il risultato solo se è un `Data`. Codice: righe 25-31. Test citato (senza group): `tests/Unit/Actions/Config/GetModuleConfigDataActionTest.php:16` | — (non dimostrato) |

## Effetti collaterali

Nessuno proprio. `make()` della ConfigData può leggere la configurazione del tenant: non verificato.

## Errori

- Nessuna eccezione propria. Le eccezioni di `make()` e dell'autoload si propagano.

## Non fa

- Non mette in cache il risultato.
- Non verifica che il file di configurazione del tenant esista.
- Marker `@contract` aggiunto nel docblock della classe.
