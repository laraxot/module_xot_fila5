---
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
title: "PHPStan Modules — stato e fix"
type: troubleshooting
sources: ["phpstan analyse Modules"]
confidence: verified
<<<<<<< HEAD
<<<<<<< .merge_file_9Kq0ey
updated: 2026-07-24
=======
updated: 2026-09-23
=======
updated: 2026-09-23
=======
updated: 2026-06-30
>>>>>>> .merge_file_gUKpDr
>>>>>>> laraxot/dev
tags: [phpstan, modules, bootstrap, pest, seeders, xot, trait-probes]
related:
  - concepts/phpstan-cluster-map-and-false-friends.md
  - concepts/phpstan-level10.md
  - concepts/phpstan-trait-probes.md
  - concepts/xot-seed-model-once.md
<<<<<<< HEAD
  - concepts/phpstan-pest-bridge-discipline.md
=======
>>>>>>> laraxot/dev
qmd: "phpstan analyse Modules zero errori pest bridge xotSeedModelOnce"
---

# PHPStan su `Modules` — stato e fix

<<<<<<< HEAD
<<<<<<< .merge_file_9Kq0ey
## Comando canonico
=======
## Comando che certifica
>>>>>>> .merge_file_gUKpDr

```bash
cd laravel
php -d memory_limit=-1 ./vendor/bin/phpstan analyse --no-progress --memory-limit=-1
```

**Senza path CLI.** Un argomento `Modules` sovrascrive `parameters.paths` e spegne
`tomasvotruba/type-coverage`. Per lavorare su un modulo: `analyse Modules/<Nome>`.
Per dichiarare zero: i due conteggi (`analyse` e `analyse Modules`) devono coincidere
e `totals.file_errors` nel JSON deve essere 0.

`clear-result-cache` **non** accetta `--no-progress`.

Config: `laravel/phpstan.neon` livello **max**, baseline vuota. **Non passare mai `--level` da CLI** e **non modificare** `phpstan.neon` — fix solo su codice PHP/test.

## Stato attuale (2026-09-23)

<<<<<<< .merge_file_9Kq0ey
- `./vendor/bin/phpstan analyse Modules` → **0 errori**, exit 0, stabile anche dopo `clear-result-cache` (swarm 90→0 multi-agente).
- Contesto: `composer run go` (`composer update -W`) ha portato `laravel/framework` **v12→v13.21.1**, `pestphp/pest` **v3→v4.7.5**, `phpunit/phpunit` **v11→v12.5.30**. La maggior parte dei 90 errori era fallout diretto di questo bump major, non bug applicativi.
=======
## Comando che certifica

```bash
cd laravel
php -d memory_limit=-1 ./vendor/bin/phpstan analyse --no-progress --memory-limit=-1
```

**Senza path CLI.** Un argomento `Modules` sovrascrive `parameters.paths` e spegne
`tomasvotruba/type-coverage`. Per lavorare su un modulo: `analyse Modules/<Nome>`.
Per dichiarare zero: i due conteggi (`analyse` e `analyse Modules`) devono coincidere
e `totals.file_errors` nel JSON deve essere 0.

`clear-result-cache` **non** accetta `--no-progress`.

Config: `laravel/phpstan.neon` livello **max**, baseline vuota. **Non passare mai `--level` da CLI** e **non modificare** `phpstan.neon` — fix solo su codice PHP/test.

## Stato attuale (2026-09-23)

=======
>>>>>>> .merge_file_gUKpDr
- `php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules --memory-limit=2G` (cache `/tmp/phpstan` svuotata) → **[OK] No errors**, 9421 file, exit 0. Story [5.224](../../bmad/stories/5.224-phpstan-analyse-modules.story.md).
- `phpstan.neon` immutato. Pest skip su `10.100.200.15`.
- Drift chiuso il 2026-09-21: story [18.59](../../stories/18.59.phpstan-repo-wide-zero-2026-09-21.story.md) (23 errori su 4 file → 0).
- SSoT modulo: [phpstan-status.md](../../phpstan-status.md).

