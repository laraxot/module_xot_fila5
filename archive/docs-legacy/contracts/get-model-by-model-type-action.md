---
title: "GetModelByModelTypeAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\GetModelByModelTypeAction"
qmd: "GetModelByModelTypeAction modello da tipo morph map id find nuovo modello"
---

# GetModelByModelTypeAction

Restituisce un modello dal suo tipo morph e, se dato, dal suo id. Codice: `app/Actions/GetModelByModelTypeAction.php` (classe a riga 19, `execute()` a riga 26).

## Input

- `string $model_type`: tipo morph.
- `?string $model_id`: id opzionale.

## Output

- `Model`: il modello trovato, oppure una nuova istanza se l'id è `null`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `GET-MODEL-BY-TYPE-INV-1` | La classe è ricavata da `GetModelClassByModelTypeAction` e deve essere un sottotipo di `Model`. Test: `tests/Unit/Actions/GetModelActionsTest.php`. | — (non dimostrato) |
| `GET-MODEL-BY-TYPE-INV-2` | Con id: `find(id)`; senza id: nuova istanza. Test: come sopra. | `GET-MODEL-BY-TYPE-INV-2` |
| `GET-MODEL-BY-TYPE-INV-3` | Id non trovato: `\Exception` con messaggio generico. Test: non verificato. | — (non dimostrato) |

## Effetti collaterali

Una `SELECT` con id. Nessuna scrittura.

## Errori

- `Assert` per classe mancante o non modello; `\Exception` per id non trovato.

## Non fa

- Non usa `findOrFail`: il messaggio d'errore non nomina il tipo né l'id.
