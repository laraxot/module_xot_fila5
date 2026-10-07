---
type: note
created: 2026-09-26
updated: 2026-09-26
qmd: "testing database strategy"
issues: []
discussions: []
title: Strategia database per i test
description: Contratto fail-closed per i database MySQL/MariaDB di test, credenziali esterne e isolamento dalle basi di sviluppo.
module: Xot
area: testing
status: canonical
audience: [developer, ai-agent]
tags: [testing, database, mysql, mariadb, pest, environment]
related:
  - Modules/Xot/docs/database-testing-rule.md
  - Modules/Xot/docs/testing-strategy.md
  - Modules/Xot/docs/testing-refresh-database-rule.md
  - Modules/Xot/tests/CreatesApplication.php
  - bashscripts/tools/sync-env-testing.sh
---

# Strategia database per i test

Questa è la fonte canonica per configurazione e isolamento dei database di test. I test
usano il motore MySQL/MariaDB del progetto e nomi database con suffisso `_test`; SQLite,
`RefreshDatabase` e `migrate:fresh` sono vietati.

## Connessioni e protezione dei dati

`DB_DATABASE` configura la connessione predefinita; `DB_DATABASE_USER` configura il database
del modulo User. Variabili per altri database si aggiungono solo quando il modulo owner le
configura davvero. Ogni database usato durante una suite deve terminare in `_test`.

L'account usato dai test deve essere dedicato e avere privilegi solo sui database `_test`.
Non copiare username o password da `.env` e non concedere al test account accesso alle basi
di sviluppo. La correzione dei privilegi MariaDB è un'operazione DBA separata; questo script
non crea database né esegue `GRANT`.

## File di ambiente

`laravel/.env.testing` è il file canonico caricato in test. `laravel/Modules/Xot/tests/CreatesApplication.php`
lo seleziona quando `APP_ENV=testing`; `laravel/phpunit.xml` imposta questo ambiente.
`.env.sqlite` non è richiesto e non deve essere creato: quel nome era un riferimento storico
errato. Il driver resta MySQL/MariaDB.

Il file tracciato `.env.testing` è un template senza credenziali operative. Le credenziali
test vengono fornite dal processo, non salvate nel repository:

```bash
export FIXCITY_TEST_DB_USERNAME='account_test'
export FIXCITY_TEST_DB_PASSWORD='...'
export FIXCITY_TEST_DB_USERNAME_USER='account_user_test'
export FIXCITY_TEST_DB_PASSWORD_USER='...'
```

I valori effettivi sono specifici dell'istanza e vanno forniti dall'amministratore DB. Se
mancano, la connessione deve fallire; non deve ricadere sulle credenziali di sviluppo.

## Normalizzazione sicura

```bash
./bashscripts/tools/sync-env-testing.sh --check
./bashscripts/tools/sync-env-testing.sh --write
bash bashscripts/tests/test-sync-env-testing.sh
```

Il normalizzatore legge solo `.env.testing`: deduplica chiavi tenendo l'ultima definizione,
imposta `APP_ENV=testing`, garantisce il suffisso `_test` e rifiuta credenziali letterali.
Non legge né copia `.env`, non mostra valori, non modifica `phpunit.xml` e non altera le
credenziali del database.

## Esecuzione

Prima dei test, verificare in sola lettura i database risolti (senza stampare username o
password), poi usare Pest normalmente:

```bash
cd laravel
APP_ENV=testing ./vendor/bin/pest Modules/Fixcity/tests/Feature
```

Le migrazioni, se autorizzate dall'ambiente, si eseguono in avanti con `php artisan migrate
--env=testing`. Non eseguire `migrate:fresh`, rollback o comandi contro i database senza
suffisso `_test`.

## Checklist

- [ ] `sync-env-testing.sh --check` passa senza stampare valori sensibili.
- [ ] Ogni `DB_DATABASE*` configurata termina in `_test`.
- [ ] `FIXCITY_TEST_DB_*` è dedicato e limitato ai database test.
- [ ] Il file non contiene credenziali operative né chiavi copiate da `.env`.
- [ ] Pest e smoke UI raggiungono le assertion su MariaDB test.
