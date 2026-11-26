---
title: "SafeAttributeCastAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Cast\\SafeAttributeCastAction"
qmd: "SafeAttributeCastAction attributo modello getAttribute cast tipato default null validator"
---

# SafeAttributeCastAction

Legge gli attributi di un modello Eloquent con cast tipati e default. Codice: `app/Actions/Cast/SafeAttributeCastAction.php`.

## Input

- `Model $model`, `string $attribute` (non vuoto), e per i getter tipati il `$default`.
- `getTypedAttribute`: `$type` in `string|int|float|bool|array`.

## Output

- `hasAttribute` / `hasNonEmptyAttribute` / `hasAttributeValue`: `bool`.
- `getStringAttribute`, `getIntAttribute`, `getFloatAttribute`, `getBooleanAttribute`, `getArrayAttribute`: valore tipato; null produce il default.
- `getTypedAttribute`: valore del tipo richiesto.
- `getValidatedAttribute`: valore tipato, o `$default` se il validator restituisce falso.
- Statici: `hasNonEmpty`, `getString`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `CAST-ATTR-INV-1` | Un attributo null produce il default del getter. Test citato (senza group): `tests/Unit/Actions/Cast/SafeAttributeCastActionTest.php` (riferisce la classe) | — (non dimostrato) |
| `CAST-ATTR-INV-2` | `hasAttribute` è `true` solo se il valore non è null; `hasNonEmptyAttribute` esclude anche la stringa vuota. Test: `tests/Unit/Actions/Cast/SafeAttributeCastActionTest.php` | `CAST-ATTR-INV-2` |
| `CAST-ATTR-INV-3` | Un tipo fuori da `string Test citato (senza group): int | — (non dimostrato) |
| `CAST-ATTR-INV-4` | Il nome attributo vuoto lancia eccezione da `Assert`. Nessun test citato. | — (non dimostrato) |

## Effetti collaterali

Nessuno. Legge con `getAttribute` (che attiva accessor e cast del modello).

## Errori

- `Webmozart\Assert` lancia per nome attributo vuoto o tipo non ammesso.
- `\InvalidArgumentException` per tipo non supportato.

## Non fa

- Non verifica che la colonna esista.
- Quasi identica a `SafeEloquentCastAction`: duplicazione da unificare (segnalazione, non modificata).
