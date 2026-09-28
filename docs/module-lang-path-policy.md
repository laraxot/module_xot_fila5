<<<<<<< HEAD
=======
---
title: "module lang path policy"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "module lang path policy"
issues: []
discussions: []
---

>>>>>>> laraxot/dev
# Module Lang Path Policy

## Rule

For every Laravel module in this repository, the only valid translation tree is:

`Modules/<Module>/lang/{locale}/*.php`

The duplicated subtree:

`Modules/<Module>/lang/lang/{locale}/*.php`

must not exist and must not be ignored in `.gitignore`.

## Why

- module translation loading already starts from `lang/`;
- `lang/lang` creates a duplicate filesystem namespace;
- duplicate files drift and produce unclear runtime/debug state;
- ignoring `lang/lang/` hides a structural defect instead of failing fast.

## Operational Policy

- never add `lang/lang/` to a module `.gitignore`;
- if `lang/lang/` appears, compare it against the canonical `lang/` tree;
- preserve any valid content in `lang/{locale}`;
- then remove the duplicated subtree.

## 2026-03-12 Sweep

The invalid ignore entry `lang/lang/` was removed from:

- `Modules/Activity/.gitignore`
- `Modules/Cms/.gitignore`
- `Modules/Geo/.gitignore`
- `Modules/UI/.gitignore`
- `Modules/Xot/.gitignore`
