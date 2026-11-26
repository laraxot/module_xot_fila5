---
title: "Contract — classi base XotBase"
type: framework-contract
module: Xot
owner: Modules/Xot/app
status: accepted
created: 2026-11-26
updated: 2026-11-26
---

# Classi base XotBase

Contract di framework (non un Behavioral Contract di una singola Action): cosa i moduli devono estendere al posto delle classi del framework e cosa oggi lo verifica. La decisione è [ADR 0006 — punti base Xot](../adr/0006-xot-base-extension-points.md). Xot è condiviso: la regola vale per ogni tenant e progetto ospite che carica i propri moduli, con il debito dichiarato nel `tests/Arch/debt.php` del pacchetto che lo possiede.

## Input

- Una classe concreta di modulo che estende una classe Filament o un provider del framework.

## Output

- Le otto famiglie Filament elencate in `XOTBASE_FAMILIES` (`Modules/Xot/tests/Arch/ArchitectureTest.php`, righe 29-38) si estendono tramite la base `XotBase*` corrispondente: `Resource`, `CreateRecord`, `EditRecord`, `ManageRecords`, `RelationManager`, `ChartWidget`, `StatsOverviewWidget`, `TableWidget`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XOT-XOTBASE-INV-1` | Una classe di produzione che estende una delle otto famiglie Filament di `XOTBASE_FAMILIES` estende la base `XotBase*` indicata (regola Pest arch, ciclo a riga 165 di `Modules/Xot/tests/Arch/ArchitectureTest.php`; `vendor/bin/pest --testsuite=Arch` da `laravel/`). Il debito ammesso è in `Modules/*/tests/Arch/debt.php`. Senza `->group()`. | — (non dimostrato) |
| `XOT-XOTBASE-INV-2` | Un provider di modulo che estende `XotBaseServiceProvider` dichiara `$module_ns`; senza, la base registra i provider di Xot al posto di quelli del modulo. Prova: `Modules/Xot/tests/Unit/Bootstrap/ModuleProvidersDeclareTheirNamespaceTest.php` (debito noto: AI, Comment, Geo, Mobile). Senza `->group()`. | — (non dimostrato) |
| `XOT-XOTBASE-INV-3` | Le altre famiglie (`Page`, `Action`, `Policy`, `Model`, migrazioni) non sono in `XOTBASE_FAMILIES`: l'uso della base Xot corrispondente resta una voce di review, non un controllo automatico. | — (non dimostrato) |

## Effetti collaterali

- Le basi applicano configurazione, registrazione e convenzioni condivise (per i provider: rotte, eventi, migrazioni del modulo); estendere direttamente la classe del framework le salta senza errori.

## Errori

- Un'estensione diretta di una famiglia in `XOTBASE_FAMILIES` fa fallire il test di architettura con il nome della classe; per le altre famiglie non c'è errore automatico.

## Non fa

- Non trasferisce la logica di dominio in Xot e non rende `mixed` una scorciatoia per evitare il tipo reale (ADR 0015).
