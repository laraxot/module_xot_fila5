---
id: "Xot/git-status-fleet-sync"
title: "git status fleet: sync moduli, marker Notify, commit root"
status: done
scope: fleet
module: Xot
created: 2026-09-22
related:
  - ./collection-export-intestazioni-esplicite.story.md
  - ./xot-base-exporter.story.md
  - ../../../../IndennitaResponsabilita/docs/bmad/stories/5.160-export-xls-ratings-titolo.story.md
qmd: "git status fleet modules sync marker Notify lang send_* commit root double tracking nested repos Sigma upstream"
---

# Story: git status + fix per ogni modulo

Status: done

## Contesto

Richiesta utente: `cd laravel/Modules/<modulo> && git status` e sistemare per
ogni modulo, con BMAD + second brain + quality tools.

## Esito verifica (18 moduli)

| Stato | Moduli |
|---|---|
| clean + synced `laraxot/dev` | tutti i 18 |
| untracked residuo | Xot (1 story, committata) |
| marker committati | Notify (4 lang `send_*`, risolti lato HEAD) |
| upstream mancante | Sigma (fix: `set-upstream-to laraxot/dev`, 0/0 vs remote) |

Lavoro non committato nei submoduli era gia' stato commitato da daemon/peer
(export ratings, cleanup, recovery rebase) — verificato contenuto a campione.

## Repo root (doppio tracking)

`laravel/Modules/*` tracciati sia nel repo root sia nei nested repo dei moduli.
Root aveva 84 file dirty. Commit raggruppati:

- `387efaca` feat(export): intestazioni rating + canale nativo Filament 5
- `7b76b24f` chore(modules): sync cleanup fleet (marker Notify, cs-fixer, UI docs)
- `c4133326` docs(bmad): stories cleanup + handoff
- `44c6487a` chore(themes): Zero/Three + assets ptv

Root ora clean, `dev` ahead 4 su `laraxot/dev` (push non richiesto).

## Marker residui fleet

Scan `<<<<<<<`/`>>>>>>>` su php/json/blade in tutti i moduli: solo i 4 Notify
(risolti). Docs con marker in esempi = falsi positivi noti.

## Gate

- `php -l` sui 4 lang Notify: ok; `php -r include` verifica struttura array: ok
- PHPStan max sul perimetro export: 0 errori (run precedente, nessun codice PHP
  toccato in questa sessione oltre i lang)
- Lock controllati: nessun lock attivo bloccante; orfani precedenti gia' rimossi
