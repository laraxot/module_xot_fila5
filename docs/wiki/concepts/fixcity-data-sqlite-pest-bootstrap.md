---
<<<<<<< HEAD
title: "<nome progetto>_data.sqlite — bootstrap Pest (fail-fast)"
=======
title: "fixcity_data.sqlite — bootstrap Pest (fail-fast)"
>>>>>>> laraxot/dev
type: concept
module: Xot
tags: [testing, pest, sqlite, xotbasetestcase, database-transactions]
created: 2026-07-12
updated: 2026-07-12
<<<<<<< HEAD
qmd: "<nome progetto>_data.sqlite prepareShared<nome progetto>SqliteForTesting pest hang empty sqlite fail fast"
issues:
  - "https://github.com/laraxot/<repo progetto>/issues/372"
discussions:
  - "https://github.com/laraxot/<repo progetto>/discussions/273"
=======
qmd: "fixcity_data.sqlite prepareSharedFixcitySqliteForTesting pest hang empty sqlite fail fast"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/372"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
>>>>>>> laraxot/dev
related:
  - ../concepts/module-testcase-xotbase-hierarchy.md
  - ../../../../../../docs/wiki/memories/data-sacred-no-destructive-db.md
  - ../../../../../../bashscripts/ai/wiki/rules/testing-modules-pest.md
---

<<<<<<< HEAD
# <nome progetto>_data.sqlite — bootstrap Pest

## Scopo

I moduli con `DatabaseTransactions` chiamano `prepareShared<nome progetto>SqliteForTesting()` **prima** di `parent::setUp()` per condividere un unico PDO SQLite su `laravel/database/<nome progetto>_data.sqlite` ed evitare `database is locked`.
=======
# fixcity_data.sqlite — bootstrap Pest

## Scopo

I moduli con `DatabaseTransactions` chiamano `prepareSharedFixcitySqliteForTesting()` **prima** di `parent::setUp()` per condividere un unico PDO SQLite su `laravel/database/fixcity_data.sqlite` ed evitare `database is locked`.
>>>>>>> laraxot/dev

## Sintomo (root cause hang)

| Condizione | Effetto |
|------------|---------|
| File assente | Eccezione Laravel / hang su connessione |
| File **0 byte** (`touch`) | SQLite non valido → lock / `busy_timeout` 10s → **Pest sembra bloccato** senza output |
| Header non `SQLite format 3` | Stesso comportamento |

<<<<<<< HEAD
`touch database/<nome progetto>_data.sqlite` **non** crea un database utilizzabile.

## Guard in XotBaseTestCase

`assert<nome progetto>SqliteReadyForTesting()` verifica esistenza, dimensione minima e magic header **prima** di `DB::purge()` e della condivisione PDO. Fallisce con `RuntimeException` e messaggio operativo.
=======
`touch database/fixcity_data.sqlite` **non** crea un database utilizzabile.

## Guard in XotBaseTestCase

`assertFixcitySqliteReadyForTesting()` verifica esistenza, dimensione minima e magic header **prima** di `DB::purge()` e della condivisione PDO. Fallisce con `RuntimeException` e messaggio operativo.
>>>>>>> laraxot/dev

## Ripristino (dati sacri)

| Consentito | Vietato |
|------------|---------|
| Copia da backup team / altro clone migrato | `migrate:fresh`, `db:wipe`, `migrate --force` |
| `cd laravel && php artisan migrate` (forward-only, una volta) | `touch` sul file sqlite |
| `RefreshDatabase` / `DatabaseMigrations` nei test | Pest parallelo sullo stesso file |

### Verifica locale

```bash
<<<<<<< HEAD
ls -la laravel/database/<nome progetto>_data.sqlite
# atteso: size >> 0 (tipico ~1MB+), non 0 byte

cd laravel
php -r 'echo file_get_contents("database/<nome progetto>_data.sqlite", false, null, 0, 16);'
=======
ls -la laravel/database/fixcity_data.sqlite
# atteso: size >> 0 (tipico ~1MB+), non 0 byte

cd laravel
php -r 'echo file_get_contents("database/fixcity_data.sqlite", false, null, 0, 16);'
>>>>>>> laraxot/dev
# atteso: SQLite format 3
```

### Dopo migrate forward-only

```bash
cd laravel
php artisan migrate
./vendor/bin/pest Modules/Comment/tests/Unit/CommentSanitizerTest.php --configuration phpunit.xml
```

<<<<<<< HEAD
## Moduli che usano prepareShared<nome progetto>SqliteForTesting
=======
## Moduli che usano prepareSharedFixcitySqliteForTesting
>>>>>>> laraxot/dev

Activity, Comment, Gdpr, Job, Rating, UI (e altri con stesso pattern nel `TestCase`).

## Helper traduzioni correlato

`require_translation_file()` in `Modules/Xot/helpers/Helper.php` — carica file lang con `require`, valida chiavi `string`, ritorno `array<string, mixed>` (PHPStan L10). Consumer: loader lang split (es. Job `job.php`).

## Backlink

- [module-testcase-xotbase-hierarchy.md](../concepts/module-testcase-xotbase-hierarchy.md)
- [testing-modules-pest.md](../../../../../../bashscripts/ai/wiki/rules/testing-modules-pest.md)