## Storico (2026-07, bump framework)

`composer run go` aveva portato `laravel/framework` v12→v13.21.1, Pest v3→v4.7.5. La maggior parte dei 90 errori di quella settimana era fallout del bump, non bug applicativi.
<<<<<<< .merge_file_9Kq0ey
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_gUKpDr
- Modulo `Comment` **rimosso interamente** dal codebase (nessun file `namespace Modules\Comment\...` residuo). Il bridge Pest generato conteneva ancora 5 blocchi con riferimenti stale a `Modules\Comment\Tests(\Support)?\TestCase` → 25 errori `class.notFound` (28% del totale) risolti con una semplice rigenerazione (vedi sotto).
- Coordinamento multi-agente reale osservato: un secondo agente (`agent-composer`, stesso periodo, lock su `docs/chat/handoff-phpstan-modules.md` e su singoli file test) ha corretto in parallelo AI, Activity, Notify, Tenant, UI, `Xot/tests/Unit/Actions/Blade/RegisterBladeComponentsActionTest.php`, e ha consolidato `Modules/Media/tests/` da doppioni case-sensitive (`tests/unit/...` minuscolo vs `tests/Unit/...` PascalCase) in un unico albero corretto — vedi [no-case-only-variations](../../../../../bashscripts/ai/.agents/rules/no-case-only-variations.md).

## ⚠️ Trappola: `ide-helper:models --write-mixin` NON usare in questo repo

Durante la sessione, `php artisan ide-helper:models --nowrite --write-mixin` ha **scritto comunque** nei 142 file reali dei modelli applicativi (Employee, User, Xot e altri moduli), nonostante `--nowrite`, perché `-M/--write-mixin` **implica** la scrittura del tag `@mixin IdeHelper{Model}` nei file modello reali (il flag descrive esplicitamente "Write models to [file] **and adds @mixin to each model**"). `--nowrite` e `--write-mixin` sono in conflitto logico: non combinarli mai.

```bash
# ❌ MAI — scrive nei modelli reali anche con --nowrite
php artisan ide-helper:models --nowrite --write-mixin

# ✅ Solo rigenerazione del companion file, nessun file reale toccato
php artisan ide-helper:models --nowrite
```

Verificare sempre con `git status --short Modules/*/app/Models/*.php` dopo qualunque comando `ide-helper:models` prima di procedere.
=======
## Comando canonico

```bash
cd laravel && ./vendor/bin/phpstan clear-result-cache
cd laravel && ./vendor/bin/phpstan analyse Modules
```

Config: `phpstan.neon` livello **max**, baseline vuota, path `./Modules/`. **Non modificare** `phpstan.neon` — fix solo su codice PHP/test.

## Stato attuale (2026-06-30)

- `./vendor/bin/phpstan analyse Modules` → **0 errori**, exit 0
- Moduli analizzati: AI, Activity, Blog, Cms, Comment, Gdpr, Geo, Job, Lang, Media, Notify, Predict, Rating, Seo, Tenant, UI, User, Xot
>>>>>>> laraxot/dev

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

<<<<<<< HEAD
### Pest — bridge namespace (`PestFunctionBridge.php`)
=======
### Pest — stub globali + bridge namespace
>>>>>>> laraxot/dev

| Componente | Path | Ruolo |
|------------|------|-------|
| Stub globali | `Helper.php` | `expect`, `it`, `test`, `uses`, `beforeEach`, … |
| `PestUsesChain` | `Xot/tests/Support/PestUsesChain.php` | `uses(...)->beforeEach()` tipizzato |
<<<<<<< HEAD
| Bridge per modulo | `Xot/tests/Support/PestFunctionBridge.php` | stub `expect/test/it/describe/beforeEach/afterEach/uses/skip` per **213** namespace `Modules\{X}\Tests(\...)?` |

