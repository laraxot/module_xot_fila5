---
title: "I dati sono sacri: mai migrate:fresh/reset/rollback/force, mai RefreshDatabase, test solo con .env.testing"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
decision-makers: [team back office]
issues: [250]
qmd: "0013 dati sacri migrazioni test sono"
---

# I dati sono sacri: migrazioni e test girano solo in avanti

## Contesto

La base contiene dati reali e multi-tenant: ogni modulo ha il proprio database e i test condividono gli stessi spazi. `migrate:fresh`, `migrate:reset`, `migrate:rollback` e `git push --force` distruggono o riscrivono lo stato che nessun rollback ripristina. `RefreshDatabase` nei test resetta tabelle condivise, rompe l'isolamento multi-tenant e crea race condition tra test paralleli. Eseguire i test senza `.env.testing` punta i test al database di sviluppo.

## Driver della decisione

- Irreversibilità: un `fresh` su un database condiviso non si annulla.
- Isolamento multi-tenant: la base ha piú connessioni (`DB_*`, `DB_DATABASE_LIMESURVEY`, suffisso `_test` obbligatorio).
- Riproducibilità: i test devono girare sempre sullo stesso ambiente dichiarato, mai su dati reali.

## Alternative scartate

- `migrate:fresh`/`reset`/`rollback` o `push --force` per "sistemare" lo stato: rifiutati sempre, su qualunque ambiente.
- `RefreshDatabase` trait nei test Pest: vietato, usa `DatabaseTransactions` o cleanup esplicito.
- Test senza `.env.testing` o con SQLite/`:memory:`: vietati, la base è progettata per MySQL multi-database.

## Decisione

Scelta: **regola permanente**, perché i dati sono sacri e l'isolamento multi-tenant non si negozia. In pratica:

- Vietati `php artisan migrate:fresh`, `migrate:reset`, `migrate:rollback`, `migrate --force` e `git push --force` (e equivalenti): si studia la storia con `git log`/`show`/`blame` e si riscrive in avanti.
- Vietato `use Illuminate\Foundation\Testing\RefreshDatabase` in ogni test: si usa `DatabaseTransactions` o cleanup manuale.
- Prima di eseguire test si copiare `.env.testing` su `.env` (o si lancia con la configurazione di test): database MySQL con suffisso `_test`, mai SQLite.

## Conseguenze

- Buono, perché nessun agente o sviluppatore può cancellare dati reali per errore o disattenzione.
- Buono, perché i test non perdono isolamento ne' toccano i database di sviluppo.
- Cattivo, perché una migrazione sbagliata va corretta con una migrazione successiva (forward-only), non con un reset: a volte costa piú lavoro.

## Conferma

- In revisione: un comando `migrate:fresh|reset|rollback`, `--force` o `RefreshDatabase` in codice o script si respinge con un rimando a questo ADR.
- `Modules/Xot/tests/Unit/Harness/GuardTest.php` (righe 35-53) prova che il guard dell'harness (`.harness/bin/guard`) blocca `dropColumn` in una migrazione (regola `migration.destructive`) e `RefreshDatabase` in un test (regola `db.fresh`); il guard protegge gli agenti, non la CI né chi lancia i comandi a mano;
- nessun test di architettura vieta `RefreshDatabase` o i comandi distruttivi di migrazione nel codice versionato: resta la revisione (proposta: regola Pest arch nel modulo Xot).
