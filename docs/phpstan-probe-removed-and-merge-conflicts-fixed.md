---
title: "PHPStan probe rimosso + conflitti merge risolti (2026-07-14)"
module: "Xot"
type: concept
tags: [phpstan, probe, removed, merge]
created: 2026-07-14
updated: 2026-07-14
qmd: "phpstan probe removed and merge conflicts fixed"
related:
  - "./eloquent-magic-properties-rule.md"
---
# PHPStan probe rimosso + conflitti merge risolti (2026-07-14)

## `app/Phpstan/TraitProbes.php` cancellato

Violava la regola `no-phpstan-probe-models` (vietati modelli/classi il cui unico scopo è far passare PHPStan). Copriva 3 trait (`HasCommonScopes`, `HasCustomRelations`, `HasSchemalessAttributes`): le fixture di test equivalenti esistevano già in `tests/Fixtures/Models/` (`HasCommonScopesProbe.php`, `SchemalessTestModel.php`), quindi il file era ridondante oltre che vietato. `HasCustomRelations` (nessuna fixture dedicata) ha riottenuto `@phpstan-ignore trait.unused`.

## Merge conflict irrisolti

`UserContract.php`, `HasDynamicFillable.php`, `HasXotFactory.php`, `HasCustomRelations.php`, `HandlerDecorator.php`, `ModuleAction.php`, `XotServiceProvider.php` avevano marker `<<<<<<< HEAD` non risolti, causa di parse-error che bloccavano l'intera analisi PHPStan su `Modules/`. Risolti scegliendo sempre il ramo conforme alle regole del progetto (Action/QueueableAction invece di helper statici Services, tipi più specifici invece di `Model` generico).

**Nota per agenti futuri**: questi stessi file sono ricomparsi con i marker di conflitto un paio d'ore dopo il primo fix (probabile replay di un processo git esterno, non un agente AI — vedi `docs/chat/xot-merge-conflicts-coordination.md` per i dettagli). Se ricapita, non serve rianalizzare da zero: la scelta di ramo giusta è sempre documentata in quel file di coordinamento.

## Nota su sprawl docs

Questa cartella ha molte varianti quasi-duplicate dello stesso argomento (es. `common-filament-trait-conflicts.md`, `-1.md`, `-2.md`, `_2.md`, `COMMON_FILAMENT_TRAIT_CONFLICTS.md`). Non consolidato in questa sessione (fuori scope, richiede audit dedicato — vedi issue GitHub "Ponytail audit: hub bashscripts e indici").
