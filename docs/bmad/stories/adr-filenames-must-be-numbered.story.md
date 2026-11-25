---
title: "ADR filenames always NNNN- (harness template)"
status: done
module: Xot
created: 2026-11-25
updated: 2026-11-25
related:
  - ../../adr/0000-template.md
  - ../../adr/README.md
  - ../../../../../../bashscripts/ai/wiki/memories/adr-filenames-must-be-numbered.md
qmd: "story ADR filenames numbered NNNN harness template fleet rename"
---
# ADR filenames always `NNNN-`

## Context and Problem Statement

Convenzione harness MADR: ogni ADR e' `docs/adr/NNNN-titolo.md`. Senza
numero non c'e' ordine di supersede ne' inventario stabile.

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Perche'

Convenzione harness MADR: ogni ADR e' `docs/adr/NNNN-titolo.md`. Senza
numero non c'e' ordine di supersede ne' inventario stabile.

## Fatto

- `0000-template.md` allineato al template harness (21 cartelle adr)
- 66 file senza prefisso → `NNNN-<slug>.md` (twin → `superseded by`)
- Link aggiornati (~198 file)
- Memoria + Pest `AdrFilenamesAreNumberedTest`
- `unnumbered_left=0` su Modules+Themes

## Verifica

```
Pest AdrFilenamesAreNumberedTest: 1 passed (Modules+Themes+docs/adr)
unnumbered_left=0
```


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

```
Pest AdrFilenamesAreNumberedTest: 1 passed (Modules+Themes+docs/adr)
unnumbered_left=0
```
