---
title: "SystranTranslateAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Translation\\SystranTranslateAction"
qmd: "SystranTranslateAction stub traduzione Systran restituisce stringa vuota"
---

# SystranTranslateAction

Provider di traduzione Systran: implementazione stub che restituisce sempre stringa vuota.

Codice: `app/Actions/Translation/SystranTranslateAction.php:7-12`.

## Input

- `string $text`, `string $from`, `string $to`: ignorati.

## Output

`string`: sempre `''`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `TRANS-SYS-INV-1` | ritorna sempre stringa vuota, qualunque input (riga 11). Test: Nessun test dedicato. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

Nessuna eccezione.

## Non fa

- Non traduce: il testo viene perso senza errore. Stub da implementare o da rimuovere.
- Non invoca alcun servizio HTTP né legge chiavi API.
