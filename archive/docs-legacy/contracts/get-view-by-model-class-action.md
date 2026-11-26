---
title: "GetViewByModelClassAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\View\\GetViewByModelClassAction"
qmd: "GetViewByModelClassAction vista modello modulo antenata fallback ereditarietà BaseScheda snake suffisso pdf"
---

# GetViewByModelClassAction

Trova la vista di un modello nel modulo del modello o, se manca, nei moduli delle classi antenate. Codice: `app/Actions/View/GetViewByModelClassAction.php:11-66`.

## Input

- `string $model_class`: FQCN del modello (`execute`, riga 28).
- `string $suffix`: suffisso della vista, es. `.index.pdf` (riga 28).

## Output

- `string`: `{modulo minuscolo}::{modello snake}{suffix}` della prima vista esistente (riga 40-42).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `VIEW-BYMODEL-INV-1` | Il nome del modello è il `snake` del basename della classe. Codice: riga 30. Nessun test citato. | — (non dimostrato) |
| `VIEW-BYMODEL-INV-2` | Provo i moduli dal modello alle antenate (solo classi `Modules\`), deduplicati e nell'ordine di risalita. Ritorno la prima vista che esiste. Codice: righe 32-43, 53-66. Nessun test citato. | — (non dimostrato) |
| `VIEW-BYMODEL-INV-3` | Se nessuna vista esiste, lancia `\Exception` con l'elenco dei tentativi. Codice: riga 45. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno. Sola lettura delle viste.

## Errori

- `\Exception` quando nessuna vista esiste.

## Non fa

- Non cerca nel tema `pub_theme`.
- Non valida `$suffix`.
- Il docblock inizia con un segnaposto `---.` prima della descrizione reale: da pulire.
- Marker `@contract` aggiunto nel docblock della classe.
