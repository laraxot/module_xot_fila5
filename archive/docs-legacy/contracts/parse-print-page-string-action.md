---
title: "ParsePrintPageStringAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\ParsePrintPageStringAction"
qmd: "ParsePrintPageStringAction pagine stampa intervalli 1-4,6 array numeri parsing fromTo"
---

# ParsePrintPageStringAction

Converte una stringa di pagine come `1-4,6,7` in un elenco di numeri. Codice: `app/Actions/ParsePrintPageStringAction.php` (classe a riga 22, `execute()` a riga 32, statico).

## Input

- `string $str`: intervalli e numeri separati da virgola.

## Output

- `array<int>`: tutte le pagine, intervalli espansi.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `PARSE-PAGES-INV-1` | `"1-4,6,7,8,11-14"` produce `[1,2,3,4,6,7,8,11,12,13,14]`. Test: `tests/Unit/Actions/Parse/ParsePrintPageStringActionTest.php`. | `PARSE-PAGES-INV-1` |
| `PARSE-PAGES-INV-2` | Nessun numero trovato: `InvalidArgumentException`. Test: come sopra. | — (non dimostrato) |
| `PARSE-PAGES-INV-3` | Intervallo con fine minore dell'inizio: `Assert` fallisce in `fromTo`. Test: come sopra. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `InvalidArgumentException`, `Webmozart` per intervalli invertiti.

## Non fa

- Non deduplica e non ordina.
- Non limita l'ampiezza: `1-1000000` alloca tutto in memoria.
- Dubbio: spazi attorno al trattino (`1 - 4`) producono due numeri invece di un intervallo. Non verificato.
