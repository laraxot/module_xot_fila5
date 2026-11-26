---
title: "GetPronounceablePasswordAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\String\\GetPronounceablePasswordAction"
qmd: "GetPronounceablePasswordAction password pronunciabile generazione casuale random_int lunghezza"
---

# GetPronounceablePasswordAction

Genera una password pronunciabile con lettere, una cifra e un simbolo, con sorgente CSPRNG. Codice: `app/Actions/String/GetPronounceablePasswordAction.php`.

## Input

- `int $length = 12`: lunghezza richiesta; il valore effettivo è `max(5, $length)`.

## Output

- `string` di lunghezza `max(5, $length)`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `PWD-PRON-INV-1` | La lunghezza del risultato è `max(5, $length)`. Test: `tests/Unit/Actions/String/GetPronounceablePasswordActionTest.php` | `PWD-PRON-INV-1` |
| `PWD-PRON-INV-2` | Il risultato contiene almeno una lettera maiuscola, una cifra e un simbolo tra `!#*-_=+:?`. Test: `tests/Unit/Actions/String/GetPronounceablePasswordActionTest.php` | `PWD-PRON-INV-2` |
| `PWD-PRON-INV-3` | Le lettere alternano consonante e vocale nella generazione iniziale; poi il risultato viene mescolato. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno. Nessuna scrittura.

## Errori

- `random_int` può lanciare eccezione se la sorgente di entropia non è disponibile.

## Non fa

- Non applica una politica di complessità oltre le tre classi indicate.
- Non verifica unicità né salva la password.
- Non limita la lunghezza massima.
