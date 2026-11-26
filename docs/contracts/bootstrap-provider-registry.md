---
title: "Contract — registro dei provider Laravel"
type: framework-contract
module: Xot
owner: bootstrap/providers.php
status: accepted
created: 2026-11-26
updated: 2026-11-26
---

# Registro dei provider Laravel

Contract di framework (non un'Action): cosa promette `laravel/bootstrap/providers.php` a chi aggiunge un modulo o un provider. La decisione è [ADR 0009](../adr/0009-laravel-bootstrap-provider-registry.md), che contiene anche lo «Stato attuale» dove il codice di oggi la contraddice. Vale per il checkout FixCity; per gli altri progetti che usano Xot il file è quello del progetto ospite.

## Input

- `laravel/bootstrap/providers.php` (righe 5-7) e la chiave `extra.laravel.providers` del `composer.json` di ogni modulo (per Xot: `Modules/Xot/composer.json`, righe 146-147).

## Output

- Laravel 13 carica `AppServiceProvider` dal registro bootstrap e scopre i provider dei moduli con la discovery dei package; i moduli non vanno elencati nel registro.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XOT-BOOTSTRAP-INV-1` | `bootstrap/providers.php` restituisce solo `AppServiceProvider::class` (righe 5-7). Un provider di modulo aggiunto lì viene registrato due volte (registro e discovery). Nessun test lo verifica. | — (non dimostrato) |
| `XOT-BOOTSTRAP-INV-2` | Il registro non contiene `FolioServiceProvider` né `App\Providers\FolioServiceProvider`: Folio lo monta chi lo possiede (`FolioVolt` nei progetti con Cms, come dice il commento del test). Prova: `Modules/Xot/tests/Unit/Bootstrap/FolioProviderNotRegisteredTest.php`, senza `->group()`. | — (non dimostrato) |
| `XOT-BOOTSTRAP-INV-3` | Ogni provider di modulo che estende `XotBaseServiceProvider` dichiara `$module_ns`; senza, la base registra il `RouteServiceProvider` e l'`EventServiceProvider` di Xot al posto dei propri e le rotte del modulo non esistono, senza errori. Prova: `Modules/Xot/tests/Unit/Bootstrap/ModuleProvidersDeclareTheirNamespaceTest.php`, con debito noto `MODULE_NS_KNOWN_DEBT` (AI, Comment, Geo, Mobile); senza `->group()`. | — (non dimostrato) |

## Effetti collaterali

- Il framework carica i provider all'avvio dell'applicazione; dopo una modifica ai provider o a un `RouteServiceProvider` va rigenerata la cache delle rotte (`route:clear` in sviluppo, `route:trans:cache` nel deploy, come scrive l'ADR 0009).

## Errori

- Un provider duplicato o mancante non lancia un errore di validazione: si manifesta come rotte, viste o eventi assenti. La correzione sta nel `composer.json` del modulo owner o nel provider, non in una soppressione PHPStan.

## Non fa

- Non sostituisce la discovery dei moduli e non elenca i provider del vendor: quelli di `Livewire\Volt` e `Laravel\Folio` stanno in `laravel/config/app.php` (righe 216-217).
- Non registra `App\Providers\Filament\AdminPanelProvider`: vedi lo «Stato attuale» dell'ADR 0009.
