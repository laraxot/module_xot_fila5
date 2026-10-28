---
title: "Stato del gate PHPStan sui moduli"
type: status
module: Xot
status: active
created: 2026-10-28
updated: 2026-10-28
tags: [phpstan, modules, quality]
qmd: "PHPStan Modules stato corrente analisi full tree level massimo"
related:
  - ./stories/ecc-codex-plugin-setup.story.md
---

# Stato del gate PHPStan sui moduli

## Verifica corrente

È stato eseguito il comando richiesto da root:

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules
```

- Configurazione: `laravel/phpstan.neon`.
- File analizzati: 9.775.
- Segnalazioni: 0.
- Exit code: 0 (`[OK] No errors`).
- Cache: verificato due volte; il secondo run è partito con cache fredda e ha
  terminato anch'esso con exit 0.

Non sono state cambiate classi PHP: non sono emerse segnalazioni da correggere. La
scansione completa resta una fotografia del codice presente durante l'esecuzione;
rilanciarla dopo modifiche PHP che possono cambiare i risultati.

## Riferimenti

- Story e dettaglio dei gate: [ECC e PHPStan](./stories/ecc-codex-plugin-setup.story.md).
- Regola source-first: [memoria condivisa](../../../../../bashscripts/ai/wiki/memories/source-first-before-fix.md).
