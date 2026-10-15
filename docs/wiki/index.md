---
title: "Xot Module Wiki Index"
type: index
module: Xot
tags: [xot, wiki, index, xotbase, migrations, phpstan]
created: 2026-04-28
updated: 2026-07-24
qmd: "xot module wiki index XotBase migrations phpstan filament actions pest domain ownership"
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/28"
discussions:
  - "https://github.com/laraxot/module_xot_fila5/discussions/29"
related:
  - ./concepts/migration-update-timestamps-only.md  # target mancante, verificato 2026-10-14
  - ./concepts/module-model-artifact-parity.md  # target mancante, verificato 2026-10-14
  - ./concepts/ai-harness-xot-discipline.md  # target mancante, verificato 2026-10-14
  - ./concepts/second-brain-local-discipline.md  # target mancante, verificato 2026-10-14
  - ./concepts/no-domain-actions-in-xot.md  # target mancante, verificato 2026-10-14
  - ./rules/module-testcase-xotbase-hierarchy.md  # target mancante, verificato 2026-10-14
  - ../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md
  - ../../../../../docs/wiki/rules/wiki-markdown-frontmatter-mandatory.md
  - ../../../../../docs/wiki/rules/domain-actions-belong-to-domain-module.md
status: draft
---

# Xot Module LLM Wiki

## Boundaries (2026-07-24)

- [no-domain-actions-in-xot](./concepts/no-domain-actions-in-xot.md) _(target mancante, verificato 2026-10-14)_ — niente `Actions/AI|Geo|…`
- Raw: [no-domain-logic-in-xot.md](../no-domain-logic-in-xot.md) _(target mancante, verificato 2026-10-14)_
- AI owner: [ollama-actions-ownership](../../../AI/docs/wiki/concepts/ollama-actions-ownership.md)

Indice operativo del wiki Xot (core framework).

## Struttura canonica (sacred)

- [module-directory-structure-rule.md](../module-directory-structure-rule.md) _(target mancante, verificato 2026-10-14)_ — regola cartelle modulo (PHP solo in `app/`)
- [concepts/](./concepts/): Pattern architetturali e metodologie Xot/Laraxot.
- [entities/](./entities/): Modelli e componenti chiave.
- [sources/](./sources/) _(target mancante, verificato 2026-10-14)_: Dati di ricerca e link esterni.
- [comparisons/](./comparisons/): Implementazioni alternative.
- [decisions/](./decisions/): ADL (Architectural Decision Log).
- [troubleshooting/](./troubleshooting/): Problemi noti e soluzioni.
- [_archive/](./_archive/) _(target mancante, verificato 2026-10-14)_: Documentazione legacy.
- [_templates/](./_templates/) _(target mancante, verificato 2026-10-14)_: Template standard.

## Regole collegate

- [ai-harness-xot-discipline.md](./concepts/ai-harness-xot-discipline.md) _(target mancante, verificato 2026-10-14)_ — harness agenti (canon moduli)
- [module-testcase-xotbase-hierarchy.md](./rules/module-testcase-xotbase-hierarchy.md) _(target mancante, verificato 2026-10-14)_ — TestCase dei moduli estendono `XotBaseTestCase`; nWidart Tests e' dev-only nel package installato
- [composer-root-skeleton-modular.md](./concepts/composer-root-skeleton-modular.md) _(target mancante, verificato 2026-10-14)_ — root Composer minimo, merge solo `Modules/*/composer.json`
- [pest-global-class-imports.md](./rules/pest-global-class-imports.md) _(target mancante, verificato 2026-10-14)_ — nei test senza namespace rimuovere `use ReflectionClass;` e altre import globali inutili
- [second-brain-local-discipline.md](./concepts/second-brain-local-discipline.md) _(target mancante, verificato 2026-10-14)_
- [hackernoon-ai-coding-tips-fixcity-map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md) (root)
- [forbidden-folders-rule](../../../../../docs/wiki/concepts/forbidden-folders.md): Vincoli strutturali strict.
- [llm-wiki-standard](../../../../../docs/project/karpathy-llm-wiki-adoption.md): Mapping repository e ciclo di vita conoscenza.
- [laraxot-core](../../../../docs/wiki/concepts/laraxot-core.md) _(target mancante, verificato 2026-10-14)_: Core XotBase classes rules.
- [xotbase-check](../../../../docs/wiki/concepts/xotbase-check.md) _(target mancante, verificato 2026-10-14)_: Verify XotBase usage.

## Scopo Xot Module

Core framework Laraxot: XotBase classes, Actions, PHPStan Level 10, Filament integration, migrations, translations.

