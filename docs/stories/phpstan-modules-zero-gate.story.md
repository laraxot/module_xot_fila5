---
title: PHPStan Modules zero — quality gate (Services + NotificationManager)
type: story
module: Xot
status: done
created: 2026-10-20
updated: 2026-10-22
tags: [phpstan, quality-gate, no-services, notificationmanager, translators, trend]
qmd: "phpstan modules zero gate services translators trend notificationmanager execute typed"
related:
  - ./phpstan-modules-zero-wave3.story.md
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

# Gate primario (obbligatorio: json totals + exit 0)
./vendor/bin/phpstan analyse Modules --memory-limit=2G --no-progress --error-format=json \
  > /tmp/phpstan_modules_zero_gate.json 2>/tmp/phpstan_modules_zero_gate.err

# Controprova umana
./vendor/bin/phpstan analyse Modules --memory-limit=2G --no-progress

# Anti-riesumazione Services applicativi
find Modules -path '*/app/Services/*' -name '*Service.php'
# atteso: vuoto (falso positivo noto: User/.../TermsOfService.php Livewire, fuori da app/Services)

# Residui PHP sotto Services
find Modules -path '*/app/Services/*' -name '*.php'
# atteso: vuoto
```

## Acceptance

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
