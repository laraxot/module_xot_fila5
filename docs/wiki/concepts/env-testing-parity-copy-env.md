---
<<<<<<< HEAD
title: ".env.testing — copia .env con suffisso _test su DB_DATABASE"
type: concept
tags: [testing, env, xot, database, mysql]
created: 2026-06-12
updated: 2026-06-12
qmd: "Xot env testing parity CreatesApplication sync-env-testing DB_DATABASE _test"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/364"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/365"
related:
  - ../../testing/mysql-only-testing-rule.md
  - ../../../../docs/TESTING-ARCHITECTURE.md
  - ../../../../../../docs/wiki/bmad/architecture-env-testing-parity.md
=======
title: ".env.testing — template test senza credenziali operative"
type: concept
tags: [testing, env, xot, database, mariadb, secrets]
created: 2026-06-12
updated: 2026-09-26
qmd: "Xot .env.testing test database isolation secrets environment normalizer"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/383"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/392"
related:
  - ../../testing-database-strategy.md
  - ../../../../../../bashscripts/tools/sync-env-testing.sh
>>>>>>> laraxot/dev
---

# `.env.testing` nel modulo Xot

<<<<<<< HEAD
## Ruolo di Xot

`Modules\Xot\Tests\CreatesApplication` è il trait condiviso da tutti i `TestCase` dei moduli. Qui si applica la **guardia** e il caricamento esplicito di `.env.testing`.

## Contratto

1. `laravel/.env.testing` esiste, è **tracciato in git**, generato da `./bashscripts/tools/sync-env-testing.sh`
2. Identico a `.env` salvo `DB_DATABASE*` → `valore_test`
3. `phpunit.xml` non imposta `DB_CONNECTION` / `DB_DATABASE`
4. Test usano `DatabaseTransactions` — mai `RefreshDatabase`

## CreatesApplication

Se `APP_ENV=testing` e il file manca → `RuntimeException` con istruzione per lo script sync.

Dopo `bootstrap/app.php`, se il file esiste → `loadEnvironmentFrom('.env.testing')` prima del bootstrap del kernel.

**Non** forzare connessioni DB nel trait: `TenantServiceProvider` configura le connessioni modulo da `DB_DATABASE*`.

## Workflow sviluppatore

```bash
cd laravel
# modifica .env ...
cd ..
./bashscripts/tools/sync-env-testing.sh
APP_ENV=testing ./vendor/bin/pest Modules/Geo/tests/Unit/Enums/EnumsTest.php
```

## Filosofia (religione Laraxot)

| Principio | Effetto |
|-----------|---------|
| **Dati sacri** | I test non scrivono mai su `fixcity_data` — solo su `fixcity_data_test` |
| **Parità engine** | Stesso MySQL/MariaDB del dev — niente SQLite che maschera bug SQL |
| **DRY** | Un `.env` da curare; `.env.testing` è derivato, non seconda fonte di verità |
| **Tenant dinamico** | `TenantServiceProvider` legge `DB_DATABASE*` dall'env — copia totale tranne nomi DB |

## Backlink moduli/temi

- Cms: [env-testing-cms-tests.md](../../../../Cms/docs/wiki/concepts/env-testing-cms-tests.md)
- Sixteen: [env-testing-pest-fo.md](../../../../../Themes/Sixteen/docs/wiki/concepts/env-testing-pest-fo.md)
- Script: [sync-env-testing.md](../../../../../../bashscripts/docs/tools/sync-env-testing.md)

## Canon storico

Regola dettagliata (esempi vietati): [mysql-only-testing-rule.md](../../testing/mysql-only-testing-rule.md)

Indice BMAD: [architecture-env-testing-parity.md](../../../../../../docs/wiki/bmad/architecture-env-testing-parity.md)
=======
## Contratto verificato

`Modules\Xot\Tests\CreatesApplication` carica `.env.testing` quando `APP_ENV=testing`.
Il file è un template tracciato: contiene solo nomi di database `_test`, valori non sensibili
e riferimenti a variabili esterne per credenziali dedicate. Non è una copia di `.env`.

La regola precedente di copiare `.env` era rischiosa: trasportava in un file tracciato
`APP_KEY`, password e token di sviluppo. Il template ora usa un `APP_KEY` esclusivamente
test e riceve username/password tramite `FIXCITY_TEST_DB_*` esportate dal processo.

## Flusso

```bash
./bashscripts/tools/sync-env-testing.sh --check
./bashscripts/tools/sync-env-testing.sh --write
bash bashscripts/tests/test-sync-env-testing.sh
```

Lo script legge e normalizza solo `laravel/.env.testing`; non legge `.env`, non copia segreti,
non crea database, non concede privilegi e non stampa valori. La configurazione deve fallire
se mancano credenziali, senza fallback a un account di sviluppo.

```bash
export FIXCITY_TEST_DB_USERNAME='account_test'
export FIXCITY_TEST_DB_PASSWORD='...'
export FIXCITY_TEST_DB_USERNAME_USER='account_user_test'
export FIXCITY_TEST_DB_PASSWORD_USER='...'
APP_ENV=testing ./laravel/vendor/bin/pest laravel/Modules/Fixcity/tests/Feature
```

Le credenziali e i grant sono specifici dell'istanza e appartengono al DBA. I privilegi devono
essere limitati alle basi `*_test`; non usare `GRANT ALL` sull'account di sviluppo.

## Verifiche

- L'helper di test controlla `APP_ENV`, database test, duplicati e rifiuto dei segreti letterali.
- Un controllo con Tinker verifica l'interpolazione Laravel di credenziali sentinel senza
  aprire connessioni al database.
- La suite Pest e lo smoke UI rimangono pendenti finché MariaDB non concede l'accesso alle
  sole basi di test.
>>>>>>> laraxot/dev
