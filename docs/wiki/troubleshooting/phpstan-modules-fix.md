---
title: "PHPStan Modules — stato e fix"
type: troubleshooting
sources: ["phpstan analyse Modules"]
confidence: verified
updated: 2026-06-30
tags: [phpstan, modules, bootstrap, comment, blog, media]
related:
  - concepts/phpstan-cluster-map-and-false-friends.md
  - concepts/phpstan-level10.md
---

# PHPStan su `Modules` — stato e fix

## Comando canonico

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules
```

Config: `phpstan.neon` livello **max**, baseline vuota, path `./Modules/`.

## Stato attuale (2026-06-30)

- `./vendor/bin/phpstan analyse Modules` → **0 errori**, exit 0
- Moduli analizzati: AI, Activity, Blog, Cms, Comment, Gdpr, Geo, Job, Lang, Media, Notify, Predict, Rating, Seo, Tenant, UI, User, Xot

## Blocker bootstrap risolti in questa sessione

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

- [phpstan-cluster-map-and-false-friends](../concepts/phpstan-cluster-map-and-false-friends.md)
- [safe-functions-rule](../../../../../docs/wiki/concepts/safe-functions-rule.md)
- [llm-wiki-qmd-workflow](../../../../../docs/project/llm-wiki-qmd-workflow.md)
