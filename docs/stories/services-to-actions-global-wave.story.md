---
title: Wave globale Services verso Spatie Queueable Actions
type: story
module: Xot
status: in-progress
priority: high
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, services, queueable-action, planning, filament-blueprint]
qmd: "services to actions global wave tenant geo xot notify zombies trend translators ratchet delete"
related:
  - ../bmad/brainstorming-services-to-actions-wave.md
  - ../bmad/filament-blueprint.md
  - ../bmad/services-to-queueable-actions-architecture.md
  - ../bmad/services-to-queueable-actions-filament-blueprint.md
  - ../bmad/services-to-queueable-actions-objective.md
  - ./services-to-actions-xot-small.story.md
  - ./phpstan-modules-zero-wave3.story.md
  - ./phpstan-modules-zero-gate.story.md
  - ../../Notify/docs/stories/services-to-actions-notify.story.md
  - ../../Notify/docs/stories/phpstan-notificationmanager-service-removed.story.md
  - ../../Tenant/docs/stories/services-to-actions-tenant.story.md
  - ../../../../../bashscripts/docs/prompts/25-services-to-actions.md
  - ../../../../../bashscripts/ai/wiki/rules/no-services-rule.md
---

# Wave globale: Services → Queueable Actions

Fase BMAD: **planning** (brainstorm aggiornato) → ready-for-dev.
Brainstorm: [brainstorming-services-to-actions-wave.md](../bmad/brainstorming-services-to-actions-wave.md).

## Perche'

Regola religione: niente Service applicativi; un caso d'uso = una Action Spatie
con `execute()`. I residui attuali sono quasi sempre **copie riesumate dal merge**
di Actions gia' esistenti: convertire a tappeto duplica; la procedura e'
**cerca Action → retarget chiamanti → delete Service**.

## Stato misurato (disco vivo, 2026-10-20 post-PHPStan Modules zero)

| Cluster | Stato | Prossimo passo |
|---------|-------|----------------|
| Notify / Tenant / Xot / Lang / Media / Job / AI `*Service` applicativi | **GONE** | chiuso (vedi verifica sotto) |
| Geo `BaseGeoService`, `GeoDataService`, `GeoDataValidator`, `GeoService`, `GoogleMapsService` | **PRESENT: 5 PHP, staged additions** | verificare Action successore, caller e test; poi migrare e rimuovere |
| Notify `Services/NotificationManager` | **GONE** | vivo = `Actions\NotificationManager` tipizzato ([story](../../Notify/docs/stories/phpstan-notificationmanager-service-removed.story.md)) |
| Xot `Services/ProfileTest.php` | **GONE** | eliminato questa sessione (stub spurio, 0 caller) |
| Xot `Services/Translators/*` + `Services/Trend/Adapters/*` | **zombie delete-again** | **DELETE** (mai relocate): gia' deciso in [xot-small](./services-to-actions-xot-small.story.md); Actions vive = `Actions\Translation\*TranslateAction` + `Actions\Trend\BuildTrendCollectionAction`. Se un merge li riesuma → `rg` a zero → delete di nuovo |
| `TermsOfService` Livewire | ritirato W0 REUSE | n/a |

## Ordine di chiusura residua

1. **Geo presenti nello staging** — verificare successori, caller dinamici, provider, config e test; non ricreare Actions duplicate.
2. **Translators + Trend sotto `Xot/app/Services/`** — se presenti: **delete** (non relocate). Zero caller produzione; Trend e' gia' nel vendor Flowframe + `BuildTrendCollectionAction`; Translators erano stub.
3. Delete detriti non-PHP (`*.bak`, `*.no`, `*.test`, `FileService.ot_action`, `.gitkeep`, …) in Services quando sicuro.
4. Ratchet arch/pest: **fatto** in `laravel/tests/Architecture/ModulesArchitectureTest.php`; deve vietare ogni directory `Modules/*/app/Services`, non solo i file `*Service.php`.
5. Gate: [phpstan-modules-zero-gate](./phpstan-modules-zero-gate.story.md); `find Modules -type d -path '*/app/Services'` e `find Modules -type f -path '*/app/Services/*'` devono essere vuoti.

## Filament

Ogni modulo owner: [filament-blueprint](../bmad/filament-blueprint.md) — form/page
chiamano Actions, mai Service. Cms Appearance/Breadcrumb e' il canarino Tenant.

## Acceptance

- [ ] Zero directory `Modules/*/app/Services` (Geo contiene ancora cinque PHP)
- [ ] Zero `*Service.php` applicativi sotto `Modules/*/app` dopo la verifica dei deletion diff
- [ ] Zero file residui sotto `app/Services` (inclusi detriti non-PHP)
- [x] Caller Filament/Data su Actions (Tenant canary = commenti `Was:` + `SaveTenantConfigAction` / `GetTenantConfigArrayAction`)
- [x] Ratchet anti-riesumazione presente (`laravel/tests/Architecture/ModulesArchitectureTest.php`: vietati `Modules/*/app/Services/**/*Service.php` + ban globale `*Service.php` applicativi; allowlist vuota post W0)
- [x] PHPStan perimetro toccato a 0 (`analyse Modules` file_errors 0, 2026-10-20); story per-modulo aggiornate
- [x] Docs indice modulo linkano questa wave / brainstorm
- [x] `ProfileTest.php` in Services **GONE**
- [x] Translators/Trend Services: assenti sul disco vivo (policy delete-again se merge riesuma)

## Verifica 2026-10-20 (wave delete/retarget)

**Perche'**: i `*Service.php` riesumati dal pull erano copie morte di Actions gia' presenti; tenerli viola no-services e rischia doppia logica.

| Cluster | Esito |
|---------|--------|
| Notify `SmsService` + `Services/NotificationManager` | **GONE**; canonico `Actions\NotificationManager::execute()` tipizzato |
| Geo 5 Services | presenti nel filesystem e nello staging; successori e caller da verificare |
| Tenant `TenantService` + `Services/Config/**` | **deleted**; chiamanti vivi = 0 |
| Xot 9 Services | **deleted**; retarget: `Helpers/Helper.php` → `GetAllModelsByModuleNameAction` |
| Xot `ProfileTest.php` | **GONE** (sessione corrente) |
| Xot Translators/Trend Services | policy **DELETE** (zombie merge); Actions gia' presenti — non relocate |

Residuo `*Service.php` applicativo in Modules: Geo ne contiene ancora 5; la regola finale è più forte: **zero directory `app/Services`**.

### Re-delete merge-zombie (stessa sessione, dopo wave4 PHPStan)

| Residuo | Perche' esisteva | Esito |
|---------|------------------|-------|
| `Services/Translators/*` | stub mai chiamati; vivo = `Actions/Translation/*` | deleted |
| `Services/Trend/Adapters/*` | terza copia; vivo = Flowframe + `Actions/Trend/*` | deleted |
| `Services/ProfileTest.php` | stub `isSuperAdmin(): true` | deleted |
| `FileService.ot_action` + `bashscripts/` + `cacheservice.md` sotto Services | bozza / pollution | deleted (tracciati); `RouteService.php.bak` untracked **non** cancellato |
