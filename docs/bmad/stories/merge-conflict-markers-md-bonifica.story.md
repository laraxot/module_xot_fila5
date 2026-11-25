---
title: "Bonifica marker di conflitto committati nei file non-PHP dei moduli (d24d597f8b)"
type: story
epic: tooling-quality
module: Xot
status: review
created: 2026-11-25
qmd: "marker conflitto md committati d24d597f8b sync-repair nested_resolve resolve_by_common_blob notify user activity lang"
related:
  - ./merge-conflict-markers-committed-bonifica.story.md
  - ./git-collisions-merge-resolution.story.md
  - ../../../../../../bashscripts/docs/operations/sync-repair-tools.md
---

# Bonifica marker `.md` committati

## Perche'

Il commit root `d24d597f8b` (09:21, messaggio ".") ha portato 3624 file con marker
`<<<<<<< HEAD` / `>>>>>>> laraxot/dev` (e `.merge_file_*` annidati) sotto `laravel/Modules`.
La parte PHP e' gia' bonificata nel working tree (story gemella). Restano ~3650 file non-PHP
(3641 `.md`, 17 `.mdc`, 5 `.gitignore`, 2 `.sh`, 1 yaml, 1 json): documentazione dei moduli
illeggibile, link duplicati, front matter doppio, QMD che indicizza rumore.

`SYNC_BASE = c826d2258b` (ultimo commit root prima del commit di massa: 19 file con marker contro 3624).

| Modulo | File |
|---|---:|
| Notify | 2431 |
| User | 555 |
| Activity | 215 |
| Lang | 204 |
| UI | 87 |
| Xot | 79 |
| Media | 77 |
| Job | 19 |

## Metodo

Kit `bashscripts/tools/git/sync-repair/` (doc: `bashscripts/docs/operations/sync-repair-tools.md`):
dry-run → report → `--apply` solo dopo tar di backup; residui a mano secondo
`bashscripts/ai/wiki/rules/git-conflicts-merge.md` (lato con link esistenti, lato kebab-case
senza suffissi `-3`, mai `|:` al posto di `—`). Nessun commit/push automatico.

Lock: `bashscripts/lock/markers-md-20261125-<Modulo>.lock`.

## Acceptance criteria

- [ ] `grep -rlE '^(<<<<<<< |>>>>>>> )' laravel/Modules` = 0 (o residui elencati con motivo)
- [ ] Nessun `.php` toccato da questa lane
- [ ] Backup tar dei file originali in scratchpad prima di ogni `--apply`
- [ ] Report per modulo: risolti / residui / regole applicate
- [ ] PHPStan Modules invariato (0 errori) dopo la bonifica

## Note

L'upstream `laraxot/module_notify_fila5` ha gia' i marker committati (2411 file): senza un push
della bonifica il prossimo sync li reintroduce. Il push e' fuori scope (azione esterna, serve
consenso utente).

## Esito (2026-11-25 10:30)

Conteggio reale con `/usr/bin/grep` (la funzione zsh `grep` nascondeva archive/.bak: User 828 non 555, UI 136 non 87).

| Modulo | Iniziali | Residui marker | Metodo |
|---|---:|---:|---|
| User | 828 | 0 | kit `nested_resolve --partial` + scelta per hunk (link esistenti, no `-N`) |
| Activity | 215 | 0 | ripristino blob `c826d2258b` (167) + base + link post-d24d |
| Lang | 204 | 0 | ripristino blob `c826d2258b` (186) |
| UI | 136 | 0 | resolver per hunk: remoto = riscrittore `-N` → locale |
| Xot | 81 | 0 | idem; 9 file con upstream corrotto → locale |
| Media | 77 | 0 | idem |
| Notify | 2454 | 0 al commit `d14a06fbe`, poi **riaperti** | base-zone su `c826d2258b`; vedi STOP |
| Job | 19 | 19 | **non toccato**: merge aperto (35 unmerged) |

Trappola "un lato vuoto" (blob a SYNC_BASE = lato vuoto → cancellazione voluta): applicata in
tutte le lane; Activity 175 hunk, Notify 31 righe, UI/Xot/Media 8 hunk lasciati vuoti.

Backup originali: scratchpad sessione `8f1ecc86` (`backup-<Mod>.tgz`), effimero.

## STOP Notify

10:27–10:28 una shell interattiva ha lanciato `bashscripts/git/subtrees/merge_remote_repo_2.sh laraxot`
(cwd Modules/Notify): `commit -am .` → `d14a06fbe` (bonifica inclusa, 0 marker), poi merge con
`laraxot/dev` (upstream con marker) → 2058 file `UU`, marker riapparsi. Non interrotto (avviato
da utente). Ripresa: a script uscito, prendere i file da `d14a06fbe` (`git -C laravel/Modules/Notify
checkout d14a06fbe -- docs .github` solo dopo aver valutato la merge); poi push della bonifica su
`laraxot/dev` (serve consenso: e' la sorgente che reintroduce i marker a ogni sync).

## Debito residuo

- Job: merge aperto + 19 file marker; un commit `fila5-guard` (10:05) e' stato fatto a merge aperto.
- `=======` orfani gia' presenti a `c826d2258b` (contenuto, non residui): User 5, Activity/Lang 26, UI/Xot/Media 9, Notify ~20.
- Duplicati `-2/-3/-4` riportati da d24d in Activity (12); Notify 91 file con sezioni ripetute da rileggere, ~31 chiavi frontmatter doppie.
- Kit: `nested_resolve.py --files-from` vuole path relativi al modulo; `pgrep -af merge_remote_repo` matcha se stesso (usare `'[m]erge_remote_repo'`).

## AC

- [~] Marker 0: si' in User/Activity/Lang/UI/Xot/Media; Notify riaperto dalla sync; Job escluso
- [x] Nessun `.php` toccato da questa lane
- [x] Backup prima di ogni scrittura
- [x] Report per modulo
- [x] PHPStan Modules 0 errori (run cache fredda 10:2x)
