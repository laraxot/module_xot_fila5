---
title: "<!-- short problem + chosen outcome -->"
status: proposed # proposed | in-progress | review | done | superseded
date: YYYY-MM-DD
module: <!-- Owner module, e.g. Xot -->
epic: # optional
decision-makers: # optional list
related:
  - # relative links to ADR, contracts, sibling stories
qmd: "bmad story template MADR <!-- keywords -->"
---

<!-- File: docs/bmad/stories/<slug>.story.md (or docs/stories/<slug>.story.md).
     Filename stays kebab `slug.story.md` — NO NNNN required on stories.
     The only numbered exception is this template: `0000-template.story.md`.
     Inspiration (ADR MADR harness):
     https://raw.githubusercontent.com/robertogallea/laravelday-harness-workshop/refs/heads/main/docs/adr/0000-template.md
     Local ADR twin: ../../adr/0000-template.md
     Mapping from older BMAD shapes:
     - Fact-gate → Context and Problem Statement + Decision Drivers
     - Fix / Decision → Decision Outcome
     - Pest / verification → Confirmation + Esito -->

# <!-- Title: the problem solved and the outcome chosen -->

## Context and Problem Statement

<!-- 2–3 sentences. End with the question this story answers. -->

## Decision Drivers

- <!-- force or constraint that weighs on the choice -->

## Considered Options

- <!-- option 1 -->
- <!-- option 2 -->

## Decision Outcome

Chosen: **<!-- option -->**, because <!-- driver that justifies it -->.

### Consequences

- Good, because <!-- … -->
- Bad, because <!-- … -->

### Confirmation

<!-- How we know the work respects the decision: Pest filter, PHPStan scope,
     review checklist, or documented skip (e.g. host 10.100.200.15). -->

## Acceptance Criteria

- [ ] <!-- observable AC 1 -->
- [ ] <!-- observable AC 2 -->
- [ ] Sprint key `Module/slug` updated in `docs/sprint-status.yaml`

## Esito

<!-- Fill when status → done. Example:
Pest: N passed (A assertions) / skip reason if any
PHPStan: Modules/<Mod> OK | not applicable (docs-only)
Sprint: Module/slug → done
-->
