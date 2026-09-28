<<<<<<< HEAD
=======
---
title: "phpstan runtime governance"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "phpstan runtime governance"
issues: []
discussions: []
---

>>>>>>> laraxot/dev
# PHPStan Runtime Governance

## Regola locale

La configurazione PHPStan del progetto deve usare un `tmpDir` nel workspace, non `/tmp/phpstan`.

Valore canonico:

```neon
parameters:
    tmpDir: ./storage/app/phpstan
```

## Comando operativo

Quando l'ambiente mostra crash anticipati del tool, il comando standard di recovery e':

```bash
XDEBUG_MODE=off ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress
```

## Nota

Questo non sostituisce la correzione del codice: serve solo a distinguere blocker di runtime da errori statici veri.
