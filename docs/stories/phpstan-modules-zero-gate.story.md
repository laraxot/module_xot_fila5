---
title: PHPStan Modules zero — quality gate (Services + NotificationManager)
type: story
module: Xot
status: done
created: 2026-10-20
updated: 2026-10-25
tags: [phpstan, quality-gate, no-services, notificationmanager, translators, trend, composer, vendor]
qmd: "phpstan modules zero gate services translators trend notificationmanager execute typed composer vendor coherence app_env testing filament blueprint"
related:
  - ./phpstan-modules-zero-wave3.story.md
  - ./test-database-guard.story.md
  - ./services-to-actions-global-wave.story.md
  - ./services-to-actions-xot-small.story.md
  - ../../Notify/docs/stories/phpstan-notificationmanager-service-removed.story.md
  - ../../Notify/docs/stories/services-to-actions-notify.story.md
  - ../bmad/brainstorming-services-to-actions-wave.md
  - ../../../../../bashscripts/docs/prompts/11-phpstan.md
  - ../../../../../bashscripts/ai/wiki/rules/no-services-rule.md
---

# PHPStan Modules: quality gate a zero

## Perche'

Il gate statico su `Modules/` e' verde solo se (1) PHPStan non regredisce,
(2) nessun `*Service.php` applicativo riesumato da merge, (3) i casi d'uso
Notify restano su Actions tipizzate. Questa story e' il **checkpoint riproducibile**
post-wave delete (quality guardian).

## Comando riproducibile

```bash
cd laravel

# Prerequisito ambiente (Larastan boota l'app): senza chiave il run muore con
# "Internal error: No application encryption key has been specified" e il json
# contiene 1 solo `errors`, non un inventario. Su un checkout senza `.env`:
#   APP_ENV=testing sfrutta `.env.testing` (APP_KEY placeholder + DB *_test).
# Non creare `.env`: il gate deve restare riproducibile e fuori dal repo.

# Gate primario (obbligatorio: json totals + exit 0)
APP_ENV=testing ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress --error-format=json \
  > /tmp/phpstan_modules_zero_gate.json 2>/tmp/phpstan_modules_zero_gate.err

# Controprova umana
APP_ENV=testing ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress

# Anti-riesumazione Services applicativi
find Modules -path '*/app/Services/*' -name '*Service.php'
# atteso: vuoto (falso positivo noto: User/.../TermsOfService.php Livewire, fuori da app/Services)

# Residui PHP sotto Services
find Modules -path '*/app/Services/*' -name '*.php'
# atteso: vuoto
```

## Acceptance

### Rimisura 2026-10-25 — vendor incoerente, sei famiglie chiuse alla radice

Sessione partita da un vendor incoerente (`composer.lock` riscritto: Filament v5.10.3,
Laravel 13.38.0, spatie/laravel-permission 8.3.2, phpstan 2.3.2 + Larastan) e da
**30 `file_errors`** su `analyse Modules`. Chiusura: 0 errori, nessun ignore aggiunto,
nessuna baseline, `phpstan.neon` intatto.

| Check | Criterio | Esito |
|-------|----------|-------|
| JSON `totals.errors` / `file_errors` | 0 / 0 | OK (`{"totals":{"errors":0,"file_errors":0},"files":{},"errors":[]}`) |
| Exit code `analyse Modules` | 0 | OK |
| Banner umano | `[OK] No errors` | OK (dopo Pint, per escludere che il formatter mascherasse) |
| Ignore nuovi nel neon | 0 | OK |
| `TestDatabaseGuard` | presente + 4 test verdi | OK |

