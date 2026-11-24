---
qmd: "ADR dati sacri migrazioni forward-only env testing RefreshDatabase migrate fresh reset rollback force"
title: "ADR 0013 — Dati sacri e test isolati"
type: decision
status: accepted
module: Xot
created: 2026-11-24
updated: 2026-11-24
decision-makers: [team Laraxot]
issues: []
related:
  - ../tests/Support/TestDatabaseGuard.php
  - ../tests/XotBaseTestCase.php
  - ../wiki/rules/data-sacred-no-destructive-db.md
  - ../wiki/memories/no-tests-on-production-10-100-200-15.md
---

# ADR 0013: dati sacri e test isolati

## Contesto

PTVX opera su dati amministrativi persistenti. Un comando di migrazione
distruttivo o una suite di test collegata a un database reale può cancellare o
alterare dati senza possibilità di ricostruire con certezza l'ordine delle
operazioni. Il nome del database da solo non è una protezione sufficiente:
anche un database con suffisso `_test` può trovarsi su un host remoto.

## Driver della decisione

- preservare i dati esistenti e il ledger delle migrazioni già distribuite;
- rendere le migrazioni ripetibili, additive e forward-only;
- impedire che Pest usi accidentalmente l'ambiente applicativo o un database
  remoto;
- avere una regola unica, verificabile e applicabile a tutti i moduli.

## Alternative scartate

- `migrate:fresh`, `migrate:refresh`, `migrate:reset`, `db:wipe` o rollback
  dello schema per ricreare rapidamente lo stato;
- `--force` per bypassare le protezioni dei comandi di migrazione;
- il trait `RefreshDatabase` o migrazioni distruttive nei test;
- usare `.env`, credenziali reali o un host remoto come configurazione di test;
- affidarsi soltanto al nome del database senza verificare host e ambiente.

## Decisione

I dati sono sacri. Il progetto non esegue mai, su dati persistenti o ambienti
non usa-e-getta, `migrate:fresh`, `migrate:refresh`, `migrate:reset`,
`db:wipe`, rollback di migrazione/schema, né comandi di migrazione con
`--force`. Le migrazioni applicative sono solo additive e forward-only.

I test applicativi e di integrazione devono usare obbligatoriamente
`laravel/.env.testing`, con `APP_ENV=testing`, e non devono usare
`RefreshDatabase`. L'isolamento usa il database di test `_test` previsto dal
TestCase, un database scratch usa-e-getta o transazioni gestite dal TestCase;
il rollback automatico della singola transazione di test è isolamento tecnico e
non è un rollback dello schema o del ledger delle migrazioni. I test puramente
unitari che non avviano Laravel non hanno una connessione da configurare.

`Modules\Xot\Tests\CreatesApplication` carica esplicitamente `.env.testing`;
`Modules\Xot\Tests\Support\TestDatabaseGuard` è il confine obbligatorio:
verifica l'ambiente `testing`, il nome usa-e-getta del database e l'host
locale/esplicitamente autorizzato. Un test applicativo che non supera la
guardia non parte. La connessione legacy `liveuser_general` è un'eccezione
tecnica compatibile con il bootstrap storico e non deve essere usata per
scrivere dati nei test.

## Conseguenze

- Buono: gli ambienti persistenti non vengono cancellati per accelerare i test.
- Buono: il file `.env.testing` e il guard rendono visibile il confine di
  sicurezza prima del primo test.
- Buono: una modifica di schema conserva la storia e viene applicata con una
  nuova migrazione additive nel modulo owner.
- Cattivo: i test richiedono un database di test configurato correttamente e
  non possono essere resi verdi collegandoli a staging o produzione.
- Cattivo: il ripristino di dati errati richiede backup, migrazioni correttive
  additive o procedure applicative; non si usa il rollback come scorciatoia.
- Nota legacy: il repository contiene ancora `down()` e `dropIfExists()` nelle
  migrazioni storiche. Non si invocano operativamente e non si aggiungono nelle
  nuove migrazioni; la loro rimozione richiede un inventario separato del ledger.
- Nota deploy: `bashscripts/lib/deploy.sh` usa ancora `migrate --force` per il
  normale deploy non interattivo. Questo è debito di conformità da risolvere in
  una story dedicata; non autorizza l'uso di `--force` nei test, nelle operazioni
  manuali o sui comandi distruttivi.

## Conferma

- `TestDatabaseGuard` rifiuta `APP_ENV` diverso da `testing`, database non
  usa-e-getta e host remoti non autorizzati.
- La review cerca `RefreshDatabase`, `migrate:fresh`, `migrate:refresh`,
  `migrate:reset`, `db:wipe`, rollback di migrazione e `--force` nei test e
  nelle procedure di migrazione.
- `CreatesApplication` e il guard vengono verificati insieme per dimostrare la
  presenza e l'uso di `.env.testing`; su host produttivi non si eseguono test.
- PHPStan e la suite architetturale verificano il codice modificato; l'ADR non
  sostituisce questi gate.

## Owner e sostituzione

Xot è owner della policy trasversale. Un modulo può aggiungere una procedura
più restrittiva nel proprio ADR, ma non può indebolire questa decisione. Una
modifica alla policy richiede un nuovo ADR che citi questo documento come
`superseded`.
