---
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
issues: []
discussions: []
title: "Story — ExportXlsLazyAction: label degradate a path tecnico"
type: story
module: Xot
epic: export
story_id: "export-lazy-action-labels"
status: ready
track: feature/export
qmd: "ExportXlsLazyAction label degradate path tecnico intestazioni xls limite noto"
related:
  - ../../../app/Filament/Actions/Header/ExportXlsLazyAction.php
  - ../../../app/Exports/CollectionExport.php
  - ../../../docs/bmad/stories/collection-export-intestazioni-esplicite.story.md
---
# export-lazy-action-labels

## Context and Problem Statement

Canale lazy/streaming (`ExportXlsLazyAction`) estrae solo i percorsi da
`getXlsFields()`: le label esplicite (`path => title`) degradano a path
tecnico nell'header — stessa UX rotta risolta altrove per
`CollectionExport`/`ExportXlsByCollection`.

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Perche'

Canale lazy/streaming (`ExportXlsLazyAction`) estrae solo i percorsi da
`getXlsFields()`: le label esplicite (`path => title`) degradano a path
tecnico nell'header — stessa UX rotta risolta altrove per
`CollectionExport`/`ExportXlsByCollection`.

## Task

- [ ] Applicare il formato misto anche al canale lazy (stessa logica di
      `resolvePathFields`/`normalizeField` gia' estratta)
- [ ] O dichiararlo deprecato se non usato: grep caller, se zero → rimuovere

## AC

- [ ] Header lazy = title rating, mai path tecnico; oppure action rimossa

## Priorita'

Bassa — canale secondario. Verificare prima se qualcuno lo monta.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