Il bridge è **generato meccanicamente** da uno scanner che cerca `^namespace ...;` in ogni file sotto `*/tests/*` di ogni modulo. Se un modulo viene rimosso senza rigenerare il bridge, restano blocchi stale con `@param-closure-this \Modules\{Removed}\Tests\TestCase` non risolvibile → `class.notFound` su ogni funzione stub di quel blocco.

Rigenerazione bridge (self-formatting da 2026-07-24: il generatore lancia `pint` sull'output subito dopo averlo scritto, quindi non serve un fixup manuale):

```bash
php bashscripts/tools/generate-pest-phpstan-bridge.php
```

Verifica dopo rigenerazione:

```bash
cd laravel
php -l Modules/Xot/tests/Support/PestFunctionBridge.php
./vendor/bin/pint --test Modules/Xot/tests/Support/PestFunctionBridge.php
./vendor/bin/phpstan analyse Modules/Xot/tests/Support/PestFunctionBridge.php --no-progress
=======
| Bridge per modulo | `Xot/tests/Support/PestFunctionBridge.php` | `uses()` → `PestUsesChain` per 192 namespace |

Rigenerazione bridge:

```bash
php bashscripts/tools/generate-pest-phpstan-bridge.php
php bashscripts/tools/fix-pest-phpstan-test-patterns.php
>>>>>>> laraxot/dev
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

<<<<<<< HEAD
=======
### Comment / Predict User

- `Predict\Models\User` usa `Modules\Comment\Models\Contracts\CanComment` + `InteractsWithComments` (non Spatie)
- `CanComment::notify()` senza `: void` nel contratto (compatibilità `BaseUser::RoutesNotifications`); PHPDoc `@return mixed`
- `InteractsWithComments::subscribeToCommentNotifications`: typo `$hasComment` → `$hasComments`; PHPDoc param corretto (`Model`, non `Model&CanComment`)

>>>>>>> laraxot/dev
## Fix type-safety per modulo

| Modulo | Fix principali |
|--------|----------------|
<<<<<<< HEAD
| Xot | `Helper.php`: `count($matches) >= 3` al posto di `isset` su offset regex; bridge Pest rigenerato (Comment stale) |
| Cms | `@var view-string` su `AppLayout::$view` |
| Employee | `Admin.php` — self-mixin `@mixin IdeHelperAdmin` orfano rimosso (nessuna classe `IdeHelperAdmin` reale esiste in nessun file: `_ide_helper_models.php` è escluso da `phpstan.neon` e non definisce comunque quella classe) |
| Media | `tests/unit/**` (minuscolo, doppione) rimosso a favore di `tests/Unit/**` (PascalCase) |
| phpstan.neon | `excludePaths` include `./*/Tests/*` (Tenant ha cartella `Tests/`) |

## Regola `@property $deleter`

Il trait `Modules\Xot\Traits\Updater` dichiara `@property ProfileContract|null $deleter`. I modelli che usano il trait devono allineare il PHPDoc a `ProfileContract`, non a implementazioni modulo-specifiche.
=======
| Xot | `Helper.php`: `count($matches) >= 3` al posto di `isset` su offset regex |
| Cms | `@var view-string` su `AppLayout::$view` |
| Blog | `@property ProfileContract\|null $deleter` (trait `Updater`); rimossi import `Fixcity\Models\Profile` inutili |
| Comment | `CommentsComponent`: guard `CanComment` su utente auth; modello `Commentable` passato a subscribe |
| phpstan.neon | `excludePaths` aggiunto `./*/Tests/*` (Tenant ha cartella `Tests/`) |

## Regola `@property $deleter`

Il trait `Modules\Xot\Traits\Updater` dichiara `@property ProfileContract|null $deleter`. I modelli che usano il trait devono allineare il PHPDoc a `ProfileContract`, non a implementazioni modulo-specifiche (`Fixcity\Models\Profile`, `Blog\Models\Profile`).
>>>>>>> laraxot/dev

## Ignore in phpstan.neon (intenzionali)

- `missingType.generics`, `missingType.iterableValue`
- cast `mixed` unsafe, `new static` unsafe
- deps opzionali non installate (documentate, non forzate via Composer)

<<<<<<< HEAD
## Follow-up aperto (non PHPStan, trovato durante la verifica post-fix)

`./vendor/bin/pest Modules/Xot` (intero modulo, non il solo file toccato) riporta **68 failed / 28 risky** su `HasCommonScopesTest.php` e classi limitrofe: `LogicException: The [bootIfNotBooted] method may not be called on model [Modules\Xot\Tests\Fixtures\Models\HasCommonScopesProbe] while it is being booted`. File non toccato da questa sessione (`git log` mostra un solo commit storico), quindi **preesistente**, non introdotto dal fix PHPStan. Ipotesi principale: fallout Eloquent del bump Laravel v12→v13 sul boot ricorsivo dei trait-probe model. Da investigare separatamente (task distinto, fuori scope da "phpstan analyse Modules").

=======
>>>>>>> laraxot/dev
## Verifica post-modifica

```bash
cd laravel
<<<<<<< HEAD
=======
php artisan about
>>>>>>> laraxot/dev
./vendor/bin/phpstan analyse Modules --no-progress
```

## Related

- [phpstan-cluster-map-and-false-friends](../concepts/phpstan-cluster-map-and-false-friends.md)
<<<<<<< HEAD
- [phpstan-pest-bridge-discipline](../concepts/phpstan-pest-bridge-discipline.md)
- [safe-functions-rule](../../../../../docs/wiki/concepts/safe-functions-rule.md)
- [llm-wiki-qmd-workflow](../../../../../docs/project/llm-wiki-qmd-workflow.md)
=======
- [safe-functions-rule](../../../../../docs/wiki/concepts/safe-functions-rule.md)
- [llm-wiki-qmd-workflow](../../../../../docs/project/llm-wiki-qmd-workflow.md)
=======
title: "PHPStan Modules Fix 2026-05-05"
=======
title: "PHPStan Modules — stato e fix"
>>>>>>> 61938ca4 (delete .claude-audit/)
type: troubleshooting
sources: ["phpstan analyse Modules"]
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

# PHPStan su `Modules` — stato e fix

## Comando canonico

```bash
cd laravel && ./vendor/bin/phpstan clear-result-cache
cd laravel && ./vendor/bin/phpstan analyse Modules
```

Config: `phpstan.neon` livello **max**, baseline vuota, path `./Modules/`. **Non modificare** `phpstan.neon` — fix solo su codice PHP/test.

## Stato attuale (2026-06-30)

- `./vendor/bin/phpstan analyse Modules` → **0 errori**, exit 0
- Moduli analizzati: AI, Activity, Blog, Cms, Comment, Gdpr, Geo, Job, Lang, Media, Notify, Predict, Rating, Seo, Tenant, UI, User, Xot

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

<<<<<<< HEAD
- [phpstan-cluster-map-and-false-friends](concepts/phpstan-cluster-map-and-false-friends.md)
- [safe-functions-rule](../../../../docs/wiki/concepts/safe-functions-rule.md)
- [phpstan-level10](concepts/phpstan-level10.md)
>>>>>>> 64619e34 (.)
=======
- [phpstan-cluster-map-and-false-friends](../concepts/phpstan-cluster-map-and-false-friends.md)
- [safe-functions-rule](../../../../../docs/wiki/concepts/safe-functions-rule.md)
- [llm-wiki-qmd-workflow](../../../../../docs/project/llm-wiki-qmd-workflow.md)
>>>>>>> 61938ca4 (delete .claude-audit/)
>>>>>>> laraxot/dev
