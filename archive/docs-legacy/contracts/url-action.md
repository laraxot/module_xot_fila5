---
title: "UrlAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\UrlAction"
qmd: "UrlAction validazione URL filter_var FILTER_VALIDATE_URL singleton"
---

# UrlAction

Verifica se una stringa è un URL sintatticamente valido. Codice: `app/Actions/UrlAction.php` (classe a riga 16, `checkValidUrl()` a riga 39 circa).

## Input

- `string $url`.

## Output

- `bool`: `true` se `filter_var(FILTER_VALIDATE_URL)` accetta la stringa.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `URL-INV-1` | Il risultato è `filter_var($url, FILTER_VALIDATE_URL) !== false`. Test: nessuno diretto (`tests/Unit` cita la classe in più punti: non verificato). | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuno.

## Non fa

- Non controlla lo schema né il dominio: non è una protezione SSRF.
- `execute()` è vuoto; il singleton `getInstance()/make()` non ha stato.
