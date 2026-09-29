---
tags: [module-root, hygiene, workspace, bmad, guard]
created: 2026-09-29
updated: 2026-09-29
issues: []
discussions: []
title: "Igiene della root dei moduli: cartelle, tooling, workspace, md"
type: story
module: Xot
status: in-progress
track: docs-hygiene
qmd: "module root hygiene code-workspace remote fila5 cartelle maiuscole tooling vietato readme changelog max sei md github skills gitignore"
related:
  - ./docs-modules-themes-continuous-reorg.story.md
  - ./5.158-module-root-md-cap-five.story.md
  - ../../../tests/Unit/ModuleRootHygieneTest.php
  - ../../../../../../docs/sprint-status.yaml
---

# Igiene della root dei moduli

## Perche'

Direttiva utente (2026-09-29) sulle root di `laravel/Modules/<Mod>/`. La guardia
Pest `Modules/Xot/tests/Unit/ModuleRootHygieneTest.php` rende le regole osservabili:
una regola senza test regredisce.

## Regole

1. Nessuna cartella con lettere maiuscole in root.
2. Cartelle vietate (cancellare e mettere nel `.gitignore` di root modulo):
   `bashscripts`, `graphify-out`, `tools`, `scripts`, `.agents`, `.claude-audit`,
   `.vscode`, `build`, `.claude`, `.codex`, `.opencode`, `tests/graphify-out`.
3. Un solo `*.code-workspace`, chiamato `_module_<nome>_fila5.code-workspace`.
   `<nome>` viene dal remote git (`<Mod>/.git/config`), preferendo il remote
   `laraxot`: `git@github.com:laraxot/module_activity_fila5.git` ->
   `_module_activity_fila5.code-workspace`. Il nome e' minuscolo, senza separatori
   aggiunti (`module_indennitacondizionilavoro_fila5`).
4. `README.md` e `CHANGELOG.md` sempre presenti, al massimo 6 `.md` totali in root.
5. `.github/skills` assente in root modulo e ignorato: riga `/.github/skills/` nel
   `.gitignore` del modulo (vedi sezione dedicata sotto).

## Misura di partenza (2026-09-29, find/ls reali sui 19 moduli con .git)

- Cartelle con maiuscole: Job (`Config`), Ptv (`Filament`).
- Cartelle vietate: `graphify-out` in 9 moduli (Incentivi, IndennitaCondizioniLavoro,
  IndennitaResponsabilita, Job, Media, Pdnd, Performance, Progressioni, Ptv);
  `scripts` in Job, Media, Tenant; `bashscripts` in Job, Media; `.opencode` in Job.
- Workspace: OK solo dove gia' `_module_<nome>_fila5` unico (Activity, Lang, Notify,
  Rating, UI, User, Xot). Nomi senza `_fila5` (Incentivi, IndennitaResponsabilita,
  Pdnd, Performance, Progressioni, Ptv, Sigma); duplicati in IndennitaCondizioniLavoro (3),
  Job (2), Media (3), Tenant (2).
- Md: Progressioni senza `CHANGELOG.md`; Notify e UI a 6 (al limite); nessuno oltre.
- Remote: quasi tutti hanno `provtv` e `laraxot`; IndennitaResponsabilita, Notify, Pdnd,
  Rating, Xot solo `laraxot`. `Modules/docs` non e' un modulo (senza `.git`).

## Lotti

- Lotto A: cartelle vietate (rm + `.gitignore`), 5 agenti in parallelo per modulo.
- Lotto B: cartelle maiuscole (Job/Config, Ptv/Filament: verificare se sono
  dati reali, spostare sotto `config/` o `app/` prima di cancellare).
- Lotto C: workspace (rinominare con `git mv`, cancellare i duplicati).
- Lotto D: md (CHANGELOG di Progressioni, tetto 6).
- Lotto E: guardia verde + `qmd update`.

## Regola 5: `.github/skills` (richiesta utente 2026-09-29)

Richiesta: "la cartella .github/skills va messa negli .gitignore di ogni root di ogni
modulo poi cancellata".

Stato misurato (~10:55, sui 18 moduli con `.git`: Activity, Incentivi,
IndennitaCondizioniLavoro, IndennitaResponsabilita, Job, Lang, Media, Notify, Pdnd,
Performance, Progressioni, Ptv, Rating, Sigma, Tenant, UI, User, Xot):

- `/.github/skills/` gia' presente nel `.gitignore` di tutti e 18 (modifica non
  committata di un'altra sessione; ricontrollato con `grep -cxF`, 1 riga per modulo).
- `.github/skills` assente su disco in tutti; mai tracciata (non in indice, non in
  HEAD, non su branch remoti, `git log --diff-filter=D` vuoto). Quindi niente
  `git rm --cached` e niente da cancellare: un merge non puo' resuscitarla.

Guardia aggiunta in `ModuleRootHygieneTest.php`:

- `.github/skills` aggiunta all'elenco di `root modulo senza cartelle di tooling
  vietate` (fallisce se la directory ricompare);
- nuovo caso `root modulo con /.github/skills/ nel .gitignore` (fallisce se un modulo
  con `.git` perde la riga), dataset `module_roots`.

Nello stesso passaggio `Safe\file`, `Safe\glob`, `Safe\preg_match` e `@var list<string>`
sul file intero: PHPStan passa da 11 (poi 14) errori a 0.

Esito reale (2026-09-29, ~11:30, load average ~53 per altre 6 sessioni Pest):

- `./vendor/bin/pest Modules/Xot/tests/Unit/ModuleRootHygieneTest.php --no-coverage`:
  `Tests: 1 failed, 90 passed (163 assertions)`, 966.61s. I due casi toccati sono verdi
  18/18 ciascuno (`.gitignore` e tooling vietato). L'unico rosso e' preesistente e non
  dipende da questa regola: `Job: cartelle con maiuscole in root: Config` (Lotto B, dir
  tracciata `Job/Config/{.gitkeep,config.php}` accanto a `Job/config/`).
- `./vendor/bin/phpstan analyse Modules/Xot/tests/Unit/ModuleRootHygieneTest.php`:
  `[OK] No errors`.
- Nessun file cancellato: non c'era niente da cancellare.

## Verifica finale

`vendor/bin/pest Modules/Xot/tests/Unit/ModuleRootHygieneTest.php` verde (mai su
10.100.200.15: li' solo `php -l` + audit shell) e nessun ripristino da peer dopo 1 ora.

## Rischi

- Peer `opencode` che ripristina file o ricrea `.opencode`: dopo ogni lotto rileggere
  `git status` nel repo del modulo e verificare che la cartella non sia tornata.
- Repo annidati: ogni `Modules/<Mod>` ha un `.git` proprio; commit e verifica dal
  contesto del modulo, non dalla root. Controllare `.git/rebase-merge` prima di editare.
- Il `.gitignore` non copre i file gia' tracciati: serve `git rm -r --cached`.
- `bashscripts/tools/audit-module-root-hygiene.sh` contiene marker di conflitto
  (soglia 5 vs 6) e non e' allineato a queste regole: da riconciliare, non duplicare.
- `bashscripts/ai/wiki/memories/workspace-naming.md` descriveva `_<nome>.code-workspace`:
  superata da questa story.
- Lock (`bashscripts/lock/`) prima di ogni edit.
