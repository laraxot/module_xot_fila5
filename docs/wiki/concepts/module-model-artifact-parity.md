---
type: concept
module: Xot
<<<<<<< .merge_file_hbc55p
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_YpF5Cm
updated: 2026-06-30
qmd: "xot module model migration factory seeder parity audit N equals N"
related:
  - ../../../../../../docs/wiki/concepts/module-model-migration-seeder-parity.md
  - ../../module-directory-structure-rule.md
<<<<<<< .merge_file_hbc55p
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
updated: 2026-06-05
qmd: "xot module model migration factory seeder parity audit cross module"
>>>>>>> 64619e34 (.)
=======
>>>>>>> 61938ca4 (delete .claude-audit/)
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_YpF5Cm
---

# Module model artifact parity

<<<<<<< .merge_file_hbc55p
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_YpF5Cm
## Regola N = N = N

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

- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
<<<<<<< .merge_file_hbc55p
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
## Scopo
=======
## Regola N = N = N
>>>>>>> 61938ca4 (delete .claude-audit/)
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_YpF5Cm

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

<<<<<<< .merge_file_hbc55p
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
- [module-directory-structure-rule.md](../../module-directory-structure-rule.md)
- [MIGRATION_PHILOSOPHY.md](../../MIGRATION_PHILOSOPHY.md)
- [data-sacred](../../../../../../docs/wiki/rules/data-sacred-no-destructive-db.md)
- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
>>>>>>> .merge_file_YpF5Cm
- [module-directory-structure-rule.md](../../module-directory-structure-rule.md)
- [MIGRATION_PHILOSOPHY.md](../../MIGRATION_PHILOSOPHY.md)
- [data-sacred](../../../../../../docs/wiki/rules/data-sacred-no-destructive-db.md)
- [Predict seeder-canonical-orchestrator.md](../../../Predict/docs/wiki/concepts/seeder-canonical-orchestrator.md)
<<<<<<< .merge_file_hbc55p
>>>>>>> 61938ca4 (delete .claude-audit/)
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_YpF5Cm
