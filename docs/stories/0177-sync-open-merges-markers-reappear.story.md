---
title: "[STORY] Merge aperti nei repo dei moduli: marker committati di nuovo, PHPStan non parte"
type: story
module: Xot
bmad: true
status: in-progress
date: 2026-11-26
decision-makers: [utente]
priority: critical
created: 2026-11-26
updated: 2026-11-26
tags: [sync, merge, marker-conflitto, phpstan, forward-only, swarm]
qmd: "merge aperto MERGE_HEAD marker laraxot/dev phpstan bootstrap routes empty.php adr 0029 swarm blob antenato"
related:
  - ./sync-unrelated-histories-repair.story.md
  - ./module-sync-stale-snapshot-and-phpstan-zero.story.md
  - ../adr/0029-no-shared-empty-route-file.md
  - ../adr/0036-route-entrypoints-canonical-empty.md
---

# Merge aperti nei repo dei moduli: PHPStan non parte

## Context and Problem Statement

Richiesta: `cd laravel && ./vendor/bin/phpstan analyse Modules` e correggere ogni segnalazione alla sorgente.
Fase BMAD: **Analyze → Implement** (prima di contare gli errori PHPStan serve un albero che compili).

Domanda a cui risponde la story: come riportare un albero che compila dopo che la sync ha committato marker di conflitto e
riaperto i merge, senza perdere lavoro di nessun lato e senza `reset`?

### Cosa è stato misurato

- `analyse Modules` non produce errori: **non fa il bootstrap** (`syntax error, unexpected token "<<"`).
  Il bootstrap carica provider, rotte e classi Filament autoscoperte dei moduli.
- Lang, Cms, Geo, Media e Xot hanno un **merge aperto** (`.git/MERGE_HEAD`): HEAD locale contro la punta di
  `laraxot/dev` (7–11 commit "." dell'altra macchina). Quattro su cinque sono storie non correlate (nessun merge
  base, conflitti add/add); Xot ha un base vero. Percorsi non risolti: 338 Lang, 90 Cms, 208 Geo, 116 Media, 28 Xot.
- La sync ha committato i marker alle 08:14 e ha riaperto il merge: è L-007 che si ripete il giorno dopo #747.
- All'inizio: **528 file** con marker in `laravel/Modules` (278 non-md, 212 PHP). Il commit `5a6569d6ec` (#747) ha zero marker.

## Decision Drivers

- PHPStan non fa il bootstrap con un solo marker in un provider, in una rotta o in una classe Filament autoscoperta.
- Regola forward-only: niente `reset`/`checkout`; il backup sta nello scratchpad e i fix sono commit in avanti.
- Un conflitto è collaborazione: si studia e si fonde, non si sceglie un lato per default.
- Più sessioni scrivono sullo stesso albero: un solo scrittore per file e verifica prima di dire «fatto».

## Considered Options

- Tornare all'ultimo commit pulito (`5a6569d6ec`): scartata, perde il lavoro locale e viola il forward-only.
- Scegliere sempre un lato: scartata, ha già prodotto cancellazioni silenziose (contratti, test, stub).
- Unione semantica con prova (discendenza per SHA di blob, regole verificabili, un agente per modulo): scelta.

## Decision Outcome

Scelta: **unione semantica verificabile**, perché è l'unica che non perde contenuto e si può controllare con `php -l`,
`rg` sui marker e PHPStan.

### Metodo

1. Backup dei 528 file nello scratchpad della sessione (niente `reset`/`checkout`: forward-only).
2. `resolve_by_common_blob.py` con `SYNC_BASE=5a6569d6ec`: discendenza per SHA di blob (ff-theirs, ff-ours, merge a 3 vie).
   Applicato: 59 file PHP, `php -l` pulito.
