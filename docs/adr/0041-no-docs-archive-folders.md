---
title: "Nessuna cartella di archivio nei docs: il ripristino passa da Git"
type: decision
status: accepted
created: 2026-11-25
updated: 2026-11-26
module: Xot
decision-makers: [Xot]
qmd: "ADR 0041 no docs archivio archive _archive backup historical ripristino da storia git"
related:
  - ./0005-owner-local-documentation.md
  - ./0040-bmad-stories-numbered-filenames.md
  - ../bmad/stories/0175-no-docs-archive-folders.story.md
  - ../../../../../bashscripts/ai/wiki/memories/docs-second-brain.md
---

# Nessuna cartella di archivio nei docs: il ripristino passa da Git

> Regola valida per tutti i tenant che usano Xot: vale per `docs/` di ogni modulo e tema.

## Contesto

Agenti e persone continuano a creare `docs/archivio/`, `docs/archive/`, `docs/_archive/` (e simili) come discariche «sicure» di `.md` superati. Quegli alberi gonfiano il tetto dei docs, duplicano la storia di Git e diventano una seconda fonte di verità che nessuno cura. Come vietiamo le cartelle di backup dei documenti senza perdere la recuperabilità?

## Driver della decisione

- Ordine dell'utente: niente `archivio` né discariche in stile archivio; il ripristino si fa con Git.
- KISS / DRY: un solo albero `docs/` vivo per modulo o tema.
- Tetto di ≤100 `.md` per `docs/` (campagna ADR / story 0174).
- Far rispettare il divieto con `.gitignore`, perché le cartelle non rientrino nell'indice senza che nessuno se ne accorga.

## Alternative scartate

- Tenere le cartelle di archivio con dei rimandi (stub) — scartata: seconda fonte di verità.
- Mettere in quarantena fuori da `docs/` — scartata: resta una discarica.
- **Vietare le cartelle con nome da archivio sotto `docs/`; la storia è Git** — scelta.

## Decisione

Scelta: **non creare né tenere cartelle di archivio della documentazione sotto `Modules/*/docs` e `Themes/*/docs`**.

Nomi di cartella vietati (a qualsiasi profondità sotto `docs/`):

- `archivio`, `archive`, `_archive`, `archived`
- `historical`, `backup`, `backups`

Ammesso altrove:

- la storia di Git: si legge una versione passata con `git show <revisione>:<percorso>`;
- sintesi e digest per argomento che sono documenti **vivi** e curati (non chiamati come alberi di archivio);
- gli stub ADR `superseded` che puntano a un canonico numerato (non sono una cartella di archivio).

Applicazione:

1. Eliminare gli alberi vietati esistenti (il contenuto è recuperabile dalla storia di Git).
2. Il `.gitignore` di ogni modulo o tema ignora quei percorsi sotto `docs/`.
3. Regola Cursor e memoria del second brain `no-docs-archive-folders`.

## Conseguenze

- Buono: i docs restano aggiornati, il tetto è controllabile e il ripristino passa da Git.
- Cattivo: gli agenti devono smettere di «parcheggiare» gli `.md` in archivio (attenuato dal `.gitignore` e da questo ADR).
- Cattivo: `.gitignore` nasconde il contenuto ma non impedisce la cartella sul disco, quindi il divieto non si vede finché qualcuno non lancia il controllo (vedi «Stato attuale»).

## Stato attuale

Misurato il 2026-11-26:

- Il comando di Conferma sotto restituisce **15 cartelle** sotto `laravel/Modules`: `Cms` (`sections/archive`, `migrations/archive`, `wiki/_archive`, `themes/archive`), `Fixcity` (`bmad/_archive`), `Geo` (`amministrazione/backup`, `wiki/_archive`, `docs/wiki/_archive`), `Job` (`_integration/archive`, `wiki/_integration/archive`), `Media` (`_integration/archive`, `wiki/_archive`, `wiki/_integration/archive`), `User` (`fixes/archive`) e `Xot` (`docs/consolidated/archive`). Quasi tutte contengono file tracciati (per esempio `Fixcity/docs/bmad/_archive`: 7 su 7; `Cms/docs/sections/archive`: 6 su 6).
- In Xot, `docs/consolidated/archive` ha 10 file e nessuno tracciato: li nasconde il `.gitignore` (`docs/**/archive/`, riga 54), ma la cartella esiste sul disco.
- `Modules/Xot/.gitignore` contiene le voci richieste (righe 224-231 e 242-243: `archivio`, `_archive`, `*backup*`, `historical`).
- `.cursor/rules/no-docs-archive.mdc`, citato dalla versione precedente come regola Cursor, **non esiste**: `.cursor` è un link a `bashscripts/ai/.agents`, e `.cursor/rules/` (80 file) non contiene nessun file `.mdc` né un file con «archiv» nel nome.
- Il puntatore di root `docs/adr/0006-no-docs-archive-folders.md` (citato in `index.md` e `INDEX.md` di questa cartella) non esiste.

La decisione resta valida; lo stato reale è debito: le cartelle fuori da Xot appartengono a moduli altrui e non si toccano da qui, e per quelle tracciate serve prima la mappa dei link che le citano.

## Conferma

- Da `laravel/`: `find Modules Themes -type d \( -name archivio -o -name archive -o -name _archive -o -name archived -o -name historical -o -name backup -o -name backups \) -path '*/docs/*'` deve restare vuoto (oggi: 15 risultati, vedi «Stato attuale»).
- Il `.gitignore` del modulo contiene il blocco di ignore: `grep -n "ADR Xot 0041" Modules/Xot/.gitignore` trova la riga 227 (presente il 2026-11-26).
- Nessun test automatico verifica l'assenza delle cartelle; proposta: un test source-level in `Modules/Xot/tests/Unit/Docs/` che esegua il `find` sopra con una allowlist per le cartelle tracciate da migrare.