## Completamento piattaforma

- [overviews/platform-completion-roadmap.md](./overviews/platform-completion-roadmap.md) _(target mancante, verificato 2026-10-14)_ — **SSoT** roadmap 16 moduli + 4 temi (2026-06-13)
- [phpstan-best-practices.md](./phpstan-best-practices.md) _(target mancante, verificato 2026-10-14)_

## Compiled Pages

| Pagina | Tipo | Argomento | Data |
|--------|------|-----------|------|
| [platform-completion-roadmap](./overviews/platform-completion-roadmap.md) _(target mancante, verificato 2026-10-14)_ | Overview | Hub completamento progetto Fixcity | 2026-06-13 |
| [phpstan-best-practices](./phpstan-best-practices.md) _(target mancante, verificato 2026-10-14)_ | Guideline | Pattern test PHPStan L10 | 2026-06-13 |
| [ridondanze-cross-cutting-codebase](./concepts/ridondanze-cross-cutting-codebase.md) _(target mancante, verificato 2026-10-14)_ | Concept | DRY codebase + doc duplicazioni cross-moduli | 2026-05-21 |
| [policy-inheritance-boundary](../../../User/docs/wiki/concepts/policy-inheritance-boundary.md) | Decision | Cross-module | 2026-04-27 |
| [redundancy-catalog](./concepts/redundancy-catalog.md) _(target mancante, verificato 2026-10-14)_ | Concept | Indice ridondanza e link report trasversale | 2026-05-21 |
| [unit-test-case-pattern](./concepts/unit-test-case-pattern.md) _(target mancante, verificato 2026-10-14)_ | Concept | Test patterns | 2026-04-21 |
| [phpstan-cluster-map-and-false-friends](./concepts/phpstan-cluster-map-and-false-friends.md) _(target mancante, verificato 2026-10-14)_ | Concept | PHPStan cluster | 2026-04-23 |
| [phpstan-pest-bridge-discipline](./concepts/phpstan-pest-bridge-discipline.md) _(target mancante, verificato 2026-10-14)_ | Concept | Pest bridge/helper discipline for PHPStan | 2026-06-10 |
| [xotbasefield-calculated-view-rule](./concepts/xotbasefield-calculated-view-rule.md) _(target mancante, verificato 2026-10-14)_ | Concept | XotBaseField | 2026-04-23 |
| [policy-base-strategy](./concepts/policy-base-strategy.md) _(target mancante, verificato 2026-10-14)_ | Concept | Policy strategy | 2026-04-27 |
| [policy-module-matrix](./concepts/policy-module-matrix.md) _(target mancante, verificato 2026-10-14)_ | Concept | Policy matrix | 2026-04-27 |
| [laravel13-modular-package-compatibility-matrix](./concepts/laravel13-modular-package-compatibility-matrix.md) _(target mancante, verificato 2026-10-14)_ | Concept | Compatibilita' pacchetti modulo | 2026-04-28 |
| [module-config-php-religion](./concepts/module-config-php-religion.md) _(target mancante, verificato 2026-10-14)_ | Concept | `config/config.php` obbligatorio per modulo | 2026-07-27 |
| [module-model-artifact-parity](./concepts/module-model-artifact-parity.md) _(target mancante, verificato 2026-10-14)_ | Concept | N modelli owner = N migrate + factory + seeder; audit cross-modulo | 2026-06-05 |
| [module-testcase-xotbase-hierarchy](./rules/module-testcase-xotbase-hierarchy.md) _(target mancante, verificato 2026-10-14)_ | Rule | TestCase modulo -> XotBaseTestCase -> Laravel; no nWidart dev-only base | 2026-06-10 |
| [pest-global-class-imports](./rules/pest-global-class-imports.md) _(target mancante, verificato 2026-10-14)_ | Rule | Pest: niente import inutili di classi globali (`ReflectionClass`) nei file senza namespace | 2026-06-12 |
| [composer-root-skeleton-modular](./concepts/composer-root-skeleton-modular.md) _(target mancante, verificato 2026-10-14)_ | Concept | Root Composer minimo con nWidart, moduli owner delle dipendenze | 2026-06-30 |

## Best Practices

