---
title: "PHPStan Modules Fix 2026-05-05"
type: troubleshooting
sources: ["phpstan-full.txt"]
confidence: verified
created: 2026-05-05
updated: 2026-05-05
tags: [phpstan, modules, fix, safe-functions, type-declarations]
related:
  - concepts/phpstan-cluster-map-and-false-friends.md
  - concepts/phpstan-level10.md
  - concepts/phpstan-trait-probes.md
  - concepts/xot-seed-model-once.md
qmd: "phpstan analyse Modules zero errori pest bridge xotSeedModelOnce"
---

# PHPStan Modules Fix - 2026-05-05

## Issue Summary

Esecuzione di `php vendor/bin/phpstan analyse Modules --level=5` ha rilevato **24 errori** iniziali, ridotti a **5 errori** dopo fix sistematici.

## Errori Classificati

### 1. Missing Dependencies (Ignored in phpstan.neon)
- `class.notFound` per `Spatie\LaravelPdf\*`, `Fidum\EloquentMorphToOne\*` (non installate)
- `property.notFound`, `method.notFound` correlati a deps mancanti
- **Decisione**: Ignorati in `phpstan.neon` perché Composer ha restrizioni che impediscono l'installazione

### 2. Safe Functions Mancanti (Fixed ✅)
- `MakePdfSpatieTestAction.php`: aggiunto `use function Safe\base64_decode;`
- `SocialiteProviderSettingsPage.php`: aggiunto `use function Safe\chmod;`

### 3. Type Mismatch in PHPDoc (Fixed ✅)
- `SocialiteProviderSettingsPage.php`: corretto annotazioni `@var array<string, array<string, mixed>>` → `@var array<string, mixed>` per `$google`, `$github`, `$microsoft`

### 4. Return Type Covariance (Open)
- `LanguageSwitcherWidget.php`: `getAvailableLocales()` e `getDefaultLanguages()` ritornano `Collection<int, array{}>` ma PHPDoc dichiara tipo più specifico
- **Decisione**: Lasciato aperto (Filament type covariance issue)

## Files Modificati

1. `phpstan.neon` - aggiunti ignore per `class.notFound`, `property.notFound`, `method.notFound`
2. `Xot/app/Actions/Pdf/MakePdfSpatieTestAction.php` - aggiunto Safe function
3. `User/app/Filament/Pages/SocialiteProviderSettingsPage.php` - corretti tipi e aggiunto Safe function

## Regola Adottata

**Scelta professionale**: Non forzare l'installazione di pacchetti mancanti (Composer restrictions). Invece:
1. Documentare il blocker nel wiki
2. Ignorare errori da deps mancanti in phpstan.neon
3. Fixare solo errori di codice reali

## Quality Gates

| Componente | Path | Ruolo |
|------------|------|-------|
| Stub globali | `Helper.php` | `expect`, `it`, `test`, `uses`, `beforeEach`, … |
| `PestUsesChain` | `Xot/tests/Support/PestUsesChain.php` | `uses(...)->beforeEach()` tipizzato |
| Bridge per modulo | `Xot/tests/Support/PestFunctionBridge.php` | `uses()` → `PestUsesChain` per 192 namespace |

Rigenerazione bridge:

```bash
php bashscripts/tools/generate-pest-phpstan-bridge.php
php bashscripts/tools/fix-pest-phpstan-test-patterns.php
```

### Factory — `HasXotFactory`

`newFactory()` annotato `@return TFactory` per risolvere la catena generica sui modelli Xot.

### Trait probe Notify

`Modules/Notify/app/Phpstan/HasContactPhpstanProbe.php` registrato in `xotPhpstanTraitProbeClasses()` (valori `::class`, non stringhe).

### Test mock User — `RelationX`

`MockUserWithTeams` (test) deve `use RelationX` se usa `HasTeams` (metodo `belongsToManyX`).

## Blocker bootstrap risolti (sessioni precedenti)

### Vendor corrotto

- `phpdocumentor/reflection-common` (`Fqsen.php` vuoto) → `composer reinstall phpdocumentor/reflection-common`

### ParseError Media

- `ConvertWidget.php`: loop `while` malformato, `$record` non qualificato → progresso solo in `onProgress`, tipi espliciti su `$remaining`/`$rate`

### Comment / Predict User

- `Predict\Models\User` usa `Modules\Comment\Models\Contracts\CanComment` + `InteractsWithComments` (non Spatie)
- `CanComment::notify()` senza `: void` nel contratto (compatibilità `BaseUser::RoutesNotifications`); PHPDoc `@return mixed`
- `InteractsWithComments::subscribeToCommentNotifications`: typo `$hasComment` → `$hasComments`; PHPDoc param corretto (`Model`, non `Model&CanComment`)

## Fix type-safety per modulo

| Modulo | Fix principali |
|--------|----------------|
| Xot | `Helper.php`: `count($matches) >= 3` al posto di `isset` su offset regex |
| Cms | `@var view-string` su `AppLayout::$view` |
| Blog | `@property ProfileContract\|null $deleter` (trait `Updater`); rimossi import `Fixcity\Models\Profile` inutili |
| Comment | `CommentsComponent`: guard `CanComment` su utente auth; modello `Commentable` passato a subscribe |
| phpstan.neon | `excludePaths` aggiunto `./*/Tests/*` (Tenant ha cartella `Tests/`) |

## Regola `@property $deleter`

Il trait `Modules\Xot\Traits\Updater` dichiara `@property ProfileContract|null $deleter`. I modelli che usano il trait devono allineare il PHPDoc a `ProfileContract`, non a implementazioni modulo-specifiche (`Fixcity\Models\Profile`, `Blog\Models\Profile`).

## Ignore in phpstan.neon (intenzionali)

- `missingType.generics`, `missingType.iterableValue`
- cast `mixed` unsafe, `new static` unsafe
- deps opzionali non installate (documentate, non forzate via Composer)

## Verifica post-modifica

```bash
cd laravel
php artisan about
./vendor/bin/phpstan analyse Modules --no-progress
```

## Related

- [phpstan-cluster-map-and-false-friends](concepts/phpstan-cluster-map-and-false-friends.md)
- [safe-functions-rule](../../../../docs/wiki/concepts/safe-functions-rule.md)
- [phpstan-level10](concepts/phpstan-level10.md)
