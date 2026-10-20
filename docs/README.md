---
title: "Xot - documentazione del modulo"
type: readme
status: active
updated: 2026-10-14
module: Xot
tags: [docs, xot, readme]
qmd: "xot modulo base XotBase classi base provider contratti quick start limiti pest sqlite comandi"
---
# Xot: documentazione

Ingresso unico alla documentazione del modulo. Convenzione naming/spine:
[conventions/docs-organization.md](conventions/docs-organization.md).
Indice operativo: [00-INDEX.md](00-INDEX.md) · spine navigabile: [INDEX.md](INDEX.md).

Questo file dice che cosa e' il modulo e come si verifica.

## Identita e ownership

- Percorso `laravel/Modules/Xot`, repo git separato (package
  `laraxot/module_xot_fila5`, alias `xot`, `priority` 2 in `module.json`).
- Provider in `module.json`: `Modules\Xot\Providers\XotServiceProvider` e
  `Modules\Xot\Providers\Filament\AdminPanelProvider` (pannello `xot::admin`,
  path `xot/admin`, default di `XotBasePanelProvider`).
- Ruolo: classi base `XotBase*`, contratti e utilita condivise dagli altri
  moduli. Non e' la sede della logica di dominio (vedi Limiti).
- Ownership della documentazione: questa cartella. Le story del lavoro corrente
  stanno in [stories/](stories/), le decisioni in [decision-log.md](decision-log.md).
- Regola test: [module-test-ownership.md](rules/module-test-ownership.md).
- Religione no-services (hub): [bmad/brainstorming-services-to-actions-wave.md](bmad/brainstorming-services-to-actions-wave.md)
  · story [stories/services-to-actions-global-wave.story.md](stories/services-to-actions-global-wave.story.md).

## Cosa contiene il codice (conteggi del 2026-10-14)

- `app/`: 595 file PHP. Per cartella: Actions 240, Filament 152, Models 45,
  Datas 24, Contracts 23, Console 19, Providers 12, Http 10, Exports 10.
- 85 file `XotBase*` (Resource e Pages, Widget, Field, Column, Filter, Policy,
  Migration, Command, Exporter, provider di pannello, rotte ed eventi).
- Pagine del pannello in `app/Filament/Pages`: ArtisanCommandsManager,
  Dashboard, EnvPage, HealthPage, MainDashboard, MetatagPage. Risorse: Cache,
  CacheLock, Extra, Log, Module, Session.
- Config in `config/`: `config.php`, `xot.php`, `mcp.php`; il provider base le
  registra come `xot.config`, `xot.xot`, `xot.mcp` (`XotBaseServiceProvider::registerConfig`).
- `database/migrations/`: 9 migration (cache, cache_locks, sessions, extra,
  health check, 3 tabelle Pulse).
- `tests/`: 199 file `*Test.php` (Pest), base in `tests/XotBaseTestCase.php` e
  `tests/TestCase.php`. Lingue in `lang/`: `it` 192 file, `en` 107.

## Quick start (eseguito il 2026-10-14)

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Xot --no-progress   # exit 0, nessun errore
php artisan list --raw | grep '^xot:'                     # 8 comandi registrati
```

Il modulo non ha `vendor/` ne' `phpstan.neon` propri: PHPStan gira da `laravel/`
con la config unica. Per i test vedi la prima voce dei Limiti.

## Limiti verificati

- I test Xot non partono da `bashscripts/tools/pest-scratch-db.sh`: su
  `Modules/Xot/tests/Unit/Docs` 10 test su 10 falliscono prima di eseguire
  asserzioni (`SQLiteDatabaseDoesNotExistException` in `tests/XotBaseTestCase.php`
  `setUp`). Tre ricette provate (MariaDB scratch, sqlite con path, sqlite con nome)
  danno lo stesso esito. Contesto in [DCP-45](stories/dcp-45-isolamento-db-test-pest-scratch.story.md).
- `php artisan list` mostra 10 dei 18 comandi con `$signature` in
  `app/Console/Commands/*.php`; non compaiono `xot:build-test-sqlite`,
  `xot:analyze-components`, `xot:add-strict-types`, `xot:check-accessor-twins`,
  `xot:import-mdb-to-mysql`, `database:backup`, `db:search-text`,
  `filament:optimize-memory`. `XotServiceProvider::registerCommands()` registra solo
  `GenerateFilamentResources`; perche' ne compaiano altri 9 non e' verificato.
- `routes/web.php` e `routes/api.php` contengono solo commenti. `routes/seo.php`
  e `routes/web_seo.php` non sono caricati da nessun provider e nominano
  controller inesistenti (`SitemapXmlController`, `RssFeedController`,
  `SiteMapController`): in `app/Http/Controllers` c'e solo `XotBaseController`.
- `config/xot.php` contiene percorsi assoluti di un altro progetto
  (`/var/www/html/exa/base_orisbroker_fila5`, modulo `broker`); nessun file di
  `app/`, `helpers/` o degli altri moduli legge `xot.xot.paths`.
- La voce di `wiki/log.md` del 2026-07-24 dice che le Actions di dominio sono
  state tolte da Xot, ma restano `app/Actions/AI/Ollama` (2 file),
  `app/Actions/ContextCompressorAction.php` (esiste anche in `Modules/AI`) e
  `app/Actions/Geo/GetDistanceExpressionAction.php`. Quando siano tornate non e'
  verificato (l'ultimo commit di `ContextCompressorAction.php` nel repo di Xot e'
  del 2026-10-09); il riallineamento del 2026-10-08 e' in `decision-log.md`.
- Link: 738 riferimenti relativi non risolti in `docs/` (misura 2026-10-14 con
  `docs-organizer.py --busy-minutes 0`); cause e file in [00-INDEX.md](00-INDEX.md).

Il contratto dei docs e in
[docs-organization.md](conventions/docs-organization.md);
l'indice generale del repo e [docs/README.md](../../../../docs/README.md).