3. `nested_resolve.py` (regole verificabili), solo sui file senza righe scartate: 98 file scritti.
4. Rotte (`Lang`/`Media` web+api, `Cms` api): HEAD richiedeva `Modules/Xot/routes/empty.php`, il remoto no.
   **Verdetto: lato remoto** (stub locale senza `require`): l'ADR 0036 (`empty.php` canonico) è `superseded`
   dallo [0029](../adr/0029-no-shared-empty-route-file.md), `accepted` il 2026-11-24, con il test
   `Xot/tests/Unit/Architecture/NoSharedEmptyRouteFileTest.php`.
5. Il resto (~217 file, in gran parte `.md`) richiede giudizio: un agente per modulo, un solo scrittore per file
   (Lang, Cms, Geo, Media, Xot + moduli minori). Liste e backup nello scratchpad; nessun agente stagea, committa o aborta.

### Consequences

- Buono, perché il bootstrap riparte, PHPStan `analyse Modules` torna a zero e ogni file risolto ha un verdetto motivato.
- Cattivo, perché la causa a monte resta: finché la sync fonde `laraxot/dev` (storia squashata) in storie locali da 6.000
  commit i marker ritornano; e il cap «≤100 md» dell'altra macchina può cancellare di nuovo i contratti.

### Confirmation

- [x] Esiti degli agenti per modulo e `rg '^(<<<<<<<|>>>>>>>) '` a zero in `laravel/Modules` (verificato 2026-11-26
  09:36; nessun `MERGE_HEAD` aperto in moduli e temi). Resta un solo file con marker, fuori da `Modules`:
  `Themes/Sixteen/docs/stories/front-office-full-review.story.md` (story di un altro agente, non toccata).
- [ ] Debito scoperto: `Xot/tests/Unit/Routing/CanonicalEmptyRouteEntrypointsTest.php` impone il `require` che l'ADR
  0029 vieta (due test si contraddicono); `Fixcity/routes/web.php` richiede ancora `empty.php`.
- [x] PHPStan `analyse Modules`: dopo il bootstrap il primo run reale (09:12, 2m58s) ha dato **un** errore
  (`unlink` non Safe in `Lang/tests/Feature/SaveTransActionRespectsSwitchTest.php:56`), corretto da un altro attore con
  `use function Safe\unlink;`. Run di conferma 09:36: `exit=0`, zero righe di errore. Misura puntuale: altri agenti
  scrivono ancora nell'albero, va rifatta prima di dire «fatto».
- [x] Causa dei contratti spariti (AI, Gdpr: 6 file alle 07:34; Media: 49 su 51 col commit `9a3f852f`): il tool
  `bashscripts/tools/docs/docs-ceiling-100.py` proteggeva solo i `@see Modules/<M>/docs/...` col percorso intero, non la
  forma relativa dello standard (`@see|@contract docs/contracts/x.md`), e non escludeva `contracts/`. Corretto in locale
  (protegge la forma relativa e `contracts/`); dry-run: col tool originale 26 contratti AI e 16 Gdpr in piano di rimozione,
  col corretto zero. **Non committato né pushato**: `bashscripts` è un repo a sé (symlink condiviso con ptvx).
- [ ] **[ATTESA-UMANO]** Avvisare l'altra macchina (e decidere il push in `bashscripts`): i pacchetti sono di nuovo sopra
  le 100 pagine (Geo 2152, Lang 1067, Cms 1037, Fixcity 924) e la versione vecchia del tool rimuoverebbe i contratti.
- [ ] **[ATTESA-UMANO]** La causa a monte non è riparabile da un agente: finché la sync fonde `laraxot/dev` (storia
  squashata) in storie locali da 6.000 commit, i marker ritornano a ogni ciclo. Serve decidere come allineare i remoti.

## Coordinamento

Agenti paralleli (Codex, Cursor, altre sessioni): i file con marker elencati qui sono in lavorazione; controllare
`git diff`/mtime prima di toccarli. Questa story è il punto di coordinamento (regola AGENTS.md).
