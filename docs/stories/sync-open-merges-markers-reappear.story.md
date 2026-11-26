---
title: "[STORY] Merge aperti nei repo dei moduli: marker committati di nuovo, PHPStan non parte"
type: story
module: Xot
bmad: true
status: in-progress
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

Richiesta: `cd laravel && ./vendor/bin/phpstan analyse Modules` e correggere ogni segnalazione alla sorgente.
Fase BMAD: **Analyze → Implement** (prima di contare gli errori PHPStan serve un albero che compili).

## Cosa è stato misurato (2026-11-26, mattina)

- `analyse Modules` non produce errori: **non fa il bootstrap** (`syntax error, unexpected token "<<"`).
  Il bootstrap carica provider, rotte e classi Filament autoscoperte dei moduli.
- Lang, Cms, Geo, Media e Xot hanno un **merge aperto** (`.git/MERGE_HEAD`): HEAD locale contro la punta di
  `laraxot/dev` (7–11 commit "." dell'altra macchina). Quattro su cinque sono storie non correlate (nessun merge
  base, conflitti add/add); Xot ha un base vero. Percorsi non risolti: 338 Lang, 90 Cms, 208 Geo, 116 Media, 28 Xot.
- La sync ha committato i marker alle 08:14 e ha riaperto il merge: è L-007 che si ripete il giorno dopo #747.
- All'inizio: **528 file** con marker in `laravel/Modules` (278 non-md, 212 PHP). Il commit `5a6569d6ec` (#747) ha zero marker.

## Metodo (kit `bashscripts/tools/git/sync-repair/`, nessuno strumento nuovo)

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

## Da fare / aperto

- [ ] Esiti degli agenti per modulo e `rg '^(<<<<<<<|>>>>>>>) '` a zero in `laravel/Modules`.
- [ ] Debito scoperto: `Xot/tests/Unit/Routing/CanonicalEmptyRouteEntrypointsTest.php` impone il `require` che l'ADR
  0029 vieta (due test si contraddicono); `Fixcity/routes/web.php` richiede ancora `empty.php`.
- [ ] PHPStan `analyse Modules`: primo run reale dopo il bootstrap, poi correzioni per modulo.
- [ ] **[ATTESA-UMANO]** La causa a monte non è riparabile da un agente: finché la sync fonde `laraxot/dev` (storia
  squashata) in storie locali da 6.000 commit, i marker ritornano a ogni ciclo. Serve decidere come allineare i remoti.

## Coordinamento

Agenti paralleli (Codex, Cursor, altre sessioni): i file con marker elencati qui sono in lavorazione; controllare
`git diff`/mtime prima di toccarli. Questa story è il punto di coordinamento (regola AGENTS.md).
