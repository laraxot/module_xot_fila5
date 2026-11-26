---
title: "GetProductsArrayDummyAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Dummy\\GetProductsArrayDummyAction"
qmd: "GetProductsArrayDummyAction dummyjson prodotti HTTP esterna campi selezionati dati di prova"
---

# GetProductsArrayDummyAction

Scarica prodotti di prova da `dummyjson.com` e ne tiene otto campi. Codice: `app/Actions/Dummy/GetProductsArrayDummyAction.php` (classe a riga 18, `execute()` a riga 30).

## Input

- Nessuno.

## Output

- `array<int, array<string, mixed>>`: prodotti con id, title, description, price, rating, brand, category, thumbnail.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `DUMMY-PRODUCTS-INV-1` | Chiama `GET https://dummyjson.com/products`. Test: `tests/Unit/Actions/Dummy/GetProductsArrayDummyActionTest.php`. | — (non dimostrato) |
| `DUMMY-PRODUCTS-INV-2` | La risposta deve contenere `products` come array, altrimenti asserzione. Test: come sopra. | — (non dimostrato) |
| `DUMMY-PRODUCTS-INV-3` | Ogni elemento non array diventa `[]`, non è scartato. Test: `tests/Unit/Actions/Dummy/GetProductsArrayDummyActionTest.php` («returns empty item when product entry is not an array»). | `DUMMY-PRODUCTS-INV-3` |

## Effetti collaterali

Una richiesta HTTP in uscita. Nessuna scrittura, nessuna cache.

## Errori

- `Webmozart` per risposta malformata; errori HTTP secondo il client.

## Non fa

- Non imposta un timeout esplicito: vale quello del client HTTP di Laravel.
- Non cachea né ritenta.
- Il docblock contiene un `@throws` con testo non pertinente.
