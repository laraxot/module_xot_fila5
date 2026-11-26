---
title: "Le story BMAD usano nomi numerati (NNNN-slug.story.md)"
type: decision
status: accepted
created: 2026-11-25
updated: 2026-11-26
module: Xot
decision-makers: [Xot]
qmd: "ADR 0040 BMAD story basename NNNN-slug.story.md per-module sequence 0000-template exception supersedes 0039 filename"
related:
  - ./0039-bmad-stories-use-madr.md
  - ../bmad/stories/0000-template.story.md
  - ../bmad/stories/0044-bmad-stories-numbered-filenames.story.md
  - ./0000-template.md
  - ../../../../../bashscripts/ai/wiki/memories/bmad-stories-madr-format.md
  - ../../../../../bashscripts/ai/wiki/memories/adr-numbered-madr-template.md
---

# Le story BMAD usano nomi numerati (NNNN-slug.story.md)

> Regola valida per tutti i tenant che usano Xot: la sequenza numerica è per cartella di modulo o tema, non globale.

## Contesto

L'ADR [0039](0039-bmad-stories-use-madr.md) ha fissato il **corpo** delle story BMAD su MADR, ma ha lasciato i basename come kebab libero `slug.story.md`. Gli ID delle story mescolavano prefissi di epic (`5.255-…`), date e slug non ordinabili, quindi gli agenti non potevano citarle né ordinarle come citano gli ADR `NNNN`. Come rendiamo il basename di una story scorrevole e citabile quanto un ADR, senza inventare un secondo albero di documenti?

## Driver della decisione

- Stesso spirito dell'ADR dell'harness: `NNNN-titolo-con-trattini.md` → story `NNNN-titolo-con-trattini.story.md`.
- ID numerico stabile per la sequenza del modulo (o tema) proprietario, non un contatore globale del monorepo.
- Restano le regole sul corpo MADR di 0039; cambia solo la **clausola sul nome file** di 0039.
- Il debito legacy si migra al tocco o con un passaggio di rinomina, non con una riscrittura silenziosa della storia nel mezzo di una modifica.
- L'eccezione del template deve restare individuabile come `0000-template.story.md`.

## Alternative considerate

- Mantenere il solo kebab `slug.story.md` (regola sul nome di 0039).
- Numeri di story globali su tutto il monorepo.
- Riusare i prefissi epic/punto (`5.255-…`) come unico schema.
- **Richiedere `/^\d{4}-[a-z0-9]+(?:-[a-z0-9]+)*\.story\.md$/` per modulo, con eccezione `0000-template.story.md`** (scelta).

## Decisione

Scelta: **ogni basename di story BMAD DEVE essere `NNNN-titolo-con-trattini.story.md` e rispettare `/^\d{4}-[a-z0-9]+(?:-[a-z0-9]+)*\.story\.md$/`**, perché rispecchia l'ADR `NNNN-slug.md`, dà un ID citabile stabile e limita la sequenza alla cartella del modulo o tema proprietario.

Regole:

1. Le story **nuove** sotto `Modules/*/docs/bmad/stories/`, `Modules/*/docs/stories/`, gli equivalenti dei temi e, facoltativamente, `docs/stories/` / `docs/bmad/` di root: il prossimo `NNNN` libero **in quella** cartella (4 cifre con zeri), poi slug kebab, suffisso `.story.md`.
2. Regex sul basename intero: `^\d{4}-[a-z0-9]+(?:-[a-z0-9]+)*\.story\.md$`.
3. **Eccezione:** `0000-template.story.md` (e le copie di modulo con quel solo nome). Nessun altro `0000-*.story.md` per i lavori.
4. **Legacy:** il passaggio di rinomina del 2026-11-25 ha assegnato un `NNNN` al debito esistente; il lavoro nuovo non inventa mai `slug.story.md` solo kebab.
5. Il corpo resta MADR come in [0039](0039-bmad-stories-use-madr.md) e in [0000-template.story.md](../bmad/stories/0000-template.story.md).
6. Questo ADR **supera la clausola sul nome file** di 0039 (kebab-only / senza `NNNN`). 0039 resta accettato per l'ordine delle sezioni MADR.

## Conseguenze

- Buono: story e ADR condividono una grammatica dei nomi; le chiavi dello sprint possono citare `Modulo/NNNN-slug` in modo prevedibile.
- Buono: le sequenze per modulo evitano conflitti di numero fra moduli.
- Cattivo: gli agenti devono cercare il prossimo `NNNN` libero nella cartella proprietaria prima di creare una story, e due agenti in parallelo possono scegliere lo stesso numero (collisione già vista, memoria «Numero story: controllo che blocca»).

## Conferma

- `cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Docs/BmadStoriesAreMadrFormatTest.php`: il test «ogni BMAD story ha basename NNNN-slug.story.md» (riga 149, regex a riga 150) controlla ogni `*.story.md` di `Modules/*/docs/bmad/stories`, `Modules/*/docs/stories`, gli stessi percorsi nei temi e `docs/stories` / `docs/bmad` di root; unica eccezione `0000-template.story.md`.
- Il test non controlla l'unicità del numero dentro la cartella: nessuna conferma automatica oggi; proposta: un test che segnali due story con lo stesso `NNNN` nella stessa cartella.
- In review: respingere una story nuova con un nome kebab libero.
