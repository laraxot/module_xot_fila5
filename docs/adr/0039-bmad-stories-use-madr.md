---
title: "Le story BMAD usano MADR (stesso spirito del template ADR dell'harness)"
type: decision
status: accepted
created: 2026-11-25
updated: 2026-11-26
module: Xot
decision-makers: [Xot]
qmd: "ADR 0039 BMAD stories MADR template 0000-template.story migrate on touch"
note: "La clausola sul nome file (solo kebab, senza NNNN) è superata da 0040; le regole sul corpo MADR restano."
superseded_by_filename: ./0040-bmad-stories-numbered-filenames.md
related:
  - ../bmad/stories/0000-template.story.md
  - ../bmad/stories/bmad-stories-madr-format.story.md
  - ./0000-template.md
  - ./0040-bmad-stories-numbered-filenames.md
  - ../../../../../bashscripts/ai/wiki/memories/bmad-stories-madr-format.md
---

# Le story BMAD usano MADR (stesso spirito del template ADR dell'harness)

> Regola valida per tutti i tenant che usano Xot: vale per le story di ogni modulo e tema.

## Contesto

Le story BMAD dei vari moduli usavano forme ad hoc (Fact-gate / Fix / Verifica, prosa libera in italiano, prefissi numerici di epic). Agenti e persone non potevano scorrere una story come scorrono un ADR. Come rendiamo ogni story nuova o modificata leggibile nello stesso formato di decisione, senza inventare un secondo albero di documenti?

## Driver della decisione

- Stesso spirito del template ADR dell'harness (Contesto → Driver → Opzioni → Esito → Conseguenze → Conferma).
- Le story restano nelle cartelle esistenti `docs/bmad/stories/` (o `docs/stories/`): nessuna cartella nuova.
- Il corpo deve coincidere con il MADR dell'harness (la politica sul nome file è stata separata in 0040).
- Il debito legacy si migra quando si tocca il file (boy-scout), non con una riscrittura di massa.
- Fact-gate / Fix / Pest si mappano senza perdita su MADR più estensioni BMAD.

## Alternative considerate

- Lasciare a ogni autore la propria forma libera.
- Inventare uno schema solo-BMAD scollegato da MADR.
- Imporre il prefisso `NNNN-` su ogni story come per gli ADR — **decisione sul corpo rinviata; il nome file è deciso in [0040](0040-bmad-stories-numbered-filenames.md)**.
- **Adottare l'ordine di sezioni MADR inglese per le story, con le estensioni BMAD dopo Confirmation, e come fonte unica il template Xot `0000-template.story.md`** (scelta).

## Decisione

Scelta: **adottare l'ordine di sezioni MADR inglese per tutte le story BMAD nuove o modificate**, perché riusa il modello mentale dell'harness che gli agenti già conoscono per gli ADR e vive nell'albero `docs/bmad/` di Xot.

Regole:

1. Ogni story **nuova** o **modificata** sotto `Modules/*/docs/bmad/stories/` o `Modules/*/docs/stories/` (e gli equivalenti dei temi) segue [0000-template.story.md](../bmad/stories/0000-template.story.md).
2. Sezioni obbligatorie del corpo (intestazioni inglesi, per stabilità del grep): Context and Problem Statement, Decision Drivers, Considered Options, Decision Outcome, Consequences, Confirmation; poi le estensioni BMAD Acceptance Criteria ed Esito. Le intestazioni inglesi valgono per le **story**; gli **ADR** usano le intestazioni italiane (Contesto, Driver della decisione, Alternative scartate, Decisione, Conseguenze, Conferma).
3. **Legacy:** si migra al template quando il file viene toccato; nessuna riscrittura obbligatoria della flotta.
4. **Nome file (superata):** la regola kebab-only / senza `NNNN` che stava qui è **superata da [0040](0040-bmad-stories-numbered-filenames.md)** — il basename è `NNNN-slug.story.md` (eccezione `0000-template.story.md`).
5. Le regole sul nome degli ADR (`NNNN-slug.md`) non cambiano: vedi [0000-template.md](./0000-template.md) e la memoria `adr-numbered-madr-template`.

## Conseguenze

- Buono: story e ADR condividono una grammatica di lettura; Fact-gate corrisponde a Contesto + Driver, Fix a Esito della decisione, Pest a Conferma/Esito.
- Buono: la fonte unica è un solo template sotto Xot BMAD; i moduli lo linkano, non lo copiano.
- Cattivo: modificare una story legacy costa prima un passaggio di formato.
- Cattivo: le intestazioni inglesi stonano accanto alla prosa italiana; si mantiene italiano per UI e lang, inglese per le intestazioni MADR delle story.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Docs/BmadStoriesAreMadrFormatTest.php`: il test «ogni BMAD story ha le sezioni MADR obbligatorie» (riga 110) controlla le sei intestazioni inglesi in ogni `*.story.md` di `Modules/*/docs/bmad/stories`, `Modules/*/docs/stories` e degli stessi percorsi nei temi (esclusi `0000-template.story.md`, `README.md`, `INDEX.md`, `index.md`).
- Non controllati dal test: Acceptance Criteria ed Esito, e il legame fra la chiave di `docs/sprint-status.yaml` e una story in formato MADR. Sono regole di review.
- In review: respingere una story che inventa un template parallelo fuori da `0000-template.story.md`.
