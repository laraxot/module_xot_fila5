---
title: "Xot module documentation index"
type: index
status: active
updated: 2026-10-14
tags: [xot, foundation, module, documentation]
qmd: "Xot foundation module documentation index"
---

# Xot: indice canonico

Questo e' l'unico indice del modulo (contratto:
[module-theme-docs-contract.md](../../../../bmad-output/docs-architecture/module-theme-docs-contract.md)).
`wiki/index.md` e `bmad/index.md` sono indici di sezione, non alternative a questo.
Identita, ownership, quick start e limiti: [README.md](README.md). Stato verificato
il 2026-10-14: 254 file `.md` in `docs/`, 71 voci nella radice, nessun `index.md` in radice.

## Canoniche (mantenute, da qui si parte)

| Percorso | Contenuto verificato |
|---|---|
| [README.md](README.md) | identita, fatti dal codice, quick start, limiti |
| [decision-log.md](decision-log.md) | due decisioni del 2026-10-08 (riallineamento a `cadb1578e`, contratto `HasRecursiveRelationships`) |
| [stories/](stories/) | 22 file: 11 con data (2026-10-06 .. 2026-10-13), 11 numerati o storici (`7.1.*`, `8.*`, `legacy-readme-*`) |
| [wiki/index.md](wiki/index.md), [wiki/log.md](wiki/log.md) | indice e registro del wiki; l'indice elenca 37 bersagli distinti che non esistono, 25 dei quali sotto `concepts/`, `rules/`, `overviews/` (vedi Problemi noti) |
| [wiki/concepts/](wiki/concepts/) | 2 pagine reali: `claude-code-laraxot-rules-path-scoping.md`, `filament-wizard-architecture-right-way.md` |
| [wiki/memories/index.md](wiki/memories/index.md) | 6 note di memoria del modulo |
| [bmad/phpstan-status.md](bmad/phpstan-status.md) | stato vivo del gate PHPStan; il 2026-10-14 `phpstan analyse Modules/Xot` esce 0 senza errori |
| [bmad/stories/](bmad/stories/) | 81 voci di story BMAD storiche (flotta PHPStan, export, docs); cronologia, non si rinumera |
| [rules/](rules/) | 3 regole (`laraxot-rules.md`, `prompt-rules.md`, `xot-base-section-rule.md`) |
| [investigation/](investigation/) | `investigation.md`, diagnosi non risolta |

## Evidence (prove datate, non riscrivere)

- [phpstan/](phpstan/): 31 file, report per livello (`level-N.md/.json`) del ciclo PHPStan; stato attuale solo in `bmad/phpstan-status.md`.
- [phpstan-zero.md](phpstan-zero.md) (2026-09-07), [quality-gates.md](quality-gates.md) (2026-07-28), [stato-qualita-progetto.md](stato-qualita-progetto.md) (2026-08-31): misure storiche, i numeri non sono attuali.
- `_AUDIT_REPORT*.json`, `_audit_report*.json`, `7.1-bmad-docs-audit.json`, `prd.json`, `sprint-status.yaml`: dati grezzi di audit e sprint.
- [raw/](raw/): immutabile, solo `.gitkeep`.

## Legacy e non canoniche (restano, non si spostano senza migration map)

- [consolidated/](consolidated/) (34 md con suffisso `-1-1`, `-2`): copie di consolidamento; [architecture/](architecture/) ha 10 nomi in comune con `wiki/architecture/` ma stesso corpo solo per 1 file md su 9, quindi sono due versioni divergenti, nessuna delle due e' provata piu' corretta.
- [governance/docs-structure.md](governance/docs-structure.md) e [standards/](standards/): marcati `stale` il 2026-10-14 (vedi Problemi noti).
- Radice: `CHANGELOG.MD` e `changelog.MD` (stesso nome, maiuscole diverse), `BRAINSTORM-*`, `QA-VERIFICATION.md`, `REFACTOR-panelmixin.md` (stub `deprecated`), `testing-fixes-progress-sessione-2025.md`, `magic-properties-cleanup-report-2025.md`, `lfs-resolution.md`, `git-conflict-resolution.md`.
- Non sono documentazione: 9 `.mdc` e 7 `.lock` nella radice (17 e 9 in tutto `docs/`), `*.sh`, `_scripts/`, `scripts/`, `root-code-workspace-files/`, `cursor-mcp-config.json`, `windsurf-mcp-config.json`, `mcp-laravel-artisan-server.js`.
- Cartelle senza contenuto utile (solo `.gitkeep`/`.gitignore`): `schema/`, `quality-analysis/`, `logs/`, `old_tasks/`, `_integration/`, `-integration/`, `roadmap/`.

