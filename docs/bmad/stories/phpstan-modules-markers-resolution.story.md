---
title: Marker di merge in Notify/Media risolti — PHPStan 0 errori
qmd: merge conflict markers notify media phpstan 2026-11-25 devin merge_remote_repo_2 sync
status: done
---

# Marker di merge in Notify/Media — 2026-11-25 (devin)

## Contesto scoperto

- `bashscripts/git/subtrees/merge_remote_repo_2.sh` e' lo **sync tool ufficiale** (NON deprecato): per ogni path di `gitmodules.ini` fa `git add -A && git commit -am . && git fetch laraxot dev && git merge laraxot/dev --allow-unrelated-histories (-s resolve fallback) && git push`. Ogni `laravel/Modules/<Mod>` e' un **repo git nested** con remote `laraxot/dev`.
- Pericolo documentato nell'header stesso (righe 12-14): un merge lasciato aperto da un run precedente viene concluso dal `git commit -am .` successivo **con i marker dentro**, e il push li pubblica. E' la causa dei commit `d24d597f8b` / `c4ff0df34b` con marker committati. Riparazione: `bashscripts/docs/operations/sync-repair-tools.md`.

## Lavoro svolto

- Rilevati marker `<<<<<<<` in 24 file PHP: Notify (21) + Media (3).
- Generati candidati ours/theirs con parser Python per conflitti annidati `.merge_file_*`; verificati contro versioni storiche (`git log --all`): ours-linea = `75e038922c` (dev locale piu' recente), theirs-linea = `767fcbdfc`/`3c08738753` (laraxot/dev). Risoluzione = versione locale (piu' recente e formattata), che risultava superset semantico delle chiavi lang.
- Esito: 0 marker in `Modules/**/*.php`, `php -l` verde su tutti i file toccati.
- Moduli Notify (`a6a34ea`) e Media (`02cd0ca`) hanno gia' la risoluzione committata nei rispettivi repo nested (agenti paralleli); worktree allineato.

## Gate

- `phpstan analyse Modules` (cache `/tmp/phpstan` svuotata): **exit 0, 0 errori**. I 10 errori `RawJs::toHtml` su Xot erano artefatto transiente (vendor/cache durante composer install parallelo); riesecuzione pulita 0 errori.
- Pest: **skip documentato** — `TestDatabaseGuard` rifiuta connessione mysql host `10.100.200.53` non locale.

## Debito residuo

- ~3650 file **non-PHP** con marker (story `Xot/merge-conflict-markers-md-bonifica`, in-progress).
- Preventivo: il flusso merge_remote_repo_2 va eseguito solo a merge chiusi; valutare guardia pre-commit che rifiuti `<<<<<<<` (esiste gia' `NoConflictMarkersTest` in Xot — verificare copertura).
