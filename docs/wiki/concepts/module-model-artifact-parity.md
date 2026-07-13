---
type: concept
module: Xot
updated: 2026-06-05
qmd: "xot module model migration factory seeder parity audit cross module"
---

# Module model artifact parity

## Scopo

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

- [module-directory-structure-rule.md](../../module-directory-structure-rule.md)
- [MIGRATION_PHILOSOPHY.md](../../MIGRATION_PHILOSOPHY.md)
- [data-sacred](../../../../../../docs/wiki/rules/data-sacred-no-destructive-db.md)
