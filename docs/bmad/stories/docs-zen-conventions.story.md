---
title: "Xot: bonifica convenzioni docs .md"
type: story
status: done
module: Xot
epic: docs-second-brain
created: 2026-11-25
updated: 2026-11-25
qmd: "xot docs bonifica annidamento docs/bashscripts/docs/source/docs duplicati md5 INDEX.md index.md collisione maiuscole contracts template AGENTS.md coverage kebab qmd"
related:
  - ./docs-zen-conventions-swarm.story.md
---

# Xot: bonifica convenzioni docs

## Perche'

Lane E dello swarm [docs-zen-conventions-swarm](./docs-zen-conventions-swarm.story.md) (story ombrello e
`git-objects-slimming-independent-repos.story.md` non toccate).

## Prima / Dopo

| Misura | Prima | Dopo |
|---|---:|---:|
| file `.md` | 716 | 699 (+1 questa story) |
| copie esatte md5 | 29 | 22 (tutte `*.story.md`, non eliminabili) |
| nomi datati | 1 (story) | 1 (story, nome invariato) |
| non kebab | 12 | 7 (eccezioni motivate) |
| senza frontmatter | 0 | 0 |
| senza `qmd` | 2 | 0 |
| annidamenti generati | 4 | 0 |

## Eliminato / fuso

- Annidamento generato `docs/bashscripts/docs/{,source/docs/}{confidence-guidelines,filament-version}.md`: template generici
  (checklist "New Relic/Sentry", dichiarazione Filament con segnaposto `{ModuleOrThemeName}`), non esistono nel `bashscripts/docs` reale. Rimossi con le cartelle vuote.
- `INDEX.md` identico a `index.md` -> rimosso.
- `bmad/coverage.md`, `bmad/coverage-100-execution-notes.md`: residui dello spostamento in `wiki/testing/` (story 7.1.1).
- `contracts/template.md` = `contracts/_template.md`: tenuto `_template.md`, l'unico escluso da `tests/Unit/Docs/ActionContractsAreCompleteTest.php`
  (la copia `template.md` con `type: contract` veniva trattata come contratto vero).
- `contracts/index.md` collideva per maiuscole con `contracts/INDEX.md` (letto da `bashscripts/tools/harness/harness-audit.py`): fuso nel maiuscolo; link in `adr/0011-*`, `adr/README.md` aggiornati.
- `wiki/commands/INDEX.md`, `wiki/commands/index-2.md`, `wiki/concepts/INDEX.md`, `wiki/concepts/index-2.md` -> `index.md` (il "See Also" del maiuscolo puntava a 3 file inesistenti); rimosso da `wiki/concepts/index.md` un frontmatter duplicato incollato in fondo.
- `wiki/Architecture.md` (alias superseded) -> `wiki/architecture.md`.
- `wiki/agents.md` (stesso testo + frontmatter iniettato nel corpo) -> `wiki/AGENTS.md`.
- `wiki/root-md-files/.md` e `untitled.md`: solo frontmatter (titolo "3"), nessun contenuto.
- `qmd` aggiunto a `adr/README.md`, `adr/mixed-is-last-resort.md`.

## Casi lasciati in dubbio

- `wiki/AGENTS.md`: nome riconosciuto dagli agenti (come README); tenuto maiuscolo invece di `agents.md`.
- `adr/INDEX.md`, `contracts/INDEX.md`, `contracts/_template.md`: vincolati da harness-audit e dal test Pest.
- `bmad/stories/STORY-512-*.md`, `bmad/stories/ST-XX-*.md`, `stories/STORY-XXX-*.md` e le loro varianti kebab `-2.md` (diverse): story, nomi non toccati.
- 22 copie esatte tra story (`*-.story.md`, `*-2.story.md`, `5-2.261`/`5.261`, `13-dcp-45`/`dcp-45`): vietato eliminare story; da marcare superseded in un passaggio dedicato.
- `bmad/stories/phpstan-modules-scan-devin-20261125.story.md`: nome datato, story -> solo segnalato.
- `wiki/architecture-2.md` diverso da `wiki/architecture.md` (83 righe di diff): non fuso.
- `laravel/Modules/Notify/docs/ai-agents/project-docs-index.md:6946` cita `Xot/docs/contracts/index.md` (Notify in lock lane A).

## Gate

Solo `.md`: PHPStan/Pint/Pest non applicabili (skip documentato, PHPStan gia' 0).
