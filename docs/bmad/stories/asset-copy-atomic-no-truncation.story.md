---
id: "Xot/asset-copy-atomic-no-truncation"
title: "AssetAction — copia atomica, il logo pubblico non si tronca più"
status: done
module: Xot
created: 2026-09-29
related:
  - 5.180-asset-action-copy-best-effort-logo.story.md
  - 5.223-admin-login-logo-asset-copy.story.md
  - ../../../../../docs/wiki/memories/public-path-is-public-html.md
  - ../../../../../docs/wiki/rules/no-git-lfs.md
qmd: "AssetAction copyAsset atomic rename truncation logo vuoto 0 byte php -S docroot public_html opencode"
---

# Story — il logo in alto a sinistra sparisce

## Segnalazione

2026-09-29, `http://127.0.0.1:8000/indennitaresponsabilita/admin/scheda-dips/9240/compila`:
il logo in alto a sinistra non si vede più. Ipotesi dell'utente: Git LFS (che il progetto
non usa).

## Non era LFS

I PNG sono blob veri: `git cat-file -s` coincide con la dimensione su disco, nessun
puntatore `version https://git-lfs`, nessun `filter=lfs` sul path. `filter.lfs.*` esiste
solo in `/etc/gitconfig` (di sistema, fuori dal repo). Stessa conclusione di 5.223.

## Causa 1 — `copy()` tronca la destinazione pubblica (race)

Fuori da `production` `AssetAction::copyAsset()` forza la copia a ogni richiesta (5.180).
`File::copy()` apre la destinazione in scrittura e la **tronca** prima di scriverla. La
destinazione è un file pubblico che il web server può stare servendo a un browser mentre
un'altra richiesta la rinfresca: il browser riceve un PNG vuoto o parziale.

Evidenze:

- `public_html/assets/ptv/img/logo.png` a **0 byte** alle 11:11:43; `curl` dell'URL:
  `200 image/png size=0`.
- Riproduzione (scratchpad, 4 writer concorrenti, 20000 letture):
  `copy()` → **11787** letture troncate; copia su file temporaneo + `rename()` → **0**.
- Scrivono nel vero `public_html` anche le suite Pest di altre sessioni
  (es. `pest Modules/User/tests`, visto con `/proc/*/fd`): più writer, più finestre.

## Causa 2 — server `:8000` con docroot sbagliata (404 totale dalle 11:28)

Su `127.0.0.1:8000` girava `php -S 127.0.0.1:8000 laravel/server.php` avviato da un peer
(opencode) con **cwd = radice del progetto** invece di `public_html`. Il server integrato
usa la cwd come docroot: `/assets/...` → 404 del server stesso, prima di arrivare a Laravel.
Il `php artisan serve` dell'utente, partito un secondo dopo, era finito su `:8001`
(cwd `public_html`, logo 200).

Diagnosi: `readlink /proc/<pid>/cwd` del processo `php -S`, non la riga di comando.

Rimedio operativo: fermato il server del peer, avviato `php artisan serve --host=127.0.0.1
--port=8000` da `laravel/`: cwd `public_html`, `GET /assets/ptv/img/logo.png` → 200, 8573 byte.

## Fix (causa 1)

`laravel/Modules/Xot/app/Actions/File/AssetAction.php`:

- `isUpToDate()`: stessa dimensione e destinazione non più vecchia del sorgente → non
  riscrive. La copia forzata non è più cieca.
- `copyAtomically()`: copia su `$destination.'.'.getmypid().'.tmp'` nella stessa directory,
  poi `File::move()` (rename atomico sullo stesso filesystem); `finally` elimina il
  temporaneo. Chi legge vede il file vecchio o quello nuovo, mai uno troncato.

Il comportamento di 5.180 (dest non scrivibile → la si serve così com'è; copia fallita ma
dest leggibile → si continua) è invariato.

## AC

- [x] LFS escluso con prova sui blob
- [x] Race riprodotta e misurata (11787/20000 → 0/20000)
- [x] Destinazione aggiornata non riscritta
- [x] Destinazione vecchia sostituita via rename (inode diverso), nessun `.tmp` residuo
- [x] Server `:8000` riportato su docroot `public_html`
- [x] Gate PHPStan / PHPMD / PHPInsights / Pint / Pest

## Gate (reali, 2026-09-29)

- Pest `Modules/Xot/tests/Unit/Actions/File/AssetActionsTest.php`: red 2 falliti →
  green **8 passed (12 assertions)**. Test nuovi:
  `does not rewrite an up-to-date destination on force-copy`,
  `replaces a stale destination atomically, never truncating it in place`.
- PHPStan (livello da `phpstan.neon`, cache isolata) su action + test: **0 errori**.
- PHPMD (`tools/phpmd.sh`): **21** violazioni, identiche a HEAD (nessuna nuova).
- PHPInsights: code 100, complexity 100, architecture 100, style 96.3. Gli avvisi
  use-spacing/ordered-imports contraddicono Pint/PSR-12 e il pattern dei vicini;
  doc-comment riga 27 preesistente.
- Pint `--test`: passed.
- Preesistente, non introdotto qui: `FileActionsTest > asset path action works` fallisce
  (mock `andReturn(closure)` invece di `andReturnUsing`).

## Follow-up

- I test che pubblicano asset scrivono nel vero `public_html`: andrebbero isolati con un
  `public_path` temporaneo (`app()->usePublicPath(...)`), così una suite non può più
  toccare file serviti.
- Chi avvia un `php -S` a mano deve farlo da `public_html` (o usare `php artisan serve`
  da `laravel/`).

## GitHub

- Issue: https://github.com/laraxot/module_xot_fila5/issues/140

## Coordinamento

| quando | chi | cosa |
|---|---|---|
| 2026-09-29 11:13 | sessione pari | memoria "logo non è LFS, guarda l'HTML servito" |
| 2026-09-29 11:30 | sessione 30a9bfba | fix atomico AssetAction + test (lock preso e rilasciato) |
| 2026-09-29 11:58 | sessione 30a9bfba | server `:8000` riportato su `artisan serve` |
