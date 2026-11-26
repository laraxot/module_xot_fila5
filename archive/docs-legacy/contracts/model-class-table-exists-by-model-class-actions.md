---
title: "TableExistsByModelClassActions — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\ModelClass\\TableExistsByModelClassActions"
qmd: "TableExistsByModelClassActions tabella esiste modello Schema hasTable Sushi sushiRows"
---

# TableExistsByModelClassActions

Dice se la tabella del modello esiste nel database; per i modelli Sushi risponde sempre `true`. Codice: `app/Actions/ModelClass/TableExistsByModelClassActions.php`.

Nome duplicato: esiste anche `app/Actions/Model/TableExistsByModelClassActions.php`. Per questo il contract porta il prefisso del sottopercorso. Non è un `QueueableAction`.

## Input

- `string $modelClass`: FQCN del modello.

## Output

- `bool`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `MODEL-TABLE-INV-1` | Classe inesistente → `false`. Test citato (senza group): `tests/Unit/HasXotTableTest.php` (riferisce la classe) | — (non dimostrato) |
| `MODEL-TABLE-INV-2` | Modelli Sushi (trait `Sushi` o metodo `sushiRows`) → `true` senza interrogare il DB. Nessun test citato. | — (non dimostrato) |
| `MODEL-TABLE-INV-3` | Altrimenti è il risultato di `Schema::hasTable` sulla connessione del modello. Test citato (senza group): `tests/Unit/HasXotTableTest.php` (riferisce la classe) | — (non dimostrato) |

## Effetti collaterali

- Istanzia il modello con `app()`. Interroga lo schema del DB (sola lettura).

## Errori

- `Assert::isInstanceOf` lancia se la classe non è un modello Eloquent.

## Non fa

- Non mette in cache il risultato.
