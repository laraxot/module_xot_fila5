---
title: "HasOneAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Model\\Store\\HasOneAction"
qmd: "Store HasOneAction hasOne collega esistente id find save silenzioso no-op"
---

# HasOneAction

Collega un correlato esistente a una `hasOne`, solo nel caso di un id singolo. Codice: `app/Actions/Model/Store/HasOneAction.php` (classe a riga 19, `execute()` a riga 23).

## Input

- `Model $_model`: non usato.
- `RelationDTO $relationDTO`: `rows` deve essere `HasOne`; `data` è una lista di un solo id.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `STORE-HAS-ONE-INV-1` | Con `data` lista di un solo elemento: si cerca il correlato con `find(id)` e lo si salva sulla relazione. Se non esiste, lancia `\Exception`. Test: nessuno. | — (non dimostrato) |
| `STORE-HAS-ONE-INV-2` | In ogni altro caso (array associativo o più elementi) l'Action ritorna senza fare nulla e senza errore. Il ramo di creazione è commentato. Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nel primo caso un `UPDATE` della chiave sul correlato tramite `save()`. Nessuna transazione.

## Errori

- `\Exception` se l'id non corrisponde a nessun correlato.
- `InvalidArgumentException` se `rows` non è `HasOne`.

## Non fa

- Non crea il correlato quando i dati sono un array associativo: il payload viene scartato in silenzio. È un'incoerenza da verificare con il chiamante.
