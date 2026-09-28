<<<<<<< HEAD
=======
---
title: "psr4 autoload cleanup"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "psr4 autoload cleanup"
issues: []
discussions: []
---

>>>>>>> laraxot/dev
# PSR-4 Autoload Cleanup (2026-03-09)

## Context
- Residual Composer warnings on test helper classes declared in test files with mismatched class/file names.

## Decision
- Replace named helper test classes with anonymous classes/factories in test files.

## Goal
- Remove PSR-4 autoload warnings without changing production code paths.
