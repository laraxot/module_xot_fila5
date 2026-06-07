---
title: "Xot Module Wiki Index"
type: index
module: Xot
tags: [xot, wiki, index, xotbase, migrations, phpstan]
created: 2026-04-28
updated: 2026-06-05
qmd: "xot module wiki index XotBase migrations phpstan filament actions"
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/28"
discussions:
  - "https://github.com/laraxot/module_xot_fila5/discussions/29"
related:
  - ./concepts/migration-update-timestamps-only.md
  - ./concepts/module-model-artifact-parity.md
  - ./concepts/ai-harness-xot-discipline.md
  - ./concepts/second-brain-local-discipline.md
  - ../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md
  - ../../../../../docs/wiki/rules/wiki-markdown-frontmatter-mandatory.md
---

# Xot Module LLM Wiki

Indice operativo del wiki Xot (core framework).

## Struttura canonica (sacred)

- [module-directory-structure-rule.md](../module-directory-structure-rule.md) — regola cartelle modulo (PHP solo in `app/`)
- [concepts/](./concepts/): Pattern architetturali e metodologie Xot/Laraxot.
- [entities/](./entities/): Modelli e componenti chiave.
- [sources/](./sources/): Dati di ricerca e link esterni.
- [comparisons/](./comparisons/): Implementazioni alternative.
- [decisions/](./decisions/): ADL (Architectural Decision Log).
- [troubleshooting/](./troubleshooting/): Problemi noti e soluzioni.
- [_archive/](./_archive/): Documentazione legacy.
- [_templates/](./_templates/): Template standard.

## Regole collegate

- [ai-harness-xot-discipline.md](./concepts/ai-harness-xot-discipline.md) — harness agenti (canon moduli)
- [second-brain-local-discipline.md](./concepts/second-brain-local-discipline.md)
- [hackernoon-ai-coding-tips-fixcity-map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md) (root)
- [forbidden-folders-rule](../../../../docs/wiki/concepts/forbidden-folders.md): Vincoli strutturali strict.
- [llm-wiki-standard](../../../../docs/project/karpathy-llm-wiki-adoption.md): Mapping repository e ciclo di vita conoscenza.
- [laraxot-core](../../../../docs/wiki/concepts/laraxot-core.md): Core XotBase classes rules.
- [xotbase-check](../../../../docs/wiki/concepts/xotbase-check.md): Verify XotBase usage.

## Scopo Xot Module

Core framework Laraxot: XotBase classes, Actions, PHPStan Level 10, Filament integration, migrations, translations.

## Completamento piattaforma

- [overviews/platform-completion-roadmap.md](./overviews/platform-completion-roadmap.md) — **SSoT** roadmap 16 moduli + 4 temi (2026-06-13)
- [PHPSTAN-BEST-PRACTICES.md](./PHPSTAN-BEST-PRACTICES.md)

## Compiled Pages

| Pagina | Tipo | Argomento | Data |
|--------|------|-----------|------|
| [filament-widgets-domain-folder-naming](./concepts/filament-widgets-domain-folder-naming.md) | Concept | Widget: `Widgets\{Domain}\{Role}Widget` (mai `TicketViewWidget`) | 2026-06-03 |
| [ridondanze-cross-cutting-codebase](./concepts/ridondanze-cross-cutting-codebase.md) | Concept | DRY codebase + doc duplicazioni cross-moduli | 2026-05-21 |
| [policy-inheritance-boundary](../User/docs/wiki/concepts/policy-inheritance-boundary.md) | Decision | Cross-module | 2026-04-27 |
| [redundancy-catalog](./concepts/redundancy-catalog.md) | Concept | Indice ridondanza e link report trasversale | 2026-05-21 |
| [unit-test-case-pattern](./concepts/unit-test-case-pattern.md) | Concept | Test patterns | 2026-04-21 |
| [phpstan-cluster-map-and-false-friends](./concepts/phpstan-cluster-map-and-false-friends.md) | Concept | PHPStan cluster | 2026-04-23 |
| [phpstan-pest-bridge-discipline](./concepts/phpstan-pest-bridge-discipline.md) | Concept | Pest bridge/helper discipline for PHPStan | 2026-06-10 |
| [xotbasefield-calculated-view-rule](./concepts/xotbasefield-calculated-view-rule.md) | Concept | XotBaseField | 2026-04-23 |
| [policy-base-strategy](./concepts/policy-base-strategy.md) | Concept | Policy strategy | 2026-04-27 |
| [policy-module-matrix](./concepts/policy-module-matrix.md) | Concept | Policy matrix | 2026-04-27 |
| [laravel13-modular-package-compatibility-matrix](./concepts/laravel13-modular-package-compatibility-matrix.md) | Concept | Compatibilita' pacchetti modulo | 2026-04-28 |
| [module-model-artifact-parity](./concepts/module-model-artifact-parity.md) | Concept | N modelli owner = N migrate + factory + seeder; audit cross-modulo | 2026-06-05 |

## Best Practices

- Estendere sempre XotBase classes (vedi [xotbase-check](../../../../docs/wiki/concepts/xotbase-check.md))
- Usare Actions non Services (vedi [actions-over-services-governance](https://github.com/laraxot/base_fixcity_fila5/blob/main/.opencode/skills/actions-over-services-governance/SKILL.md))
- Implementare `casts()` method non `$casts` property (vedi [model-casts-phpstan](../../../../docs/wiki/concepts/model-casts-phpstan.md))
- PHPStan Level 10 enforcement (vedi [phpstan-level10](../../../../docs/wiki/concepts/phpstan-level10.md))
- Test PHPStan remediation: Pest resta Pest; bridge/helper condivisi solo quando riducono duplicazione cross-modulo.

## Bad Practices

- NON creare Service classes - usare Actions (vedi [actions-over-services-governance](https://github.com/laraxot/base_fixcity_fila5/blob/main/.opencode/skills/actions-over-services-governance/SKILL.md))
- NON usare `dehydrated(false)` nei trait - blocca salvataggio (vedi Geo CoordinatePicker fix)
- NON dichiarare `$view` statica in XotBaseField - si calcola via `GetViewByClassAction`

## False Friends

- `dehydrated(false)` sembra mantenere il campo nei dati ma blocca il salvataggio (vedi [coordinate-picker-filament5-save-pattern](../../Geo/docs/wiki/concepts/coordinate-picker-filament5-save-pattern.md))
- `live()` in Filament non rende il campo sempre live - serve `$applyStateBindingModifiers()` (vedi [coordinate-picker-state-binding-rule](../../Geo/docs/wiki/concepts/coordinate-picker-state-binding-rule.md))

## Troubleshooting

| Pagina | Tipo | Argomento |
|--------|------|-----------|
| [xotbasefield-calculated-view-rule](./concepts/xotbasefield-calculated-view-rule.md) | Concept | XotBaseField runtime |

Aggiornato: 2026-04-28
