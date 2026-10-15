---
title: Tests Location Rule — Non Ripetere Errore
type: rule
status: critical
created: 2026-10-15
tags: [tests, modularity, laravel, rule, bmad, second-brain]
source_of_truth: true
---

# Regola assoluta: posizione dei test dei moduli

**ERRORE GRAVISSIMO COMMESSO**: i test erano stati creati dentro `laravel/Modules/<Module>/tests/`. 

**REGOLA CORRETTA**: i test dei moduli vivono ESCLUSIVAMENTE in `laravel/tests/Modules/<Module>/`.

Motivo (sorgente, non sintomo):
- La modularità richiede che `laravel/Modules/<Module>/` contenga solo il codice applicativo del modulo; i test devono essere esterni per non contaminare il package e per permettere l'autoload separato.
- `laravel/tests/Modules/` è la directory standard del framework Laravel per i test di pacchetto/modulo (vedi `tests/Modules/Geo/`, `tests/Modules/Cms/` esistenti).
- Mai creare `tests/` dentro un modulo; mai spostare i test dai moduli in `laravel/Modules/` se esistono già in `laravel/tests/Modules/`.

Verifica:
```bash
find laravel/Modules -maxdepth 2 -type d -name 'tests'  # DEVE essere vuoto
ls laravel/tests/Modules/  # DEVE contenere tutti i moduli
```

Aggiornato in: `.memory-bank/phpstan-correct-all.md`, `bashscripts/docs/prompts/01-architecture-patterns.md`, `docs/stories/phpstan-correct-all.story.md`.
