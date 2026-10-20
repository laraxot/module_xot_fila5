---
title: "BMAD architecture — Services to Queueable Actions"
type: bmad-architecture
status: proposed
module: Xot
track: bmad-method
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, architecture, adr, queueable-actions, laraxot]
qmd: "architecture services actions queueable ADR sync async adapter caller wave"
related:
  - ./services-to-queueable-actions-objective.md
  - ./services-to-queueable-actions-brainstorming.md
  - ./filament-blueprint.md
  - ./decision-log.md
---

# Architettura target

```text
Filament / Folio / Livewire / Command
                 ↓
        Action applicativa (execute)
        sync oppure dispatch esplicito
                 ↓
      Adapter / resolver / driver / repository
                 ↓
             DB / API / filesystem
```

## ADR-001 — Un use-case, una Queueable Action

**Stato:** Proposed

**Decisione:** ogni operazione applicativa con un risultato o side effect
identificabile vive in `app/Actions/<Context>/...Action.php`, usa
`Spatie\QueueableAction\QueueableAction` e un metodo pubblico `execute(...)`.

**Conseguenze:** test e retry sono per caso d'uso; i god-service vengono spezzati.
Non si creano Action per utility pure o per API framework.

## ADR-002 — Dispatch deciso dal caller

**Stato:** Proposed

**Decisione:** `app(Action::class)->execute(...)` resta il percorso sincrono;
`app(Action::class)->dispatch(...)` è usato solo quando il caller ha un contratto
asincrono esplicito e il payload è serializzabile/idempotente.

**Conseguenze:** Filament mantiene feedback immediato per letture e validazioni;
AI, media, geocoding, mail e SMS possono essere dispatchati in modo controllato.

## ADR-003 — Nessun Services come contenitore tecnico

**Stato:** Proposed

**Decisione:** translator Laravel, driver Mail/SMS, client HTTP, resolver/registry,
validator, strategy, trend adapter e streaming HTTP restano componenti tecnici,
ma non possono vivere in `app/Services`. Si ricollocano in `Adapters`, `Contracts`,
`Support` o `Infrastructure`; le operazioni applicative che li orchestrano sono
Queueable Actions.

**Conseguenze:** il confine architetturale è leggibile e verificabile con il solo
path: la presenza di una directory `Services` è una violazione, anche quando non
contiene classi PHP.

## ADR-004 — Eliminare duplicati prima di progettare nuove Actions

**Stato:** Proposed

**Decisione:** se un Service è già coperto da un'Action, si aggiornano i caller e
si rimuove il wrapper dopo i gate. Non si crea una terza implementazione.

## Matrice delle wave

| Wave | Scope | Decisione | Gate |
|---|---|---|---|
| W0 | census reale, caller, binding e Action gemelle | classify/migrate/delete | rg, container, PHPStan |
| W1 | Geo: 5 classi residue | retarget Actions, test, delete | Geo PHPStan + Pest |
| W2 | directory vuote, `.gitkeep`, `.bak`, Facade e riferimenti residui | relocate/delete/retarget | rg path + autoload + Filament |
| W3 | ratchet globale e docs owner Modules/Themes | prevent reintroduction | architecture test + docs checks |
| W4 | audit finale | close only at zero Services dirs | full PHPStan, tests, links |

## Regola per ogni Service

Prima di modificare:

1. leggere classe intera e test;
2. cercare FQCN, `app()`, `resolve()`, binding, config, route, Blade, Livewire e Filament;
3. mappare ogni metodo a `migrate`, `split`, `retire` o `retain as adapter`;
4. definire serializzazione, transazione, retry e idempotenza;
5. scrivere/aggiornare story owner;
6. implementare una sola wave disgiunta;
7. verificare caller, PHPStan, Pest e autoload;
8. rimuovere il vecchio Service solo con prova di zero caller.
