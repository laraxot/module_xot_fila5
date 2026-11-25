---
title: "BMAD stories always MADR harness format"
type: story
status: done
date: 2026-11-25
module: Xot
decision-makers: [Xot]
qmd: "story BMAD MADR format fleet migrate template Pest gate"
related:
  - ./0000-template.story.md
  - ../../../../../../bashscripts/ai/wiki/memories/bmad-stories-madr-format.md
  - ../../adr/0000-template.md
---

# BMAD stories always MADR harness format

## Context and Problem Statement

Le story BMAD usavano sezioni ad hoc (`Perche'`, `Fact-gate`, `Fatto`). Serve
un formato unico e ricercabile, allineato al MADR harness degli ADR. Come si
garantisce che **ogni** story nuova e storica abbia lo stesso scheletro?

## Decision Drivers

- Ordine utente: story sempre in formato MADR
- Coerenza con `docs/adr/0000-template.md` (harness)
- Gate meccanico Pest (non affidarsi alla memoria degli agenti)

## Considered Options

- Solo template per le story nuove (debt storico)
- Migrazione fleet + template + Pest su tutte le story

## Decision Outcome

Scelta: **migrazione fleet + template `0000-template.story.md` + Pest**, perché
chiude il debito e rende il formato irreversibile per le nuove story.

### Consequences

- Buono, perché 1599 story hanno le sezioni MADR; agenti copiano un solo template
- Cattivo, perché il body legacy resta sotto Decision Outcome (sintesi Context
  best-effort); va raffinato al tocco

### Confirmation

```
Pest BmadStoriesAreMadrFormatTest — expect 0 offenders
templates_written ≈ 40; migrated ≈ 1597
```
