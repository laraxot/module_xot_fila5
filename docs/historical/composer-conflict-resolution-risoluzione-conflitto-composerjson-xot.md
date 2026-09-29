---
title: "composer conflict resolution risoluzione conflitto composerjson xot"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "composer conflict resolution risoluzione conflitto composerjson xot"
issues: []
discussions: []
---

# Risoluzione conflitto composer.json (Xot)

## Intent
- Garantire coerenza delle dipendenze e corretta configurazione dell’autoload per il modulo Xot.

## Cosa
- Rimozione dei marker di conflitto in `composer.json`.
- Rimozione dei marker di conflitto  in `composer.json`.

- Rimozione dei marker di conflitto (``, `=======`, `aurmich/dev`) in `composer.json`.
- Eliminazione dell’inserimento errato del branch alias `aurmich/dev` nelle sezioni `require-comment` e `require-dev-comment`, che non fanno parte della configurazione delle dipendenze.
- Conservazione delle sezioni `require` e `require-dev` pulite, mantenendo solo le dipendenze ufficiali documentate nel modulo Xot.

- Rimozione dei marker di conflitto in `composer.json`.=======

- Rimozione dei marker di conflitto in `composer.json`.
- Rimozione dei marker di conflitto (``, `=======`, `aurmich/dev`) in `composer.json`.
- Eliminazione dell’inserimento errato del branch alias `aurmich/dev` nelle sezioni `require-comment` e `require-dev-comment`, che non fanno parte della configurazione delle dipendenze.
- Conservazione delle sezioni `require` e `require-dev` pulite, mantenendo solo le dipendenze ufficiali documentate nel modulo Xot.
- Conservazione della versione di `filament/filament`: `"^3.3"`.

## Collegamento alla doc root
Vedi `/docs/xot_conflict_links.md` per la mappatura dei file documentati localmente e i riferimenti incrociati.
