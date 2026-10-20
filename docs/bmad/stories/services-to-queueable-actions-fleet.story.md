---
title: "Fleet: Services to Queueable Actions"
type: story
status: planned
priority: high
module: Xot
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, services, queueable-actions, swarm, filament]
qmd: "fleet services queueable actions migration story waves"
related:
  - ../services-to-queueable-actions-objective.md
  - ../services-to-queueable-actions-brainstorming.md
  - ../services-to-queueable-actions-architecture.md
  - ../services-to-queueable-actions-filament-blueprint.md
---

# Obiettivo

Eliminare la duplicazione tra Services e Actions e portare ogni use-case
applicativo a Queueable Action, senza trasformare adapter o framework services in
wrapper artificiali.

## Task pianificati

- [ ] W0: inventario verificato dei 41 file e caller dinamici;
- [ ] W1: consolidare Actions già equivalenti in Job, Tenant, Geo, Media e Xot;
- [ ] W2: spezzare AIService e isolare send/queue in Notify e provider Geo;
- [ ] W3: decidere TranslatorService, Module/Route/Theme e utility UI con ADR;
- [ ] W4: aggiornare caller, test, Filament blueprint e documentazione owner;
- [ ] gate finale PHPStan Modules, test mirati, autoload e audit link.

## Criterio di completamento

Ogni file ha una decisione verificata (`migrate`, `split`, `retire`, `retain as
adapter`) e nessun Service viene rimosso senza prova di zero caller statici e
dinamici. Nessuna nuova Action viene creata se esiste già l'equivalente.
