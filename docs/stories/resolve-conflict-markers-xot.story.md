---
title: Resolve conflict markers in Xot
module: Xot
status: partially-done
date: 2026-10-21
---

# Resolve conflict markers in Xot

## Goal

Remove the git conflict markers left in five Xot files so they parse again, keeping the
behaviour each side was written for. Scope is limited to the five files below.

## Context

The Xot nested repo is in a merge in progress (`.git/MERGE_HEAD` = `65fb3b19b`, HEAD =
`e177c6d64`). Commit `5b16bca47` on the incoming side deleted `app/Actions/File/FileAction.php`
(1092 lines) and split its helpers out. Several files still in conflict reference that class.

## Per-file decisions

| File (relative to `laravel/Modules/Xot/`) | Side kept | Reason |
|---|---|---|
| `app/Actions/Model/Update/PivotAction.php` | Incoming: `throw new \LogicException('Update\PivotAction not implemented')` | HEAD had `dddx('wip')`, a debug dump that kills the request. The incoming line is the explicit not-implemented contract. Sibling `Store/PivotAction.php` still has `dddx('wip')`; out of scope here. |
| `app/Filament/Resources/Pages/XotBaseListRecords.php` | Incoming: `final public function getTableColumns()` with docblock | Matches the other three `final` table hooks in the same class and the class docblock. Guards: `tests/Unit/ListPageHasTableClassTest.php`, `tests/Unit/Filament/TableHooksDeclaredByUsTest.php`. No subclass in `laravel/Modules` overrides the list-page table hooks. |
| `tests/Feature/XotBaseModelBusinessLogicTest.php` | Incoming: `$baseModel = createXotBaseModelFixture();` | The variable is used by `class_uses($baseModel)` in the assertion. HEAD dropped the assignment, which would leave it undefined. |
| `tests/ModuleExecuteCoverage.php` | Incoming (three blocks): no `FileAction` import, no `testFileActionStatics()` call, no method | `FileAction` no longer exists. The method's `FileAction::*` calls would fail, and the catch-all `try` blocks only inflated the executed counter. The helpers are `QueueableAction` classes under `app/Actions/File/`, which `testExecuteAllActions()` already runs. |
| `tests/Unit/XotExecuteCoverage50Test.php` | Incoming (two blocks): `FileAction` test and `FileAction` assertions removed | Same reason. The `FileAction` test asserted on methods that no longer exist (`viewNamespaceToDir`, `configPath`, `viewNamespaceToAsset`, and others), so it could not pass. The `});` closing the `XotData` test is kept. |

## Verification

### Syntax

```
No syntax errors detected in app/Actions/Model/Update/PivotAction.php
No syntax errors detected in app/Filament/Resources/Pages/XotBaseListRecords.php
No syntax errors detected in tests/Feature/XotBaseModelBusinessLogicTest.php
No syntax errors detected in tests/ModuleExecuteCoverage.php
No syntax errors detected in tests/Unit/XotExecuteCoverage50Test.php
```

A scan for `^<<<<<<<`, `^=======$` and `^>>>>>>>` in the five files returns 0 matches.

### Pest

Not green. The run is blocked by the environment, not by the resolved code.

- Before the fix, `vendor/composer` was stale: Pest, Collision and Laravel classes were not in the autoloader. Fixed with `composer dump-autoload --no-scripts`. Backup kept in the session scratchpad (`vendor-composer-backup`).
- `vendor/phpstan/phpdoc-parser` was declared in `installed.json` but missing on disk. Restored from the composer cache with `composer reinstall phpstan/phpdoc-parser --no-scripts`.
- With those fixed, every test in `XotBaseModelBusinessLogicTest.php`, `XotExecuteCoverage50Test.php`, `ListPageHasTableClassTest.php` and `TableHooksDeclaredByUsTest.php` aborts in `Modules/Xot/tests/Support/TestDatabaseGuard.php:100`. The guard refuses connections whose database names do not end in `_test`. It lists `ptv_lara`, `badge`, `generale` and others. This is the guard working as designed. Configuration is not changed here (data-sacred rule).

Result: 30 failed (Feature), 50 failed (Unit), 3 failed (guards), all `RuntimeException` from the DB guard. `ModuleExecuteCoverage.php` has no test file of its own. Other modules call it.

### Static analysis

PHPStan Level 10 was not run on these files in this story.

## Open items

- The Xot repo has about 157 other unmerged paths (for example `Helpers/PathHelper.php` and many views and docs). Only the five listed files were touched.
- The `.env.testing` database names need `_test` suffixes before the Pest suite can run here. Owner decision.
- `Store/PivotAction.php` and `MorphToOneAction.php` still contain `dddx('wip')`.

## Lock

Locks were acquired with `bashscripts/lock/lock.sh` for all five files and removed after editing.