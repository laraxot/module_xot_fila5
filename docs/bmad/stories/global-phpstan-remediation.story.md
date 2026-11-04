---
title: "PHPStan globale: analizzare Modules e correggere le cause"
status: in-progress
module: Xot (coordinamento), tutti i moduli coinvolti (owner dei fix)
created: 2026-11-04
updated: 2026-11-04
type: story
qmd: "PHPStan analyse Modules zero errori cause radice swarm scope disgiunti source first"
related:
  - ../../stories/base-setting-page.story.md
  - ./setting-page-tutti-i-moduli.story.md
---

# PHPStan globale: analizzare Modules e correggere le cause

## Intento

Eseguire il comando canonico `cd laravel && ./vendor/bin/phpstan analyse Modules`, ricostruire
lo scopo del codice per ogni famiglia di segnalazioni e portare l'analisi completa a zero,
senza ignorare errori o alterare la configurazione PHPStan.

## Vincoli

- Prima verificare vendor, sintassi e bootstrap; un fatal rende il report incompleto.
- Clusterizzare il JSON per identificatore e causa radice; delegare owner e file disgiunti.
- Ogni lane opera dentro story BMAD del modulo owner e lock per ogni file.
- Tipi precisi; `mixed` solo dopo aver escluso shape, generics, Data e union.
- Pest per le modifiche e gate PHPStan globale finale; niente DB distruttivo.

## Claim

| Owner | Scope | Stato |
|---|---|---|
| `/root` | Baseline, clustering, coordinamento, integrazione e verifica globale | in progress |
| `/root/activity_table_fix` | Activity: override di hook tabella che bloccano bootstrap | in progress |
| `/root/prompt_audit` | Inventario e miglioramento dei prompt in `bashscripts/docs/prompts/` | in progress |

## Acceptance criteria

- [ ] `php artisan --version` e PHPStan completano il bootstrap.
- [ ] `./vendor/bin/phpstan analyse Modules` termina exit 0 con `totals.errors = 0`.
- [ ] Ogni causa corretta e' descritta nella story owner con verifica reale.
- [ ] Nessun ignore, baseline, cast o `mixed` usato per silenziare.
- [ ] Aggiornati second brain e prompt riutilizzabili sulla base delle cause incontrate.

## Stato

Il gate iniziale va eseguito dopo il ripristino del bootstrap Pest/PHPStan. Il worktree contiene
una modifica a `Activity/Filament/Resources/SnapshotResource/Pages/ListSnapshots.php` che
ridefinisce un hook `final` della base Xot; la correzione e' tracciata nella story Activity
collegata alla story SettingPage.
