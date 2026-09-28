---
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
---

# `.env.testing` nel modulo Xot

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
