---
title: "Xot - phpstan-status.md"
module: Xot
status: active
created: 2026-10-28
updated: 2026-10-28
tags: [phpstan, modules, quality]
qmd: "PHPStan Modules stato corrente analisi full tree level massimo"
related:
  - ./stories/ecc-codex-plugin-setup.story.md
---
# PHPStan Status — Xot

# Stato del gate PHPStan sui moduli

## Misura 2026-10-06 (sera) — swarm Xot/app: scopo prima dell'errore

`analyse Modules/Xot/app`: 147 segnalazioni del file errori -> **21**, tutte
`classConstant.nativeTypeNotSupported`: `laravel/composer.json` dichiara `"php": "^8.2"`,
PHPStan assume 8.2 e rifiuta le costanti di classe con tipo nativo (PHP 8.3), mentre il
runtime e' 8.4 e il `HEAD` le ha gia' tipizzate. Si esce solo con `require.php: ^8.3`
(decisione dell'utente). Senza tipi si ritorna a `typeCoverage.constantTypeCoverage`.

Orfane che erano logica tolta, non rumore: `RelationX::morphToManyX()` (prefisso
`database.tabella` del pivot cross-database, tolto il 2026-09-03 per un `variable.unused`),
`RouteService::urlAct()` (nome route letto dopo l'uso), `extractBelongsToRelations()`
(non popolava `$data`), `--type` di `xot:analyze-components` (mai applicato).
Gli errori `HasXotTable` "in context of class@anonymous" erano result-cache stale.
Dettaglio e lezioni: [dev-story](../stories/phpstan-cleanup-xot-app.dev.md).

## Misura 2026-10-06 (notte) — swarm Xot/rest: test, helpers, stub Pest

`analyse Modules`: 87 segnalazioni del file errori -> **0** in `Modules/Xot/{tests,helpers}`.
12 erano result-cache stale (`iterableValue` su classi anonime con PHPDoc presente);
20 erano test segnaposto con la variabile non letta (asserzione persa: ora asseriscono il
comportamento del titolo); 53 erano parametri inutilizzati degli stub Pest
(`helpers/Helper.php`, `tests/PestStubs.php`: firme invariate, ora passano nome e argomenti a
`xotPestStubFailure()`); 2 di fixture (`SendMailByRecordActionTest`: classe anonima annidata
senza PHPDoc risolto -> classe nominata). Pest non eseguito (`.env.testing` = MySQL).
Da decidere: `tests/PestStubs.php` e' orfano ma e' lui a risolvere `Pest\Laravel\*` per PHPStan.
Dettaglio e lezioni: [dev-story](../stories/phpstan-cleanup-xot-rest.dev.md).

## Misura 2026-10-06 — EnsureKeysAction + file scratch rimossi


# Stato del gate PHPStan sui moduli

## Verifica corrente

È stato eseguito il comando richiesto da root:

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules
```

- Configurazione: `laravel/phpstan.neon`.
- File analizzati: 9.775.
- Segnalazioni: 0.
- Exit code: 0 (`[OK] No errors`).
- Cache: verificato due volte; il secondo run è partito con cache fredda e ha
  terminato anch'esso con exit 0.

Non sono state cambiate classi PHP: non sono emerse segnalazioni da correggere. La
scansione completa resta una fotografia del codice presente durante l'esecuzione;
rilanciarla dopo modifiche PHP che possono cambiare i risultati.

## Riferimenti

- Story e dettaglio dei gate: [ECC e PHPStan](./stories/ecc-codex-plugin-setup.story.md).
- Regola source-first: [memoria condivisa](../../../../../bashscripts/ai/wiki/memories/source-first-before-fix.md).