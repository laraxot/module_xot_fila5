---
title: "SecurityMiddleware — controlli CSRF e input prima di $next()"
type: decision
module: Xot
tags: [security, csrf, middleware, login, filament]
created: 2026-11-09
updated: 2026-11-09
status: accepted
qmd: "SecurityMiddleware enhanceCSRFProtection validateInputs prima di next 419 page expired login filament"
related:
  - ../../../app/Http/Middleware/SecurityMiddleware.php
---

# SecurityMiddleware: controlli prima della richiesta

## Problema

`validateInputs()` e `enhanceCSRFProtection()` venivano chiamati **dopo** `$next($request)`.

1. **Nessuna protezione reale**: quando il controllo fallisce l'azione è già stata eseguita
   (dati salvati, utente autenticato).
2. **Login impossibile**: il login Filament rigenera sessione e token CSRF. Il confronto
   a posteriori tra il token della richiesta e quello (nuovo) di sessione fallisce sempre
   → 419 "Page Expired" anche con credenziali corrette.

Verificato il 2026-11-05 e di nuovo il 2026-11-09 (la correzione era stata sovrascritta da
un sync del modulo) su `base_predict_fila5`.

## Decisione

Rate limiting → `validateInputs()` → `enhanceCSRFProtection()` → `$next()` → header → log.

## Regola

Non spostare i controlli dopo `$next()`. Chi sincronizza il modulo Xot fra progetti deve
portare questa versione anche nel repository del modulo (`laraxot/module_xot_fila5`).
