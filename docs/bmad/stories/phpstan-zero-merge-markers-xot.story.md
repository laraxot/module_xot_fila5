---
title: "PHPStan zero + merge markers — Xot (2026-11-25)"
type: story
module: Xot
status: done
epic: code-quality
track: quick-flow
story_id: phpstan-zero-merge-markers-xot
qmd: "xot merge markers phpstan XotData getUserByEmail InstructionReferences ClassResolution"
related:
  - ./phpstan-conflict-markers-bootstrap.story.md
  - ./phpstan-modules-zero-swarm.story.md
---

# PHPStan zero + merge markers — Xot

## Perché

Core contracts/datas: `XotData::getUserByEmail` deve usare `new $user_class()`;
test unitari con marker su path CLAUDE/docs non devono riferire Geo/Notify fantasmi.

## Lock

`bashscripts/lock/phpstan-zero-20261125-Xot.lock`

## Acceptance criteria

1. [x] `XotData::getUserByEmail` → `new $user_class()` (già corretto; verificato)
2. [x] Zero marker in `app/` e `tests/**/*.php`
3. [x] PHPStan `Modules/Xot` exit 0

## File chiave

| File | Decisione |
|------|----------|
| `app/Datas/XotData.php` | `new $user_class()` confermato |
| `tests/.../InstructionReferencesExistTest.php` | Root CLAUDE locali (no Geo) |
| `tests/.../ClassResolutionUsesGetClassNameTest.php` | Ref `Ptv/docs/...` |

## Gate

- PHPStan Xot: 0 errori (exit 0)
