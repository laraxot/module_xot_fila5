---
title: "Test: APP_ENV=local in .env.testing blocca Pest; SQLite o MySQL, decisione pendente"
type: story
module: Xot
status: blocked-decision
created: 2026-10-21
---

# Ambiente di test: decisione su .env.testing

## Problema

`laravel/.env.testing` ha `APP_ENV=local`. `Modules/Xot/tests/Support/TestDatabaseGuard.php`
interrompe ogni test perche' le connessioni non puntano a un database che finisce in `_test`.
Risultato: nessun test Pest parte in nessun modulo, quindi nessuna correzione PHPStan
e' verificata a runtime.

## Contraddizione da risolvere

- `CLAUDE.md` root dice che i test usano SQLite.
- `laravel/.env.testing` dice MySQL.
Va stabilita la fonte di verita', poi allineata la documentazione.

## Decisione richiesta all'utente

1. Quale database usano i test: SQLite in memoria, o MySQL di test.
2. Nome del database di test, che deve finire in `_test`.
3. Autorizzazione a cambiare `APP_ENV=testing` in `.env.testing`.

## Criteri di chiusura

- `APP_ENV=testing` (o equivalente) e database di test deciso e documentato.
- Pest parte almeno su `Modules/Xot/tests/Unit`, con esito reale riportato.
- `CLAUDE.md` root e `.env.testing` descrivono lo stesso database.

## Non fare

- Non puntare i test a un database di sviluppo o di produzione.
- Non usare `migrate:fresh` o `RefreshDatabase` su database non di test.
