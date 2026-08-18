---
title: "GetResourceClassNameByModelClassAction — esiste, non è cablata in XotBaseResource"
module: "Xot"
type: concept
status: approved
tags: [xot, filament, actions, resource, form, table]
created: 2026-08-18
updated: 2026-08-18
qmd: "GetResourceClassNameByModelClassAction resource canonica per model getFormClass getTableClass fallback filament panel"
related:
  - "./actions-over-services.md"
  - "./filament/xotbaseresource.md"
  - "./stories/5.7.phpstan-modules-green.story.md"
---

# `GetResourceClassNameByModelClassAction` — esiste, non è cablata

> Serve quando una Resource di un modulo consumatore riusa un model di un altro modulo:
> `static::class` non contiene `{Model}Form`. L'Action risolve la Resource canonica del
> pannello. **Oggi `getFormClass()` / `getTableClass()` non la chiamano**: se la nested
> manca, `LogicException`. Ri-cablare è una scelta di prodotto, non un fatto del codice.

## Perché esiste

`XotBaseResource` costruisce due nomi per convenzione:

```php
static::class.'\Schemas\\'.class_basename(static::getModel()).'Form'
static::class.'\Tables\\'.Str::plural(class_basename(static::getModel())).'Table'
```

La convenzione regge finché Resource, Form e Table stanno nello stesso modulo. Non regge
per le Resource che estendono una `Base{Model}Resource` di un altro modulo: lì
`static::class` è la sottoclasse del modulo consumatore, mentre `Schemas\{Model}Form`
vive sotto la Resource del modulo proprietario. Senza fallback la classe non esiste e
`getFormClass()` fallirebbe pur essendoci una Form valida.

## Contratto

| Voce | Valore |
|---|---|
| FQCN | `Modules\Xot\Actions\Filament\GetResourceClassNameByModelClassAction` |
| Input | `class-string<Model>` |
| Output | `class-string<XotBaseResource>` |
| Errore | `LogicException` se nessuna Resource del pannello corrente dichiara quel model |
| Pattern | Spatie `QueueableAction`, come le altre Action del modulo |

Sotto il cofano usa `Filament::getModelResource()`, che scorre le Resource registrate nel
pannello corrente e confronta `Resource::getModel()`. Nessuna scansione di filesystem,
nessuna cache da invalidare: la risposta è quella che il pannello conosce davvero.

## Uso

```php
$resourceClass = app(GetResourceClassNameByModelClassAction::class)->execute(static::getModel());
$formClass = $resourceClass.'\Schemas\\'.class_basename(static::getModel()).'Form';
```

**Call site attuale: nessuno.** `getFormClass()` / `getTableClass()` (verificato su `XotBaseResource.php`) se la classe nested manca sollevano `LogicException`. L'import dell'Action è stato rimosso dal Resource perché era morto: documentare un fallback non cablato è fiction.

L'Action resta nel modulo per un eventuale ripristino del fallback *panel-aware* (Performance/IR che riusano model Ptv). Non usarla fuori da un pannello Filament: `Filament::getModelResource()` senza Resource registrate → `LogicException`.

## Vincoli

- **Dipende dal pannello.** Fuori da un contesto Filament (comando artisan, job) il
  pannello corrente potrebbe non avere Resource registrate: l'Action solleva
  `LogicException` invece di restituire un nome inventato.
- **Non fa da autoloader.** Restituisce la Resource, non la Form: la composizione del
  suffisso `\Schemas\…Form` resta nel chiamante, che è l'unico a sapere se sta cercando
  una Form o una Table.

## Storia

L'Action è nata per coprire un call site in `XotBaseResource` che poi è stato rimosso
(nessun soft-skip: nested obbligatoria). Resta nel modulo per un eventuale ripristino
del fallback panel-aware (Performance/IR su model Ptv). Storia PHPStan: senza la classe,
6 errori `class.notFound` / `binaryOp.invalid`.

## Riferimenti

- [Contratto XotBaseResource](./filament/xotbaseresource.md)
- [Story 5.7 — PHPStan Modules green](./stories/5.7.phpstan-modules-green.story.md)
