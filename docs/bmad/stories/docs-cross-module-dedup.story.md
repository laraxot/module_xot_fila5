---
title: "Docs cross-module: canonico unico per i duplicati tra moduli e temi"
type: story
module: Xot
epic: tooling-quality
story_id: docs-cross-module-dedup
slug: docs-cross-module-dedup
status: in-progress
track: quick-flow
created: 2026-11-25
updated: 2026-11-25
qmd: "docs cross-module duplicati esatti canonico unico moduli temi link rewrite verifica swarm coordinamento"
related:
  - ./docs-semantic-consolidation-swarm.story.md
  - ./8.25.docs-consolidation-audit-strategy.story.md
---

# Docs cross-module: canonico unico

## Perche'

Le lane per modulo (story `docs-semantic-consolidation-swarm`) fondono i duplicati
**dentro** un modulo/tema. Restano i duplicati **tra** owner: 68 gruppi con corpo
identico e 298 file (misura 2026-11-25, esclusi `raw/`, `stories/`, `bmad/`,
template e nomi convenzionali). I piu' grandi: `Asset binari` in 17 owner,
`Massima confidenza agente` in 13, `context-overflow-prevention` in 10,
`html2pdf` in 4. Nessuna lane possiede la scelta del canonico cross-module.

## Scope

- Solo duplicati **esatti di corpo** tra owner diversi (hash del corpo normalizzato).
- Canonico scelto per argomento (mappa topic -> owner) e, in mancanza, per
  profondita'/assenza di cartelle archivio; un solo file superstite per gruppo.
- Riscrittura dei link entranti (`.md`, root e moduli) verso il canonico.
- Verifica link/frontmatter/nomi e conteggio prima/dopo.
- **Fuori scope:** sintesi semantica per modulo (lane peer), file `.php`,
  `raw/`, `stories/`, `*.story.md`, template, commit/push.

## Coordinamento

- Peer: `docs-semantic-consolidation-swarm` (lock `docs-semantic-20261125-*`)
  e `docs-consolidate-*` (exact/near-dup per modulo). Non si tocca un file con
  lock attivo o modificato da meno di 10 minuti.
- Questo lavoro parte **dopo** il rilascio dei lock delle lane, per non
  cancellare file che stanno fondendo. Strumento e piano sono pronti prima.
- Tool: `bashscripts/tools/docs/consolidate-exact-dups.py` (dry-run di default,
  `--apply` esplicito, report JSON).

## Acceptance criteria

- [ ] Conteggio `.md` per owner prima/dopo, con elenco dei gruppi risolti
- [ ] Nessun link relativo rotto in piu' (`docs-organizer.py links --report`)
- [ ] Frontmatter valido con `qmd` sul canonico; alias assorbiti
- [ ] `md-filenames.py check` senza nuove violazioni; nessun marker
- [ ] Story aggiornata con esito reale e riferimenti ai peer

## Log

- 2026-11-25: censimento 68 gruppi cross-owner (298 file). Lane peer attive su
  tutti i moduli/temi (lock 11:38-11:39). Preparati story, tool e piano;
  applicazione rinviata a lock rilasciati.
