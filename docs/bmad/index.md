---
title: "Xot - indice BMAD"
module: Xot
bmad: true
status: active
<<<<<<< .merge_file_nO7sSq
=======
type: index
<<<<<<< .merge_file_8SsrVS
updated: 2026-10-20
tags: [docs, xot, bmad, graphify, phpstan]
qmd: "xot module documentation index bmad graphify-out gitignore phpstan decision-log"
=======
updated: 2026-10-09
tags: [docs, xot, bmad]
qmd: "xot module   documentation index xot"
>>>>>>> .merge_file_rImAvr
>>>>>>> .merge_file_8RIw9z
---

# Xot Module — Documentation Index

## Scopo

Xot fornisce fondazioni Laraxot, classi base, contratti e regole condivise.

## Architettura e regole

- [purpose.md](purpose.md) — responsabilità del modulo
- [architecture.md](architecture.md) — architettura tecnica
- [wiki/rules/](../wiki/rules/) — regole e convenzioni
<<<<<<< .merge_file_nO7sSq
- [wiki/patterns/](../wiki/patterns/) — pattern riusabili, quando presenti
=======
- [wiki/patterns/](../wiki/patterns/) _(target mancante, verificato 2026-10-14)_ — pattern riusabili, quando presenti
>>>>>>> .merge_file_rImAvr

## BMAD e conoscenza

- [decision-log.md](./decision-log.md) — decisioni cross-modulo (PHPStan zero, Services→Actions, graphify)
- [graphify-out-gitignore.md](./graphify-out-gitignore.md) — `graphify-out/` obbligatorio in ogni `.gitignore` modulo/tema (no LFS)
- [filament-blueprint.md](./filament-blueprint.md) — contratto UI admin XotBase*
- [phpstan-status.md](./phpstan-status.md) — stato gate Modules
- [stories/](stories/) — story BMAD del modulo
- [brainstorming.md](brainstorming.md) — esplorazione opportunità
- [wiki/](../wiki/) — knowledge base
- [raw/](../raw/) — note grezze, se presenti

Questo è l'indice canonico BMAD del modulo Xot. I file con prefisso `legacy-`
presenti in `docs/stories/` sono riferimenti storici e non SSoT.
