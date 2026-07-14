---
title: "Regole Generali sulle State Machine"
module: "Xot"
type: concept
tags: [state, machine]
created: 2026-07-14
updated: 2026-07-14
qmd: "state machine"
related:
  - "./eloquent-magic-properties-rule.md"
---
# Regole Generali sulle State Machine

## Transizioni
- Ogni classe di transizione deve accettare solo parametri che siano compatibili con la chiamata automatica di Spatie Model States.
- Se si aggiungono parametri custom al costruttore, questi devono essere opzionali oppure bisogna aggiornare tutte le chiamate a `transitionTo`.
- Documentare ogni modifica di signature nelle docs del modulo coinvolto.

## Documentazione
- Ogni errore e soluzione va documentato sia nella docs del modulo sia qui, con link bidirezionali.

## Collegamenti
- [../../<nome progetto>/docs/state-machine.md](../../<nome progetto>/docs/state-machine.md)
- [../../.windsurf/rules/filament-state-transitions.mdc](../../.windsurf/rules/filament-state-transitions.mdc)
- [../../.cursor/rules/filament-state-transitions.mdc](../../.cursor/rules/filament-state-transitions.mdc)
