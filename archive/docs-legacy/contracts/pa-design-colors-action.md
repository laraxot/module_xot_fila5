---
title: "PaDesignColorsAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\PaDesignColorsAction"
qmd: "PaDesignColorsAction colori design system PA verde blu istituzionale palette Filament"
---

# PaDesignColorsAction

Espone i colori del design system PA e la palette Filament corrispondente. Codice: `app/Actions/PaDesignColorsAction.php` (classe a riga 23, `execute()` a riga 34).

## Input

- Nessuno.

## Output

- `execute()`: array di stringhe (primary, institutional_blue, danger, gray, info, success, warning).
- `filamentPalette()`: array di oggetti `Color` Filament.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `PA-COLORS-INV-1` | I colori primari e blu istituzionale vengono da `PaDesignColorEnum`. Test: `tests/Unit/MetatagDataTest.php` (menzione). | — (non dimostrato) |
| `PA-COLORS-INV-2` | La palette Filament usa `Color::hex` per primario e blu, e i colori Filament nominati per gli altri. Test: come sopra. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuno.

## Non fa

- Non valida gli esadecimali.
