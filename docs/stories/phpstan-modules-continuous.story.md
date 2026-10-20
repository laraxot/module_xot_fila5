---
title: PHPStan Modules — continuous boy scout post-zero
type: story
module: Xot
status: ready-for-dev
priority: P0
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, phpstan, continuous, boy-scout, single-neon]
qmd: "phpstan modules continuous boy scout memory-limit 2G sigkill single neon"
related:
  - ./tomorrow-handoff.story.md
  - ./phpstan-modules-zero-gate.story.md
  - ./phpstan-modules-zero-wave3.story.md
  - ../../../../../bashscripts/docs/prompts/11-phpstan.md
  - ../../../../../bashscripts/docs/prompts/24-boy-scout.md
---

<!--
GateGuard facts:
1. Supersedes nothing — continuous companion to phpstan-modules-zero-gate (done checkpoint).
2. Linked from tomorrow-handoff.story.md as opening step 0.
3. New file in existing Modules/Xot/docs/stories/.
4. User verbatim: "fa tutte le bmad stories per continuare domani"
-->

# PHPStan continuous

## Perche'

A zero non ci si ferma. SIGKILL/OOM non e' regressione codice: rimisurare con
`--memory-limit=2G` e una sola coda. Solo `laravel/phpstan.neon`.

## Owned scope

Coordinatore misura Modules; fix solo errori nuovi della misura corrente.
Mai altri `.neon`.

## Tasks

1. `free -h`; evita run paralleli.
2. `./vendor/bin/phpstan analyse Modules --memory-limit=2G --no-progress`
3. OK → boy scout (Services/qualita'). Errori → partizione modulo + fix sorgente.
4. Fotogramma su handoff.

## Acceptance

- [ ] Misura sessione documentata
- [ ] Nessun neon/ignore nuovo
- [ ] SIGKILL non contato come errori codice

## Testing strategy

Solo PHPStan; Pest se il fix cambia runtime.
