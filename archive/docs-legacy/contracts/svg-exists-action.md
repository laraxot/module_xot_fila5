---
title: "SvgExistsAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\File\\SvgExistsAction"
qmd: "SvgExistsAction verifica esistenza icona SVG BladeUI Icons heroicon set registrato"
---

# SvgExistsAction

Verifica se un'icona SVG esiste nei set registrati di BladeUI Icons. Codice: `app/Actions/File/SvgExistsAction.php:15-39`.

## Input

- `string $svgName`: nome dell'icona, es. `heroicon-o-user` (`execute`, riga 23).

## Output

- `bool`: `true` se l'icona esiste (riga 37), `false` altrimenti.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `FILE-SVG-INV-1` | Stringa vuota: `false` senza interrogare il factory. Codice: righe 25-27. Test citato (senza group): `tests/Unit/Actions/File/SvgExistsActionTest.php:14` | — (non dimostrato) |
| `FILE-SVG-INV-2` | `IconFactory::svg($name)` senza eccezione: `true`. Un'eccezione `\Exception`: `false`. Codice: righe 30-37. Test citato (senza group): `tests/Unit/Actions/File/SvgExistsActionTest.php:7` | — (non dimostrato) |

## Effetti collaterali

Nessuno. Lettura del registro delle icone.

## Errori

- Nessuna eccezione: ogni errore diventa `false`.

## Non fa

- Non distingue il motivo del `false` (set mancante o nome errato).
- Marker `@contract` aggiunto nel docblock della classe.
