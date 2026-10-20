---
title: "Decision log — Xot"
type: decision-log
module: Xot
status: active
created: 2026-10-16
updated: 2026-10-20
tags: [bmad, decision-log, xot, no-services, boy-scout]
qmd: "decision log xot"
related:
  - ../bmad-planning.md
  - ../bmad-brainstorming.md
  - ./project-context.md
---

# Decision log — Xot

## 2026-10-20 — Boy scout post-zero: census `Modules/*/app/Services`

- **Audit:** `rg --files -g '*Service.php' Modules/*/app/Services` → **0 file**; nessuna directory `app/Services/` sotto `Modules/*/app` né `Themes/*/app|src`. Zero `use …\Services\…` in PHP di produzione (solo ratchet `NoServicesTest`).
- **Stato domini (campione):** Fixcity — ex `WorkflowService` / `NotificationService` / `TicketService` **assenti**; vivo = Actions (`TransitionTicketStatusAction`, notify Actions, CRUD ticket Actions). Seo — ex `MetatagService` **assente**; vivo = `MetatagFacadeAdapter` + `Get/Replace/MergeMetatagDataAction`. Geo — già chiuso in [Geo decision-log](../../Geo/docs/bmad/decision-log.md).
- **Residuo merge:** `Modules/Seo/tests/Unit/Services/MetatagServiceExtendedTest.php.old` importava classe cancellata → **rimosso** (test orfano `.old`, non suite Pest).
- **Non fare ora:** migrazione massiva; eventuali riesumazioni da merge → delete-again + ratchet (vedi voce Services→Actions sotto).
- **Track:** [decisions/action-conversion.md](../decisions/action-conversion.md), [NoServicesTest.php](../../tests/Unit/Architecture/NoServicesTest.php).

## 2026-10-20 — `graphify-out/` obbligatorio in ogni `.gitignore` modulo/tema

- **Decisione:** ogni `laravel/Modules/*` e `laravel/Themes/*` (oltre a root / aggregatori) dichiara `graphify-out/` nel `.gitignore`. Se la cartella esisteva in index → `git rm --cached -rf` (working tree ok). **Mai** Git LFS.
- **Perche:** artefatto generato (graphify AST/JSON), riscritto a ogni update; commit = churn e tentazione LFS vietata. Non e' superficie Filament ([filament-blueprint](./filament-blueprint.md)).
- **Track:** [graphify-out-gitignore.md](./graphify-out-gitignore.md); regola [no-git-lfs](../../../../../bashscripts/ai/wiki/rules/no-git-lfs.md). Job/Lang: rimossi dall'indice path `docs/graphify/graphify-out/**` (story `*graphify-out*.story.md` restano tracciate).

## 2026-10-20 — PHPStan `Modules` a zero senza conferma (ordine permanente)

- **Decisione:** ogni turn non banale con qualita' in scope esegue `cd laravel && ./vendor/bin/phpstan analyse Modules` verso zero **senza chiedere conferma**; fix alla sorgente (scopo → chiamanti → causa), poi catena swarm → BMAD → docs → prompt → boy scout.
- **Perche:** un solo misuratore (`laravel/phpstan.neon`, solo umano) vale per CI e swarm; fermarsi al primo "0" o chiedere "procedo?" lascia debito e falsifica lo stato tra sessioni parallele.
- **Track:** prompt [11-phpstan.md](../../../../../bashscripts/docs/prompts/11-phpstan.md), [00-start.md](../../../../../bashscripts/docs/prompts/00-start.md#ordine-permanente-dellutente); memoria [phpstan-modules-zero-standing-order](../wiki/memories/phpstan-modules-zero-standing-order.md); wave [phpstan-modules-zero-wave3](../stories/phpstan-modules-zero-wave3.story.md).

## 2026-10-20 — Services → Queueable Actions (chiusura wave)

- **Decisione:** i `*Service` applicativi sotto `Modules/*/app` sono eliminati; la logica vive in Spatie QueueableAction (`execute()`). `ProfileTest.php` in Services e' **GONE**. `Translators/*` e `Trend/Adapters/*` sotto Services sono **zombie delete-again** (decisione DELETE di [xot-small](../stories/services-to-actions-xot-small.story.md) 2026-10-08): **mai relocate**; vivo = `Actions\Translation\*TranslateAction` + `BuildTrendCollectionAction`. Se un merge li riesuma → delete di nuovo.
- **Perche:** religione [no-services-rule](../../../../../bashscripts/ai/wiki/rules/no-services-rule.md) — un use-case = una Action tipizzata/accodabile; i Service riesumati dal merge erano copie morte. Filament continua a chiamare solo Actions ([filament-blueprint](./filament-blueprint.md), [services-to-queueable-actions-filament-blueprint](./services-to-queueable-actions-filament-blueprint.md)).
- **Track:** story [services-to-actions-global-wave](../stories/services-to-actions-global-wave.story.md); boy scout [phpstan-modules-zero-wave3](../stories/phpstan-modules-zero-wave3.story.md); brainstorm [brainstorming-services-to-actions-wave](./brainstorming-services-to-actions-wave.md).
- **Prossimo:** ratchet anti-riesumazione; delete-again se Translators/Trend riappaiono.

## 2026-10-19 — Il modello della migration sta nel nome file

- **Decisione:** su `*_create_{modello}_table.php` non si scrive `$model_class`.
  `XotBaseMigration::getModelClass()` prende il modello da `_create_` … `_table.php`
  e il modulo dal path (`Modules\{Modulo}\Models\{Modello}`).
- **Perche:** la riga esplicita duplica un contratto che il file ha gia'.
  `$model_class` resta solo quando il nome file non segue quel contratto.

## 2026-10-16 — Kit BMAD owner

- **Decisione:** adottare `docs/bmad-planning.md` + `docs/bmad-brainstorming.md` + `docs/bmad/filament-blueprint.md` come SSoT di planning per questo owner.
- **Perche:** rimuovere stub copiati "Ticket Timeline" non pertinenti; allineare second brain e Filament blueprint allo scopo reale.
- **Track:** `bmad-method`