## Problemi noti (misura 2026-10-14, `docs-organizer.py --busy-minutes 0 links --by-name`)

- 738 riferimenti relativi non risolti. Per sezione: wiki 160, phpstan 149, standards 141, bmad 121, consolidated 118, architecture 26, radice 16, rules 6, filament 1.
- Cause su tutti i 738 (classificazione per forma del percorso, un solo motivo per riga): 226 altri percorsi relativi; 224 file nella stessa cartella che non esistono; 147 con un segmento `Modules/` (es. `laravel/Modules/Geo/project_docs/...` scritto come se la base fosse la radice del repo); 59 che iniziano con `docs/` e non esistono sotto il modulo; 41 `../<dir>/docs/` con `<dir>` che non e' un modulo (es. `bashscripts`, `patient`); 37 con modulo esistente e file inesistente; 4 directory. Trasversale: 47 nominano progetti che non sono questo (gestionale, dental, patient, isee, orisbroker).
- `wiki/index.md` (50), `wiki/log.md` (45), `wiki/concepts/index.md` (20), `wiki/concepts/INDEX.md` (8), `bmad/index.md` (1), `bmad/readme.md` (11): link annotati `target mancante` il 2026-10-14. `docs-organizer.py` continua a contarli come `unresolved` anche dopo l'annotazione.
- Marcati `stale` il 2026-10-14 con motivo: `wiki/architecture.md`, `wiki/Architecture.md` (`getFormSchemaImplementation()` assente, trait inesistenti sul `BaseModel`, vincolo `*` in 23 requisiti su 37, 0 test `arch()`), `standards/README.md`, `standards/readme.md` (62 e 60 link verso altri progetti, sezione STI sul modulo Patient che non esiste), `governance/docs-structure.md` (dice che README.md e l'unico ingresso, il contratto ne vuole due).
- `QA-VERIFICATION.md`, `REFACTOR-panelmixin.md`, `BRAINSTORM-TestCase-Hierarchy-XotBase.md` dicono «vedi il file canonico» e puntano a una versione minuscola che non esiste: il solo contenuto e' lo stub.
- `wiki/index.md` cita `stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md`, che non esiste in `stories/`; `wiki/log.md` ha frammenti di frontmatter ripetuti dopo la riga 40 (residui di merge, non rimossi).

- Marker di merge: 24 file `.md` hanno righe `<<<<<<< ` o `>>>>>>> ` fuori dai blocchi di codice (misura 2026-10-14): 9 in `stories/` (es. `7.1-bmad-docs-audit-report.story.md`, `8.1-phpstan-l10-error-categorization.story.md`, `legacy-readme-new.md`) e 15 in `bmad/stories/`. Sono story: la policy vieta di riscriverle, quindi non sono state toccate; il testo di quei file non e' affidabile finche' i marker non vengono risolti.

## Story recenti
<<<<<<< HEAD
- [Stub XotBaseExporter (xlsxCell + eager-load)](stories/xotbaseexporter-scopo.md)
=======
>>>>>>> laraxot/dev
- [Docs Xot: studio del codice e ingressi (2026-10-14)](stories/docs-xot-studio-e-ingressi.story.md)
- [DCP-45 isolamento del DB nei test con pest-scratch-db.sh](stories/dcp-45-isolamento-db-test-pest-scratch.story.md) (open)
- [PHPStan cleanup Xot app (2026-10-06)](stories/phpstan-cleanup-xot-app.story.md), [Xot rest](stories/phpstan-cleanup-xot-rest.story.md)
- [Regressioni PHPStan su app (2026-10-08)](stories/phpstan-xot-app-regressions.story.md), [test senza assert (2026-10-08)](stories/phpstan-xot-tests-without-assertions.story.md)
- [Da Services ad Actions: artisan](stories/services-to-actions-xot-artisan.story.md), [route](stories/services-to-actions-xot-route.story.md), [small](stories/services-to-actions-xot-small.story.md)
