<<<<<<< HEAD
---
title: "Xot Module changelog (bridge stub)"
type: bridge-stub
updated: 2026-09-17
---

# Bridge stub — see CHANGELOG.md

This file collided with [`CHANGELOG.md`](./CHANGELOG.md) on case-insensitive filesystems.
Every entry it contained (through version 0.9.0, plus the "Sessione Fix Critica -
2025-06-04" section) is already present in `CHANGELOG.md`, which was cleaned up on
2026-09-17 to remove committed Git conflict markers and duplicated sections.

Read [`CHANGELOG.md`](./CHANGELOG.md) — it is the canonical changelog.

Not deleted, per this repo's "no file deletion, convert superseded docs to bridge stubs"
convention.
=======
# Changelog - Modulo Xot

Tutte le modifiche significative al modulo Xot saranno documentate in questo file.

## [2025-06-04] - Sessione Fix Critica

### Fixed
- **HasXotTable.php**: Risolti if duplicati (3x) e array malformati da merge conflict
  - Dettagli: [bugfix-hasxottable-duplicate-if.md](./bugfix-hasxottable-duplicate-if.md)

- **XotBaseChartWidget.php**: Rimossi metodi duplicati e chiusure classe multiple
  - Causa: Conflitto Git risolto automaticamente con residui

- **Script git conflicts v6.sh**: Corretti 3 bug critici (P0+P1)
  - Cleanup file temporanei (P0)
  - Ottimizzazione stat command (P1)
  - Cattura exit code robusta (P1)
  - Versione: 6.0 → 6.1

### Added
- Documentazione [syntax-errors-mass-fix.md](./syntax-errors-mass-fix.md)
- Pattern identificato: "Triplice Mostro del Merge"
- Analisi critica script bash con dialettica interna

### Documentation
- Aggiornato [git-conflict-resolution-guide.md](../../../bashscripts/docs/git-conflict-resolution-guide.md) v1.0 → v2.0
  - +1400 righe analisi filosofica e tecnica
  - Storia evolutiva script (4 generazioni)
  - 7 bug identificati con priorità
  - Processo decisionale consapevole

---

## Convenzioni Changelog

- Date in formato `[YYYY-MM-DD]`
- Categorie: Added, Changed, Deprecated, Removed, Fixed, Security
- Link relativi ai documenti di dettaglio
- Focus su COSA è cambiato e PERCHÉ
>>>>>>> laraxot/dev
