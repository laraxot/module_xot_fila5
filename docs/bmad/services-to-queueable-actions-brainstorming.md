---
title: "BMAD brainstorming — Services to Queueable Actions"
type: bmad-brainstorming
status: synthesized
module: Xot
track: bmad-method
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, brainstorming, scamper, reverse-brainstorming, queueable-actions]
qmd: "brainstorm services actions queueable scamper rischi adapter use case cartella zero"
related:
  - ./services-to-queueable-actions-objective.md
  - ./services-to-queueable-actions-architecture.md
  - ./brainstorming-services-to-actions-wave.md
  - ./services-to-queueable-actions-filament-blueprint.md
---

# Sintesi

Il problema non e' il suffisso `Service`: e' la sovrapposizione tra use-case gia'
presenti in Actions, adapter/framework, utility e codice morto riesumato dal merge.
**Stato vivo (2026-10-20 pomeriggio):** `Modules/*/app/Services` = **0 directory**,
`*.php` sotto quel path = **0**, Actions ≈ **682**. La cartella non deve tornare.

Wave report operativo: [brainstorming-services-to-actions-wave.md](./brainstorming-services-to-actions-wave.md).

## 5 Whys

1. I Services duplicano responsabilita' gia' disponibili in Actions.
2. La duplicazione crea due contratti, due percorsi di test e caller divergenti.
3. I confini non distinguono orchestrazione applicativa da infrastruttura.
4. Una conversione meccanica queueizza letture e adapter che devono restare sincroni.
5. Serve inventario per responsabilita' + **gate sulla directory** (non solo sul file).

## SCAMPER — idee selezionate

| Leva | Decisione | Impatto | Fattibilita' |
|---|---|---:|---:|
| Substitute | Riutilizzare Actions esistenti prima di crearne altre | Alto | Alta |
| Combine | Spezzare i god-service per use-case, non per classe originale | Alto | Media |
| Adapt | Adapter/driver sincroni fuori da `Services/`; queue solo orchestrazione | Alto | Alta |
| Modify | `execute()` sincrono; `dispatch()` scelta del caller | Alto | Alta |
| Eliminate | Wrapper morti e duplicati dopo verifica caller; **rmdir Services** | Alto | Alta |
| Rearrange | Wave: duplicati → I/O esterno → framework → residui → ratchet dirs | Alto | Alta |

## Reverse brainstorming — modi per rompere la migrazione

- convertire ogni `*Service` senza leggere i caller;
- lasciare `app/Services/` vuota «temporaneamente»;
- passare Request, Closure, stream o modelli non necessari nella coda;
- dispatchare prima del commit (`after_commit=false` di default);
- rendere asincrone letture usate direttamente da Filament;
- spostare driver Mail/SMS, translator e streaming in Actions pseudo-servizio;
- lasciare vecchi caller attivi (invii duplicati);
- testare `Action::class` invece del wrapper `ActionJob` di Spatie;
- modificare insieme piu' moduli e perdere la provenienza delle regressioni;
- tenere una allowlist arch non vuota dopo il delete.

## Insight conclusivi

1. **Action = use-case/orchestrazione**, non sinonimo di ogni classe applicativa.
2. **Queueable non significa sempre asincrono**: stessa Action sync quando la UI
   richiede il risultato immediato.
3. **Adapter, registry, resolver, validator, strategy e stream restano confini
   tecnici** in `Adapters`/`Support`/`Infrastructure` — **mai** in `app/Services`.
4. La rimozione avviene solo dopo caller statici/dinamici, test, provider, config,
   route, Livewire e Filament verificati; poi **la directory sparisce**.

## Decisione proposta

Modello ibrido in [architecture](./services-to-queueable-actions-architecture.md):
delete-or-retarget prima di progettare nuove Actions; Filament segue
[services-to-queueable-actions-filament-blueprint](./services-to-queueable-actions-filament-blueprint.md).
