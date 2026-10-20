---
title: PHPStan Modules a zero — wave3 verificata
type: story
module: Xot
status: done
created: 2026-10-20
updated: 2026-10-20
tags: [phpstan, quality-gate, swarm, zero]
qmd: "phpstan modules zero wave3 ok no errors json totals boy scout profiletest translators trend zombies"
related:
  - ../bmad/phpstan-status.md
  - ./phpstan-test-wave-regression.story.md
  - ./phpstan-modules-zero-gate.story.md
  - ./services-to-actions-global-wave.story.md
  - ./services-to-actions-xot-small.story.md
  - ../bmad/stories/livewire-to-filament-widgets-fleet.story.md
  - ../bmad/brainstorming-services-to-actions-wave.md
  - ../../Notify/docs/stories/phpstan-notificationmanager-service-removed.story.md
  - ../../../../../bashscripts/docs/prompts/11-phpstan.md
  - ../../../../../bashscripts/docs/prompts/00-start.md
---

# PHPStan Modules: zero errori (wave3)

## Misura

Comando canonico (coordinatore):

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=2G --no-progress --error-format=json
```

| Check | Esito |
|-------|-------|
| JSON `totals.errors` | 0 |
| JSON `totals.file_errors` | 0 |
| `files` | `{}` |
| Output umano | `[OK] No errors` |
| Exit code | 0 |

Artefatti: `/tmp/phpstan_wave3.json` (62 byte), `/tmp/phpstan_wave3_human.txt`.
Rimisura 2026-10-20 ~11:58: `/tmp/phpstan_perm_115824.json` — `file_errors` 0, `errors` 0, exit 0, banner `[OK] No errors`.
Rimisura ~12:10: `/tmp/phpstan_ord_121026.json` — stesso esito (config `laravel/phpstan.neon` only).

Rimisura 2026-10-20 dopo la wave di conflitti PHP: `./vendor/bin/phpstan analyse Modules --memory-limit=2G --no-progress` ha restituito `[OK] No errors`, exit `0`. Il run senza limite esplicito è stato interrotto dal kernel con `SIGKILL` durante la parallelizzazione: è un limite operativo di memoria/concorrenza, non una segnalazione PHPStan del codice. La verifica ripetibile usa comunque la configurazione centrale `laravel/phpstan.neon`, senza introdurre altri `.neon`.

Controprova obbligatoria: **entrambi** json con `totals` e banner `[OK]` — un json vuoto/troncato non conta come vittoria ([11-phpstan.md](../../../../../bashscripts/docs/prompts/11-phpstan.md)).

<!-- gateguard: append measure to existing wave3 story; linked from 00-INDEX/00-start; user permanent order phpstan+swarm+docs -->

## Cosa significa

<!--
GateGuard facts:
1. Same wave3 story topic — one-line single-neon reminder; no new story.
2. Linked from Zero README, Lang/Cms/Notify 00-INDEX, 11-phpstan.
3. Edit existing BMAD/story file optional per mission.
4. User: "devi utilizzare laravel/phpstan.neon e solo io posso modificarlo, non puoi creare altri .neon"
-->

Il gate statico su `Modules/` e' verde (sempre con **solo** `laravel/phpstan.neon` — [single-neon](../wiki/memories/phpstan-single-neon-config.md)). Non significa fine lavoro di qualita': continua
boy scout (anti-merge Services, Livewire W0 REUSE, docs, prompt). Hub:
[services-to-actions-global-wave](./services-to-actions-global-wave.story.md),
[livewire fleet](../bmad/stories/livewire-to-filament-widgets-fleet.story.md).

## Boy scout post-zero

1. Geo: eliminati 5 `*Service` riesumati; Notify `SmsService` + `Services/NotificationManager` eliminati (vivo = `Actions\NotificationManager` tipizzato).
2. Limesurvey: orphan `LimeTokens*` bonificati; `LimeSurvey::answers()` guardia count (PHP 8+).
3. Lang: `TestCase::makeLangServiceProvider(): LangServiceProvider` SSoT; test con FQCN (non helper locale nel file test).
4. Remeasure: json `totals` 0/0 + `[OK]` (anche `/tmp/phpstan_perm_115824.json`).
5. Xot `Services/ProfileTest` + `Translators/*` + `Trend/Adapters/*`: **GONE** (re-delete merge-zombie); se merge li riporta → delete di nuovo.
6. Prossimo: W0 Livewire `REUSE` (UI/Lang/legal twins) — [fleet](../bmad/stories/livewire-to-filament-widgets-fleet.story.md).

## Gate vivo

Numeri e ratchet successivi (Livewire fleet, remeasure): [phpstan-status](../bmad/phpstan-status.md).
