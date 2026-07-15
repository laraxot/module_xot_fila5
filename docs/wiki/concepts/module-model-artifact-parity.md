---
type: concept
module: Xot
updated: 2026-06-30
qmd: "xot module model migration factory seeder parity audit N equals N"
related:
  - ../../../../../../docs/wiki/concepts/module-model-migration-seeder-parity.md
  - ../../module-directory-structure-rule.md
---

# Module model artifact parity

## Regola N = N = N

Ogni modulo Laraxot deve essere **completo** rispetto ai modelli che possiede: stesso numero di migrazioni `create_*`, factory e seeder entità.

## Regola N = N = N = N

Vedi [architecture-module-model-artifact-parity.md](../../../../../docs/wiki/bmad/architecture-module-model-artifact-parity.md).

## Audit automatico

```bash
bashscripts/tools/audit-module-artifact-parity.sh <ModuleName>
```

## Struttura attesa

## Esclusi dal conteggio

- `abstract` / `Base*`
- `*PhpstanTraitProbe`, `TestModel`, `TestSushiModel`
- Wrapper cross-modulo (es. `Predict\Models\User`)

## Backlog migrazioni

Seeder parity ≠ migration parity: molti moduli hanno `add_*` / duplicati `create_*`. Consolidare nella migrazione canonica — vedi [migration-philosophy-rule.md](../../../../../../docs/project/migration-philosophy-rule.md).

## Collegamenti

- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
- [module-directory-structure-rule.md](../../module-directory-structure-rule.md)
- [MIGRATION_PHILOSOPHY.md](../../MIGRATION_PHILOSOPHY.md)
- [data-sacred](../../../../../../docs/wiki/rules/data-sacred-no-destructive-db.md)
