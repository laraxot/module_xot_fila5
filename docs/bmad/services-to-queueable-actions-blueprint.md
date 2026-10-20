---
title: "Blueprint — Services a Queueable Actions"
type: bmad-blueprint
status: active
module: Xot
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, blueprint, queueable-actions, services, filament]
related:
  - ./services-to-queueable-actions-objective.md
  - ../development/queueable-actions.md
  - ./filament-blueprint.md
---

# Blueprint operativo

## Scopo

Portare a zero i Service applicativi senza rompere i caller: ogni classe viene
letta per responsabilità, chiamanti e side effect; solo un use-case applicativo
diventa una `Spatie\QueueableAction\QueueableAction`. Adapter, contract,
resolver e translator restano nei loro confini se non sono use-case.

## Dipendenze e wave

1. **Research:** inventario 41 file, riferimenti diretti/indiretti, Action già
   esistenti, test e comportamento osservabile.
2. **Wave A (parallela):** Lang, Job, Media, UI, Notify. Scope disgiunti per
   modulo; ogni worker aggiorna caller, test e story del proprio modulo.
3. **Wave B:** Geo e Tenant, dopo il gate della Wave A perché hanno resolver e
   integrazioni condivise.
4. **Wave C:** Xot, in seriale sulle classi condivise; prima adapter e registry,
   poi eventuali use-case residui.
5. **Wave D:** audit AI e rimozione dei residui morti, senza ricreare Service
   già ritirati e senza spostare codice didattico nelle docs.

## Gate per ogni step

```bash
cd laravel
vendor/bin/phpstan analyse Modules/<Modulo>/app Modules/<Modulo>/tests --no-progress
vendor/bin/pint --dirty
```

Poi eseguire il test Pest mirato e verificare con `rg` i caller residui. Nessuna
classe viene cancellata prima di avere zero riferimenti e una Action successora
verificata. Per Filament, Resource e Widget restano su basi `XotBase*` e
delegano alle Actions; non si trasferisce logica nei form/table hooks.

## Review avversariale

Prima di chiudere una wave, controllare: firma pubblica invariata o migrata in
modo esplicito, queueability sicura, transazioni, error handling, tenant/policy,
side effect, test di regressione, riferimenti in config/provider e docs owner.
