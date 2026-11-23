---
title: "Story: Bootstrap provider registry — module.json driven"
type: story
status: accepted
created: 2026-11-23
updated: 2026-11-23
epic: "Xot bootstrap"
issues: []
discussions: []
related:
  - docs/wiki/rules/module-providers-manifest.md
  - docs/wiki/memories/module-providers-manifest-not-manual-register.md
---

# Story: Bootstrap provider registry — module.json driven

## Descrizione

Implementare il registry dei service provider basato su `module.json` come SSoT (ADR 0009). Il file `bootstrap/providers.php` deve leggere i provider da ogni `module.json` sotto `laravel/Modules/*` e `laravel/Themes/*` invece di elencarli manualmente.

## Obiettivo

- Eliminare la manutenzione manuale di `bootstrap/providers.php`
- Auto-discovery dei provider all'aggiunta di nuovi moduli/temi
- Audit script per verificare la coerenza `module.json` ↔ provider caricati

## Scope

- In scope: `bootstrap/providers.php`, `XotBaseServiceProvider::registerModuleProviders()`, audit script
- Out of scope: migrazione dei provider legacy già registrati in `config/app.php` (già allineati)

## Conferma

- [ ] `bootstrap/providers.php` contiene solo `AppServiceProvider::class` (già fatto)
- [ ] `XotBaseServiceProvider` registra i provider leggendo `module.json` di ogni modulo/tema
- [ ] Audit script `bashscripts/tools/audit-module-provider-manifest.sh` passa per tutti i moduli/temi
- [ ] Test: `vendor/bin/pest Modules/Xot/tests/Unit/Bootstrap/ProvidersRegistryTest.php` passa
- [ ] ADR 0009 creato e linkato nell'indice `README.md` del modulo Xot (già fatto)

## GitHub (tracciamento)

- Issue: DA CREARE sul repo `laraxot/module_xot_fila5`
- Comando: `gh issue create --title "ADR 0009: Bootstrap provider registry — module.json driven" --body "Vedi ADR in laravel/Modules/Xot/docs/adr/0009-bootstrap-provider-registry.md"`