Le sei famiglie e la loro radice stanno nella tabella di
[phpstan-status](../bmad/phpstan-status.md#misura-2026-10-25--verde-dopo-la-coerenza-vendor-pint-incluso);
qui resta il perché di ogni scelta non ovvia:

- **`filament/blueprint` rimosso** da `laravel/composer.json` (con il repository privato
  `packages.filamentphp.com`): il repo risponde 401, il pacchetto è 404 su Packagist e il
  codice lo cita zero volte. Il contratto Filament del repo resta quello scritto a mano in
  `Modules/<M>/docs/bmad/filament-blueprint.md`, come già dice
  [epic-code-quality-ratchet](../bmad/epic-code-quality-ratchet.md).
- **`config/app.php`**: unica modifica reale la rimozione di
  `Illuminate\Image\ImageServiceProvider::class`, provider inesistente; il filtro
  `class_exists` provvisorio è stato tolto perché mascherava, non curava.
- **`TestDatabaseGuard` ricreato, non cancellato**: la story
  [test-database-guard](./test-database-guard.story.md) lo dava per implementato ma il file
  non era né su disco né nella storia git, mentre il call site in
  `tests/CreatesApplication.php` lo invocava. Si è ricostruito il contratto documentato
  (guardia dati sacri: ambiente `testing` + DB `*_test`) invece di rimuovere la guardia.
- **`APP_ENV=testing` è un prerequisito del gate**, non un trucco: senza `.env`, Larastan
  muore con `No application encryption key has been specified` e il json contiene un solo
  `errors`, che si legge come "pulito" se non si guardano i totali.

### Rimisura 2026-10-22 (ordine permanente)

| Check | Criterio | Esito |
|-------|----------|-------|
| JSON `totals.errors` | 0 | OK |
| JSON `totals.file_errors` | 0 | OK |
| Exit code `analyse Modules` | 0 | OK |
| Banner umano | `[OK] No errors` | OK |
| `*.php` sotto `*/app/Services/*` | nessuno | OK |
| Boy scout docs | 184 duplicati case/data rimossi; 0 collisioni `readme`/`INDEX` residue | OK |

### Checkpoint storico 2026-10-20

| Check | Criterio | Esito |
|-------|----------|-------|
| JSON `totals.errors` | 0 | OK (`/tmp/phpstan_modules_zero_gate.json`, 62 byte) |
| JSON `totals.file_errors` | 0 | OK |
| JSON `files` | `{}` | OK |
| Exit code analyse Modules | 0 | OK |
| Banner umano | `[OK] No errors` | OK |
| `*Service.php` sotto `*/app/Services/*` | nessuno | OK |
| `*.php` sotto `*/app/Services/*` | nessuno | OK |
| Notify `Services/NotificationManager` | assente (solo `.gitkeep`) | OK |
| `Actions\NotificationManager::execute()` | tipizzato `Model`, `string`, `array<string,mixed>`, `list<string>`, `array<string,mixed>` → `?Notification` | OK |
| Spot PHPStan | `NotificationManager.php` → `[OK]` | OK |

Controprova: **entrambi** json con `totals` e banner `[OK]` — un json vuoto/troncato non conta ([11-phpstan.md](../../../../../bashscripts/docs/prompts/11-phpstan.md)).

## Stato Services (scopo)

Religione: un caso d'uso = una Action Spatie con `execute()`; niente Service applicativo.
I `*Service.php` riesumati dal merge erano copie morte → **delete-or-retarget**, mai tipizzare lo zombie.

| Path | Ruolo | Decisione |
|------|-------|-----------|
| `Modules/*/app/Services/*Service.php` | applicativo | **assenti** (gate) |
| `Notify/app/Services/` | directory | solo `.gitkeep` |
| `Xot/app/Services/ProfileTest.php` | stub spurio (0 caller) | **GONE** |
| `Xot/app/Services/Translators/*` | stub merge-zombie (0 caller) | **DELETE** / delete-again (non relocate; vivo = `Actions\Translation\*TranslateAction`) |
| `Xot/app/Services/Trend/Adapters/*` | copia morta (0 caller) | **DELETE** / delete-again (vivo = `BuildTrendCollectionAction` + vendor Flowframe) |
| `Xot/app/Services/*.{bak,no,test}` | detriti | non PHPStan; cleanup opzionale |
| `User/.../TermsOfService.php` | Livewire | skip intenzionale |

## Translators + Trend: delete-again (mai relocate)

Durante il pass i file esistevano ancora sotto `Services/` con zero chiamanti.
Allineamento a [xot-small](./services-to-actions-xot-small.story.md) e [global-wave](./services-to-actions-global-wave.story.md): **DELETE**, non relocate.
Stato disco post-pass: `Translators/` e `Trend/` e `ProfileTest` assenti; se un merge li riesuma → `rg` a zero → delete di nuovo.

## NotificationManager (Notify)

Canonico: `Modules\Notify\Actions\NotificationManager`.
`execute()` e' l'entry Spatie QueueableAction e delega a `send()` con gli stessi tipi generici.
Story fix: [phpstan-notificationmanager-service-removed](../../Notify/docs/stories/phpstan-notificationmanager-service-removed.story.md).

## Cosa non e'

Questo gate **non** chiude ratchet anti-merge ne' junk non-PHP.
Chiude: PHPStan Modules = 0 + zero PHP sotto `app/Services` + Action Notify tipizzata.

## GitHub (tracciamento)

- [laraxot/base_fixcity_fila5#352](https://github.com/laraxot/base_fixcity_fila5/issues/352) —
  «PHPStan Modules — regression», issue viva del gate: qui va il commento con ogni rimisura
  (ultima: 2026-10-25, 30 -> 0 `file_errors`).
- [laraxot/base_fixcity_fila5#345](https://github.com/laraxot/base_fixcity_fila5/issues/345) —
  hub Pest, per la parte eseguibile della suite.