- Ogni modulo Nwidart deve avere `config/config.php` (vedi [module-config-php-religion](./concepts/module-config-php-religion.md) _(target mancante, verificato 2026-10-14)_)
- Usare Actions non Services (vedi [actions-over-services-governance](https://github.com/laraxot/base_fixcity_fila5/blob/main/.opencode/skills/actions-over-services-governance/SKILL.md))
- Implementare `casts()` method non `$casts` property (vedi [model-casts-phpstan](../../../../docs/wiki/concepts/model-casts-phpstan.md) _(target mancante, verificato 2026-10-14)_)
- PHPStan Level 10 enforcement (vedi [phpstan-level10](../../../../docs/wiki/concepts/phpstan-level10.md) _(target mancante, verificato 2026-10-14)_)
- Test PHPStan remediation: Pest resta Pest; bridge/helper condivisi solo quando riducono duplicazione cross-modulo.

## Bad Practices

- NON creare Service classes - usare Actions (vedi [actions-over-services-governance](https://github.com/laraxot/base_fixcity_fila5/blob/main/.opencode/skills/actions-over-services-governance/SKILL.md))
- NON usare `dehydrated(false)` nei trait - blocca salvataggio (vedi Geo CoordinatePicker fix)
- NON dichiarare `$view` statica in XotBaseField - si calcola via `GetViewByClassAction`

## False Friends

- `dehydrated(false)` sembra mantenere il campo nei dati ma blocca il salvataggio (vedi [coordinate-picker-filament5-save-pattern](../../../Geo/docs/wiki/concepts/coordinate-picker-filament5-save-pattern.md))
- `live()` in Filament non rende il campo sempre live - serve `$applyStateBindingModifiers()` (vedi [coordinate-picker-state-binding-rule](../../../Geo/docs/wiki/concepts/coordinate-picker-state-binding-rule.md))

## Troubleshooting

| Pagina | Tipo | Argomento |
|--------|------|-----------|
| [xotbasefield-calculated-view-rule](./concepts/xotbasefield-calculated-view-rule.md) _(target mancante, verificato 2026-10-14)_ | Concept | XotBaseField runtime |

Aggiornato: 2026-07-27

## Lezioni 2026-07-27 (hub)

| Argomento | Doc |
|-----------|-----|
| Doppia registrazione provider | [module-providers-dual-registration-mandatory.md](./concepts/module-providers-dual-registration-mandatory.md) _(target mancante, verificato 2026-10-14)_ |
| Trinità panel Filament (SSoT) | [module-filament-panel-triad.md](./concepts/module-filament-panel-triad.md) _(target mancante, verificato 2026-10-14)_ |
| `config/config.php` | [module-config-php-religion.md](./concepts/module-config-php-religion.md) _(target mancante, verificato 2026-10-14)_ |
| `AdminPanelProvider` + doppia registrazione | [module-admin-panel-provider-mandatory.md](./concepts/module-admin-panel-provider-mandatory.md) _(target mancante, verificato 2026-10-14)_ |
| `Dashboard.php` | [module-dashboard-page-mandatory.md](./concepts/module-dashboard-page-mandatory.md) _(target mancante, verificato 2026-10-14)_ |
| Hub runtime cross-modulo | [runtime-config-religion-hub](../../../../Themes/docs/shared-components/runtime-config-religion-hub.md) _(target mancante, verificato 2026-10-14)_ |
| Tenant `modules_statuses` | [tenant-module-status-registry](../../../Tenant/docs/tenant-module-status-registry.md) |

## Decisioni in discussione — 2026-09-11

- [Owner e Resource correlata](concepts/manage-related-records-resource-delegation.md) _(target mancante, verificato 2026-10-14)_ — riuso form/colonne, DRY/KISS e vincoli Filament; traccia vendor completa (`makeTable()`→`configureTable()`).
- Analisi indipendente parallela, stesso giorno, mappa completa in [../index.md#discussioni-architetturali--2026-09-11](../index.md#discussioni-architetturali--2026-09-11) _(target mancante, verificato 2026-10-14)_ — censimento pagine, verifica dal vivo pannello/modulo, prova di precedenza classe/trait.

- [File proposto XotBaseManageRelatedRecords](../app/Filament/Resources/Pages/XotBaseManageRelatedRecords.php.md) _(target mancante, verificato 2026-10-14)_ — PHP documentato, review e coordinamento multi-agente.

**Aggiornamento 2026-09-11 (piu' tardi, stesso giorno)**: "quinta direzione"
in fondo al file sopra — `form()`/`table()` delegano per intero alla
Resource correlata (mai bridge per singolo hook come nella quarta), unici
override point per-pagina `getTableColumns()`/`getTableHeaderActions()`.
Non implementata. Story: `Modules/Xot/docs/stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md`.
# Punto di ingresso Xot

- [README del modulo](../../README.md)
- [Memoria: contratto README moduli](memories/module-readme-normalization.md)
- [Story BMAD: normalizzazione README](../bmad/stories/module-readmes-normalization.story.md)
