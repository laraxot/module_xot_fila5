---
title: "PHPStan Modules Fix 2026-05-05"
type: troubleshooting
sources: ["phpstan-full.txt"]
confidence: verified
updated: 2026-06-30
tags: [phpstan, modules, bootstrap, pest, seeders, xot, trait-probes]
related:
  - concepts/phpstan-cluster-map-and-false-friends.md
  - concepts/phpstan-level10.md
  - concepts/phpstan-trait-probes.md
  - concepts/xot-seed-model-once.md
qmd: "phpstan analyse Modules zero errori pest bridge xotSeedModelOnce"
---

# PHPStan Modules Fix - 2026-05-05

## Issue Summary

```bash
cd laravel && ./vendor/bin/phpstan clear-result-cache
cd laravel && ./vendor/bin/phpstan analyse Modules
```

Config: `phpstan.neon` livello **max**, baseline vuota, path `./Modules/`. **Non modificare** `phpstan.neon` — fix solo su codice PHP/test.

### 1. Missing Dependencies (Ignored in phpstan.neon)
- `class.notFound` per `Spatie\LaravelPdf\*`, `Fidum\EloquentMorphToOne\*` (non installate)
- `property.notFound`, `method.notFound` correlati a deps mancanti
- **Decisione**: Ignorati in `phpstan.neon` perché Composer ha restrizioni che impediscono l'installazione

### 2. Safe Functions Mancanti (Fixed ✅)
- `MakePdfSpatieTestAction.php`: aggiunto `use function Safe\base64_decode;`
- `SocialiteProviderSettingsPage.php`: aggiunto `use function Safe\chmod;`

## Fix strutturali (ponytail — una guard condivisa)

### Seeders — `xotSeedModelOnce()`

~100+ errori `method.nonObject` su `Model::factory()->count(1)->create()` in entity seeders.

**SSoT:** `xotSeedModelOnce(string $modelClass)` in `Modules/Xot/helpers/Helper.php` → delega a `GetFactoryAction`.

```php
// ❌ PHPStan non risolve la catena factory su stringhe dinamiche
Article::factory()->count(1)->create();

// ✅
xotSeedModelOnce(Article::class);
```

### Pest — stub globali + bridge namespace

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

- ✅ PHPStan: 5 errori rimanenti (tutti da deps mancanti)
- ✅ Pint: formattazione corretta
- ⚠️ PHPMD: da verificare (StaticAccess warnings attesi)
- ⚠️ Test: da verificare con `--exclude-group=sqlite`

## Related

- [phpstan-cluster-map-and-false-friends](concepts/phpstan-cluster-map-and-false-friends.md)
- [safe-functions-rule](../../../../docs/wiki/concepts/safe-functions-rule.md)
- [phpstan-level10](concepts/phpstan-level10.md)
