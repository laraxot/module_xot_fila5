---
title: "GetYearOptionsAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Config\\GetYearOptionsAction"
qmd: "GetYearOptionsAction opzioni anno filtro select YearsConfigContract getAnniOptions fallback modulo"
---

# GetYearOptionsAction

Restituisce le opzioni anno per un filtro o select condiviso, secondo il modulo a cui appartiene la classe chiamante. Codice: `app/Actions/Config/GetYearOptionsAction.php:17-39`.

## Input

- `string $class`: classe da cui risolvere la configurazione del modulo (`execute`, riga 25).
- `list<int> $fallback`: elenco storico del componente (riga 25).

## Output

- `array<int, string>`: anno => etichetta, dal più recente (righe 27-38).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CONFIG-ANNI-INV-1` | Se la `ConfigData` del modulo implementa `YearsConfigContract`, ritorna `getAnniOptions()` di quella. Codice: righe 27-30. Test citato (senza group): `tests/Unit/Actions/Config/GetModuleConfigDataActionTest.php:29` | — (non dimostrato) |
| `CONFIG-ANNI-INV-2` | Altrimenti ritorna il fallback in ordine inverso, con etichetta uguale all'anno come stringa. Codice: righe 32-37. Test: come sopra | `CONFIG-ANNI-INV-2` |

## Effetti collaterali

Nessuno. Lettura di configurazione.

## Errori

- Nessuna eccezione propria. Gli errori di `GetModuleConfigDataAction` si propagano.

## Non fa

- Non ordina il risultato di `getAnniOptions()`: l'ordine è quello del contratto.
- Non valida `$fallback`.
- Marker `@contract` aggiunto nel docblock della classe.
