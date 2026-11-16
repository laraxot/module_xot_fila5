---
title: "Bonifica PHPStan e configurazioni con collisioni Git"
type: story
status: in-progress
epic: "PROJECT-QUALITY"
module: Xot
created: 2026-11-16
updated: 2026-11-16
tags: [phpstan, conflict-markers, bmad, git]
qmd: "PHPStan Modules bonifica collisioni Git gitattributes gitignore composer no git lfs"
---

# Bonifica PHPStan e configurazioni con collisioni Git

## Obiettivo

Ripristinare il parsing dell'applicazione e portare `phpstan analyse Modules` a
zero segnalazioni, correggendo la causa sorgente e preservando lo scopo del codice.
La bonifica include i file di configurazione con marker Git e il vincolo di non
usare Git LFS.

## Acceptance criteria

- [ ] Nessun marker di conflitto nei sorgenti PHP e nei file `.gitattributes`,
      `.gitignore` e `composer.json`.
- [ ] `composer.json` è JSON valido; `check-no-git-lfs.sh` resta verde.
- [ ] PHPStan Modules termina con exit 0 e senza baseline regressiva.
- [ ] Pest viene eseguito secondo il gate del modulo; eventuali skip sono
      documentati con motivo e host.
- [ ] Esito reale e conoscenza riutilizzabile vengono riportati nella story e
      nel second brain.

## Lavoro eseguito

- Attivato il workflow BMAD/ECC con scope disgiunti e lock per file.
- Rimossi marker PHP residui nei moduli coinvolti e riparati i parse error emersi
  nel modulo Activity.
- Ripuliti `.gitattributes`, `.gitignore` e `composer.json` di Job, Rating,
  Activity e Notify; mantenute regole binarie normali senza Git LFS.

## Rischi aperti

Il worktree contiene modifiche concorrenti preesistenti. Ogni integrazione deve
restare limitata ai file della story e verificare nuovamente i gate dopo il
completamento degli altri agenti.
