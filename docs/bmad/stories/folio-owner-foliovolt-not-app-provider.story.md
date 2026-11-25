---
title: "Folio owner: FolioVolt, non App FolioServiceProvider"
type: story
status: done
module: Xot
updated: 2026-11-16
qmd: "folio owner FolioVoltServiceProvider not App FolioServiceProvider bootstrap"
related:
  - ../../../../../../bashscripts/ai/wiki/memories/frontend-folio-routing.md#folio-owner-foliovolt-only
  - ../../../../../../bashscripts/ai/wiki/memories/filament-tables-forms-xotbase.md#filament5-layout-contract-shared-modules
  - ../../../Activity/docs/bmad/stories/folio-routing-centralization.story.md
---
# Folio owner: solo FolioVolt

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

> «scomodare laravel/app/Providers/FolioServiceProvider.php quando abbiamo
> FolioVoltServiceProvider e' sbagliato ! ci deve bastare FolioVolt»

## Decisione

| Contesto | Owner Folio::path |
|----------|-------------------|
| Progetto FO con Cms | Solo `Cms/FolioVoltServiceProvider` |
| PTVX (Cms assente) | Nessun mount App; non inventare surrogato; moduli dominio non montano |

## Perché (senso)

FolioVolt già copre tema + moduli + locale + `/api`. App Folio è stub scaffold
incompleto → doppia catch-all e race. ECC: routing FO non vive in `app/Providers`.

## Acceptance criteria

- [x] `bootstrap/providers.php` non registra `App\Providers\FolioServiceProvider`.
- [x] Stub App annotato: non registrare / non surrogato Cms.
- [x] Memoria `frontend-folio-routing.md#folio-owner-foliovolt-only`.
- [x] Pest anti-regressione su bootstrap.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
