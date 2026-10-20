---
title: Services delete-again boy scout (anti-merge)
type: story
module: Xot
status: ready-for-dev
priority: P0
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, services, queueable-action, boy-scout, ratchet]
qmd: "services delete-again boy scout app services zero geo zombie merge laraxot"
related:
  - ./tomorrow-handoff.story.md
  - ./services-to-actions-global-wave.story.md
  - ../bmad/brainstorming-services-to-actions-wave.md
  - ../../Geo/docs/stories/services-zombie-delete-wave3.story.md
  - ../../../../../bashscripts/docs/prompts/25-services-to-actions.md
---

<!--
GateGuard facts:
1. Supersedes nothing — boy-scout companion to services-to-actions-global-wave already ready-for-dev.
2. Linked from tomorrow-handoff.story.md row 4.
3. New file in existing Modules/Xot/docs/stories/.
4. User verbatim: "fa tutte le bmad stories per continuare domani"
-->

# Services — delete-again continuo

## Perche'

I merge riesumano `app/Services`. Mid-sessione Geo era tornato con 0 caller.
Religione: cartella assente; Action viva → DELETE.

## Owned scope

`Modules/*/app/Services/**` + `archAllowedServicesDirs()` deve restare `[]`.

## Tasks

1. `find` dirs Services (escl. tests/vendor).
2. Per ogni Service: `rg` use + Action gemella → retarget → DELETE → rmdir.
3. Pest architecture Services; PHPStan se serve.
4. Annotare handoff.

## Acceptance

- [ ] dirs = 0
- [ ] allowlist = `[]`
- [ ] nessuna Action duplicata

## Testing strategy

`ModulesArchitectureTest` + `find` gate.
