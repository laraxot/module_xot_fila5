---
title: "Decision log — Xot"
type: decision-log
module: Xot
status: active
created: 2026-10-16
updated: 2026-10-16
tags: [bmad, decision-log, xot]
qmd: "decision log xot"
related:
  - ../bmad-planning.md
  - ../bmad-brainstorming.md
  - ./project-context.md
---

# Decision log — Xot

## 2026-10-20 — Services → Queueable Actions (chiusura wave)

- **Decisione:** i `*Service` applicativi sotto `Modules/*/app` sono eliminati; la logica vive in Spatie QueueableAction (`execute()`). `ProfileTest.php` in Services e' **GONE**. `Translators/*` e `Trend/Adapters/*` sotto Services sono **zombie delete-again** (decisione DELETE di [xot-small](../stories/services-to-actions-xot-small.story.md) 2026-10-08): **mai relocate**; vivo = `Actions\Translation\*TranslateAction` + `BuildTrendCollectionAction`. Se un merge li riesuma → delete di nuovo.
- **Perche:** religione [no-services-rule](../../../../../bashscripts/ai/wiki/rules/no-services-rule.md) — un use-case = una Action tipizzata/accodabile; i Service riesumati dal merge erano copie morte. Filament continua a chiamare solo Actions ([filament-blueprint](./filament-blueprint.md), [services-to-queueable-actions-filament-blueprint](./services-to-queueable-actions-filament-blueprint.md)).
- **Track:** story [services-to-actions-global-wave](../stories/services-to-actions-global-wave.story.md); boy scout [phpstan-modules-zero-wave3](../stories/phpstan-modules-zero-wave3.story.md); brainstorm [brainstorming-services-to-actions-wave](./brainstorming-services-to-actions-wave.md).
- **Prossimo:** ratchet anti-riesumazione; delete-again se Translators/Trend riappaiono.

## 2026-10-16 — Kit BMAD owner

- **Decisione:** adottare `docs/bmad-planning.md` + `docs/bmad-brainstorming.md` + `docs/bmad/filament-blueprint.md` come SSoT di planning per questo owner.
- **Perche:** rimuovere stub copiati "Ticket Timeline" non pertinenti; allineare second brain e Filament blueprint allo scopo reale.
- **Track:** `bmad-method`
