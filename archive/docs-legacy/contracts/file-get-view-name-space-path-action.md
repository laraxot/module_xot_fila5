---
title: "GetViewNameSpacePathAction (File) — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\File\\GetViewNameSpacePathAction"
qmd: "GetViewNameSpacePathAction File view hints namespace vista tema Themes percorso null finder"
---

# GetViewNameSpacePathAction (File)

Restituisce il percorso registrato per un namespace di viste, leggendo gli hint del view finder, o la cartella del tema. Codice: `app/Actions/File/GetViewNameSpacePathAction.php:11-57`.

Nota: esiste una classe omonima in `Actions/View`, con firma e semantica diverse. Il contratto di quella è in `view-get-view-name-space-path-action.md`.

## Input

- `string $ns`: namespace della vista, es. `xot` o un tema (`execute`, riga 21).

## Output

- `?string`: il primo percorso degli hint del namespace; altrimenti `base_path('Themes/{tema})` se `XotData` lo definisce; altrimenti `null` (righe 40-55).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `FILE-VIEWNS-INV-1` | Se il finder ha hint per `$ns` con almeno un percorso stringa, ritorna il primo. Codice: righe 25-46. Test citato (senza group): `tests/Unit/Actions/File/FileActionsTest.php:7,23-32` (sostituita con classe anonima nel test) | — (non dimostrato) |
| `FILE-VIEWNS-INV-2` | Altrimenti, se `XotData->{$ns}` è una stringa, ritorna `base_path('Themes/{tema})`. Codice: righe 49-55. Nessun test citato. | — (non dimostrato) |
| `FILE-VIEWNS-INV-3` | Altrimenti ritorna `null`. Codice: riga 52. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno. Sola lettura.

## Errori

- Nessuna eccezione: ogni passo è difensivo con `is_*` e `method_exists`.

## Non fa

- Non verifica che il percorso esista.
- Il chiamante `File\ViewPathAction` non gestisce il `null` (vedi quella Action).
- Marker `@contract` aggiunto nel docblock della classe.
