---
title: "PHPStan Stub Ciclo — Ragionamento alla Radice"
module: Xot
bmad: true
second_brain: true
status: documentato
---
# Ragionamento (BMAD + Second Brain)

## Radice del problema (non 21 errori separati)
Un solo errore sistemico: gli stub `Tests/Fixtures/Stubs/*.php` creati senza firmare i metodi con i parametri del parent (`XotBaseModel`, `XotBasePage`, `XotBaseManageRelatedRecords`).

## Cosa doveva fare (scopo ricostruito)
- Fornire PHPDoc/compatibilità PHPStan v11 per classi Filament v4 non pubblicate.
- I test (`tests/Unit/*`) richiedono queste firme per compilare.
- Senza le firme esatte → `parameter.missing`, `method.childReturnType`, `class.nameCase`.

## Correzioni applicate
- `guessPivotFullClass()` → aggiunto `string $class`
- `belongsToManyX()` → `BelongsToMany<TRelatedModel...>`
- `morphToManyX()` → param 8 `bool $inverse`, param 9 `bool $inverse` (coerente)
- `getNavigationGroup()` → `string` (non `string|null`)
- `getViewTest()` → `string`
- `tests` → `Tests` nel namespace dei file stub

## Lezioni (per non ripetere)
1. Creare stub sempre con `extends` o `implements` del parent + copiare la firma intera.
2. Non usare `@phpstan-ignore`: correggere alla fonte.
3. Cartella `Tests/` solo per stub fixture; `tests/` per test running.
4. File `.md` in docs: **nessun timestamp nel nome**.
