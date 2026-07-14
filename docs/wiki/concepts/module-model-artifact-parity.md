---
type: concept
module: Xot
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
=======
>>>>>>> 2353ccee (.)
updated: 2026-06-30
qmd: "xot module model migration factory seeder parity audit N equals N"
related:
  - ../../../../../../docs/wiki/concepts/module-model-migration-seeder-parity.md
  - ../../module-directory-structure-rule.md
<<<<<<< HEAD
<<<<<<< HEAD
=======
updated: 2026-06-05
qmd: "xot module model migration factory seeder parity audit cross module"
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
=======
>>>>>>> 2353ccee (.)
---

# Module model artifact parity

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2353ccee (.)
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
<<<<<<< HEAD
- `*PhpstanTraitProbe`, `TestModel`, `TestSushiModel`
=======
- `TestModel`, `TestSushiModel`
>>>>>>> 2353ccee (.)
- Wrapper cross-modulo (es. `Predict\Models\User`)

## Backlog migrazioni

Seeder parity ≠ migration parity: molti moduli hanno `add_*` / duplicati `create_*`. Consolidare nella migrazione canonica — vedi [migration-philosophy-rule.md](../../../../../../docs/project/migration-philosophy-rule.md).

## Collegamenti

- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
<<<<<<< HEAD
=======
## Scopo
=======
## Regola N = N = N
>>>>>>> 61938ca4 (delete .claude-audit/)

Per ogni modulo, ogni **modello owner** in `app/Models/`:

| Artefatto | Quantità | Pattern |
|-----------|----------|---------|
| Migrazione | 1 | `database/migrations/*_create_{table}_table.php` |
| Factory | 1 | `database/factories/{Model}Factory.php` |
| Seeder | 1 | `database/seeders/{Model}Seeder.php` |

Opzionale: `{Module}DatabaseSeeder` orchestra i `{Model}Seeder`.

Hub progetto: [module-model-migration-seeder-parity.md](../../../../../../docs/wiki/concepts/module-model-migration-seeder-parity.md)

## Audit

```bash
bash bashscripts/tools/audit-module-artifact-parity.sh Predict
bash bashscripts/tools/audit-all-modules-artifact-parity.sh
bash bashscripts/tools/ensure-module-entity-seeders.sh Job   # stub mancanti
```

Gate sessione: `run-session-gate.sh` §1.1c.

## Esclusi dal conteggio

- `abstract` / `Base*`
- `*PhpstanTraitProbe`, `TestModel`, `TestSushiModel`
- Wrapper cross-modulo (es. `Predict\Models\User`)

## Backlog migrazioni

Seeder parity ≠ migration parity: molti moduli hanno `add_*` / duplicati `create_*`. Consolidare nella migrazione canonica — vedi [migration-philosophy-rule.md](../../../../../../docs/project/migration-philosophy-rule.md).

## Collegamenti

<<<<<<< HEAD
- [module-directory-structure-rule.md](../../module-directory-structure-rule.md)
- [MIGRATION_PHILOSOPHY.md](../../MIGRATION_PHILOSOPHY.md)
- [data-sacred](../../../../../../docs/wiki/rules/data-sacred-no-destructive-db.md)
>>>>>>> 64619e34 (.)
=======
- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
=======
## Scopo
=======
## Regola N = N = N
>>>>>>> 61938ca4 (delete .claude-audit/)

Per ogni modulo, ogni **modello owner** in `app/Models/`:

| Artefatto | Quantità | Pattern |
|-----------|----------|---------|
| Migrazione | 1 | `database/migrations/*_create_{table}_table.php` |
| Factory | 1 | `database/factories/{Model}Factory.php` |
| Seeder | 1 | `database/seeders/{Model}Seeder.php` |

Opzionale: `{Module}DatabaseSeeder` orchestra i `{Model}Seeder`.

Hub progetto: [module-model-migration-seeder-parity.md](../../../../../../docs/wiki/concepts/module-model-migration-seeder-parity.md)

## Audit

```bash
bash bashscripts/tools/audit-module-artifact-parity.sh Predict
bash bashscripts/tools/audit-all-modules-artifact-parity.sh
bash bashscripts/tools/ensure-module-entity-seeders.sh Job   # stub mancanti
```

Gate sessione: `run-session-gate.sh` §1.1c.

## Esclusi dal conteggio

- `abstract` / `Base*`
- `*PhpstanTraitProbe`, `TestModel`, `TestSushiModel`
- Wrapper cross-modulo (es. `Predict\Models\User`)

## Backlog migrazioni

Seeder parity ≠ migration parity: molti moduli hanno `add_*` / duplicati `create_*`. Consolidare nella migrazione canonica — vedi [migration-philosophy-rule.md](../../../../../../docs/project/migration-philosophy-rule.md).

## Collegamenti

<<<<<<< HEAD
- [module-directory-structure-rule.md](../../module-directory-structure-rule.md)
- [MIGRATION_PHILOSOPHY.md](../../MIGRATION_PHILOSOPHY.md)
- [data-sacred](../../../../../../docs/wiki/rules/data-sacred-no-destructive-db.md)
>>>>>>> 64619e34 (.)
=======
- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
>>>>>>> 61938ca4 (delete .claude-audit/)
=======
>>>>>>> 2353ccee (.)
