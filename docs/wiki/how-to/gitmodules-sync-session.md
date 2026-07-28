---
title: "Gitmodules sync session — note modulo/tema"
type: how-to
tags: [git, gitmodules, sync, quality-gates, merge-conflict]
created: 2026-07-21
<<<<<<< HEAD
updated: 2026-07-21
qmd: "gitmodules sync session module theme note story-003"
issues:
  - "https://github.com/provtv/base_ptv_fila5/issues/201"
discussions: []
related:
  - "../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md"
  - "../../../../../../docs/chat/gitmodules-sync.md"
=======
updated: 2026-07-24
qmd: "gitmodules sync session module theme note story-003 prompt-17"
issues:
  - "https://github.com/provtv/base_ptv_fila5/issues/201"
  - "https://github.com/laraxot/base_techplanner_fila5/issues/42"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/43"
related:
  - "../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md"
  - "../../../../../../docs/chat/gitmodules-sync.md"
  - "../../../../../../docs/chat/gitmodules-multi-repo-sync.md"
  - "../../../../../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md"
>>>>>>> 09d6105 (.)
---

# Gitmodules sync session

<<<<<<< HEAD
Sessione orchestrata dal prompt `bashscripts/tools/prompts/02-gitmodules-sync.md` (v5.1) e da **STORY-003**.

## Cosa fare su questo owner

1. `git remote -v` — sync **tutte** le organizzazioni (`fetch` + `pull --ff-only` + `push`, mai `--force`).
2. Quality gates da `laravel/`: phpstan → phpmd → phpinsights (`--composer=composer.lock`).
3. Marker Git: risoluzione manuale forward-only (no `git restore`).

## Canon

- Story: [../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md](../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md)
- Report: [../../../../../../docs/chat/gitmodules-sync.md](../../../../../../docs/chat/gitmodules-sync.md)
- Issue base: https://github.com/provtv/base_ptv_fila5/issues/201
=======
Sessione orchestrata dal prompt [`17-gitmodules-path-iteration.md`](../../../../../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md) (iterazione path) e, per sync batch multi-org, da `run-gitmodules-sync.sh` / STORY-003.

## Cosa fare su questo owner

1. `cd` nel path da `gitmodules.ini` — **non** trattarlo come submodule della root.
2. `git remote -v` — sync **tutte** le organizzazioni (`fetch` + `pull --ff-only` + `push`, mai `--force`).
3. Quality gates da `laravel/`: phpstan → phpmd → phpinsights (proporzionati).
4. Marker Git: risoluzione manuale forward-only (no `git restore`).

## Canon

- Prompt path: [17-gitmodules-path-iteration.md](../../../../../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md)
- Story: [STORY-003](../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md)
- Report chat: [gitmodules-multi-repo-sync.md](../../../../../../docs/chat/gitmodules-multi-repo-sync.md)
>>>>>>> 09d6105 (.)
