---
title: "PSR-4 Autoload Cleanup (2026-03-09)"
module: "Xot"
type: concept
tags: [psr4, autoload, cleanup]
created: 2026-07-14
updated: 2026-07-14
qmd: "psr4 autoload cleanup"
related:
  - "./eloquent-magic-properties-rule.md"
---
# PSR-4 Autoload Cleanup (2026-03-09)

## Context
- Residual Composer warnings on test helper classes declared in test files with mismatched class/file names.

## Decision
- Replace named helper test classes with anonymous classes/factories in test files.

## Goal
- Remove PSR-4 autoload warnings without changing production code paths.
