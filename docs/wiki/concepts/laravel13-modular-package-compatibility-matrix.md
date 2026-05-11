---
title: "Laravel 13 Modular Package Compatibility Matrix"
module: "Xot"
created: "2026-04-28"
updated: "2026-05-05"
---

# Laravel 13 Modular Package Compatibility Matrix

## Scopo

Definire una regola operativa semplice: in progetto modulare Laraxot i pacchetti si installano nel modulo owner, ma solo se compatibili con il runtime reale (`Laravel 13` + `PHP 8.3`).

## Matrice verificata

| Pacchetto | Owner canonico | Compatibile Laravel 13 | Compatibile PHP 8.3 | Decisione |
|---|---|---|---|---|
| `fruitcake/laravel-debugbar` | `Modules/Xot` (`require-dev`) | si (`^13`) | si (`^8.2`) | gia' presente nel lock root come `v4.2.8`; non duplicare altrove |
| `spatie/laravel-responsecache` | nessun owner runtime confermato | si (`8.3.x`) | no (`php ^8.4`) | non reinstallare; la linea `7.7.2` resta ferma a `Laravel 12` |
| `aaronfrancis/fast-paginate` | `Modules/Xot` | no (stable fino a `illuminate ^12`) | si | rimosso; `XotBaseListRecords` usa `paginate()` |
| `fidum/laravel-eloquent-morph-to-one` | `Modules/Xot` | no (stable fino a `illuminate ^12`) | si | bloccato in attesa release stable `^13`; oggi manca dal lock root |
| `spatie/laravel-model-states` | `Modules/UI` + `Modules/Xot` | si (`2.13.1`) | no (`php ^8.4`) | bloccato su runtime attuale; `2.12.1` supporta solo `Laravel 10|11|12` |

## Snapshot 2026-05-05

Fonti locali usate: `composer outdated --direct --format=json`, `composer why-not laravel/framework '^13.0'`, `composer validate --no-check-publish`.

| Pacchetto | Stato locale | Target / decisione |
|---|---|---|
| `laravel/framework` | `v13.7.0` | aggiornato |
| `nwidart/laravel-modules` | `v13.0.0` | aggiornato; root resta minimale e continua a includere `Modules/*/composer.json` |
| `laravel/tinker` | `v3.0.2` | aggiornato |
| `filament/*` | `v5.6.2` | aggiornato in blocco |
| `livewire/livewire` | `v4.3.0` | aggiornato |
| `livewire/flux` | `v2.14.1` | aggiornato |
| `orchestra/testbench` | `^11.0` | aggiornato in Xot `require-dev` |
| `barryvdh/laravel-debugbar` | rimosso | debugbar canonico resta `fruitcake/laravel-debugbar` in Xot `require-dev` |
| `genealabs/laravel-model-caching` | `13.1.1` | risolve Laravel 13, ma Composer lo segnala abandoned; migrazione namespace a `mike-bronner/*` da pianificare in `Modules/Quaeris` |

## Snapshot post-upgrade 2026-05-05

`composer update -W` e `php artisan package:discover --ansi` completano con successo sul runtime `PHP 8.3.30`.

Pacchetti risolti tramite branch non-stable per mancanza di release Laravel 13 stable al momento dell'upgrade:

| Pacchetto | Versione risolta |
|---|---|
| `laravel/pennant` | `dev-feat/l13 3f6c7e3` |
| `laravel/pulse` | `1.x-dev 901f5b5` |
| `maatwebsite/excel` | `4.x-dev 100d3d3` |
| `openai-php/laravel` | `dev-main e1a28fd` |
| `spatie/browsershot` | `dev-main 0cad9bb` |
| `spatie/laravel-pdf` | `dev-main 116ec54` |
| `spatie/laravel-google-cloud-storage` | `dev-add-laravel-13-support c66f131` |
| `staudenmeir/eloquent-has-many-deep` | `dev-main e4fe26f` |
| `staudenmeir/laravel-adjacency-list` | `dev-main a8302f3` |

## Composer blockers estesi

`composer why-not laravel/framework '^13.0'` segnala ulteriori pacchetti con vincoli Illuminate/Laravel fino a 12: `aaronfrancis/fast-paginate`, `anourvalar/eloquent-serialize`, `blade-ui-kit/blade-heroicons`, `fidum/laravel-eloquent-morph-to-one`, `flowframe/laravel-trend`, `irazasyed/telegram-bot-sdk`, `kirschbaum-development/eloquent-power-joins`, `kreait/laravel-firebase`, `laravel-notification-channels/fcm`, `laravel-notification-channels/telegram`, `laravel/pennant`, `laravel/pulse`, `maatwebsite/excel`, `mcamara/laravel-localization`, `openai-php/laravel`, `owenvoke/blade-fontawesome`, `socialiteproviders/manager`, `spatie/laravel-google-cloud-storage`, `spatie/laravel-responsecache`, `statikbe/laravel-cookie-consent`, e pacchetti `staudenmeir/*`.

Questi non vanno spostati in root. Ogni decisione deve essere presa nel modulo owner e documentata nella pagina wiki piu' vicina.

## Evidenze codice

- `aaronfrancis/fast-paginate`: `Modules/Xot/app/Filament/Resources/Pages/XotBaseListRecords.php`
- `fidum/laravel-eloquent-morph-to-one`: `Modules/Xot/app/Actions/Model/Store/MorphToOneAction.php`, `Modules/Xot/app/Actions/Model/Update/MorphToOneAction.php`
- `spatie/laravel-model-states`: `Modules/UI/app/Filament/Forms/Components/SelectState.php`, `Modules/UI/app/Filament/Tables/Columns/*State*.php`, `Modules/Xot/app/States/*`
- `spatie/laravel-responsecache`: nessuna integrazione applicativa forte nel codice PHP corrente; presenti solo riferimenti documentali e una riga commentata in `ArtisanService`
- `fruitcake/laravel-debugbar`: `laravel/config/debugbar.php`, middleware/security bypass e servizi Artisan in Xot

## Regola operativa

- Prima la compatibilita' tecnica, poi la preferenza architetturale.
- Modularita' non significa forzare installazioni incompatibili.
- Se un pacchetto non risolve su lock condiviso, si documenta il motivo e si pianifica re-check.
- Il file canonico da aggiornare e' il `composer.json` del modulo owner; i `composer.lock` locali dei moduli non sono sorgente autorevole per il lock condiviso root.

## Trigger di ri-valutazione

- upgrade ambiente a `PHP 8.4`;
- nuova release stable con supporto `illuminate ^13`;
- rimozione di branch `dev-*` come unica opzione.

## Riferimenti

- [debugbar architecture](../../debugbar-architecture.md)
- [story 8-69](../../../../../../../_bmad-output/implementation-artifacts/8-69-modular-laravel13-package-reintroduction-compatibility-matrix.md)
- [root decision](../../../../../../docs/wiki/concepts/laravel13-modular-package-reintroduction.md)
- [story 13-1](../../../../../../../_bmad-output/implementation-artifacts/13-1-laravel13-modular-composer-upgrade.md)
- [Laravel 13 releases](https://laravel.com/docs/13.x/releases)
- [Laravel 13 upgrade guide](https://laravel.com/docs/13.x/upgrade)
- [nwidart/laravel-modules Packagist](https://packagist.org/packages/nwidart/laravel-modules)
