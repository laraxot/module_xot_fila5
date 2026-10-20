---
title: "BMAD objective — Services to Queueable Actions"
type: bmad-brainstorm-objective
status: active
module: Xot
track: bmad-method
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, services, queueable-actions, second-brain, filament]
qmd: "services queueable actions classificazione use case adapters providers filament blueprint"
related:
  - ./services-to-queueable-actions-brainstorming.md
  - ./services-to-queueable-actions-architecture.md
  - ./filament-blueprint.md
  - ./decision-log.md
---

# Obiettivo

Portare la logica applicativa dei moduli da classi `app/Services` a Actions con
`Spatie\QueueableAction\QueueableAction`, mantenendo invariati i contratti dei
caller, il comportamento di dominio, la persistenza, le policy e le integrazioni.

## Domanda guida

Quali classi sotto `app/Services` rappresentano davvero use-case applicativi e
quali sono invece adapter, registry, translator, strategia o infrastruttura che
devono restare nel loro confine?

## Vincoli

- nessuna migrazione meccanica per nome;
- un use-case = una Action con `execute(...)`;
- eliminare wrapper morti o duplicati invece di ricrearli;
- mantenere `app/Services` per adapter/framework solo se motivato e documentato;
- Filament usa esclusivamente wrapper `XotBase*` e delega la logica alle Actions;
- ogni wave ha ownership disgiunta, story BMAD, verifica PHPStan/Pest e nota second brain;
- nessuna modifica a `phpstan.neon`, baseline o contratti pubblici senza evidenza.

## Output attesi

1. inventario classificato di ogni classe Service;
2. decisioni architetturali condivise;
3. blueprint Filament per i flussi amministrativi coinvolti;
4. stories per modulo con caller, test e gate;
5. migrazione incrementale e verificabile.

## Inventario verificato (ripasso disco vivo)

I `*Service.php` applicativi sotto `Modules/*/app` sono a **zero**. `ProfileTest`
in Services e' **GONE**. `Translators/*` e `Trend/Adapters/*` sotto Services sono
**zombie delete-again** (DELETE gia' in [xot-small](../stories/services-to-actions-xot-small.story.md);
vivo = `*TranslateAction` + `BuildTrendCollectionAction`) — mai relocate. Resta
ratchet anti-merge. Dettaglio:
[services-to-actions-global-wave.story.md](../stories/services-to-actions-global-wave.story.md).

Wave residua: delete-again se Translators/Trend riappaiono + guard anti-merge.
Non aprire nuove "conversioni" di masse senza `rg` che dimostri un Service applicativo vivo.
