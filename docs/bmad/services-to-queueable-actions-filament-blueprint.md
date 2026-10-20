---
title: "Filament blueprint — Services to Queueable Actions"
type: filament-blueprint
status: active
module: Xot
created: 2026-10-20
updated: 2026-10-20
tags: [filament, blueprint, bmad, actions, queueable-actions]
qmd: "filament blueprint action service migration execute dispatch policy tenant form table"
related:
  - ./services-to-queueable-actions-architecture.md
  - ./services-to-queueable-actions-objective.md
---

# Contratto Filament

La UI non contiene la logica dei Services migrati. Resource, Page e Widget
raccolgono input, autorizzano, invocano l'Action e presentano lo stato. Nessun
Resource, Page, Widget o provider può reintrodurre `app/Services` come facciata.

## Regole

- usare `XotBaseResource`, `XotBaseWidget` e pagine Xot;
- schema Form/Table/Infolist dedicato quando il flusso cresce;
- niente `->label()`, `->placeholder()` o business logic hardcoded;
- policy e tenant scope prima di `execute()`;
- `execute()` per risultato immediato; `dispatch()` solo per operazioni asincrone;
- notificare `queued`, `completed` e `failed` senza bloccare il worker UI;
- non passare componenti Filament, Request o Closure dentro una Action dispatchata.
- dopo ogni migrazione verificare che la directory `app/Services/` sia assente;
- adapter tecnici usati dal Widget vivono in `Adapters`/`Infrastructure`, mai in `Services`.

## Mappa UI → Action

| UI | Input | Action | Modalità |
|---|---|---|---|
| Filament AI proposal | dati redatti + policy | classify/suggest/confirm Action | sync review, queue provider |
| Filament Geo selectors | codici regione/provincia | `LoadGeoHierarchyAction` / GetRegions/Cities | sync (mai `Geo*Service`) |
| Filament Notify | template, recipient, channel | Send notification/SMS Action | queue con idempotenza |
| Filament Media | media + operation | Subtitle/convert Action | queue |
| Filament Tenant | config value | Tenant config Action | sync, transazione controllata |

## Stato asincrono

Ogni Action dispatchata deve definire:

- identificatore/idempotency key;
- payload minimo serializzabile;
- comportamento retry e failed job;
- visibilità tenant/policy nel worker;
- evento o polling per aggiornare la UI;
- test del percorso sincrono e del wrapper Spatie `ActionJob`.

## Definition of Done Filament

- [ ] Resource/Page/Widget estende una base Xot;
- [ ] schema e traduzioni rispettano il modulo owner;
- [ ] Action invocata senza logica duplicata nella UI;
- [ ] policy/tenant verificati;
- [ ] sync/queue scelto esplicitamente;
- [ ] test Livewire/Filament e PHPStan passano;
- [ ] story e decision log aggiornati.
- [ ] `find Modules/<Modulo>/app -type d -name Services` non restituisce risultati.
