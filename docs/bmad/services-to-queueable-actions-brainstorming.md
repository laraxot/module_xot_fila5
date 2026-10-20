---
title: "BMAD brainstorming — Services to Queueable Actions"
type: bmad-brainstorming
status: synthesized
module: Xot
track: bmad-method
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, brainstorming, scamper, reverse-brainstorming, queueable-actions]
qmd: "brainstorm services actions queueable scamper rischi adapter use case"
related:
  - ./services-to-queueable-actions-objective.md
  - ./services-to-queueable-actions-architecture.md
---

# Sintesi

Il repository contiene 41 file PHP sotto `app/Services`. Il problema non è il
suffisso `Service`: è la sovrapposizione tra use-case già presenti in Actions,
adapter/framework integration, utility e codice morto.

## Aggiornamento decisionale — 2026-10-20

Il brainstorming viene aggiornato dal census live: Geo contiene ancora cinque
Service presenti nello staging. La wave deve verificare la semantica dei
successori (caller, provider, config e test), migrare solo gli use-case e poi
chiudere la directory. La Definition of Done è strutturale: nessuna directory
`Modules/*/app/Services`, neppure vuota.

### 5 Whys aggiornati

1. Le directory restano anche dopo la rimozione dei file perché Git non traccia
   directory vuote.
2. Un controllo limitato a `*Service.php` non rileva `.gitkeep`, `.bak` o directory
   residue.
3. Il codice è stato spesso riscritto da merge concorrenti senza un ratchet unico.
4. Le Action esistenti riducono il rischio di duplicazione, ma non provano da
   sole l'equivalenza dei caller.
5. Servono un census live, un gate directory-level e una verifica semantica per
   ogni deletion wave.

### Reverse brainstorming aggiuntivo

- dichiarare completata la migrazione contando solo i file PHP;
- ricreare una Action con lo stesso comportamento di una già esistente;
- cancellare un adapter tecnico che non è un use-case;
- rimuovere la directory senza controllare riferimenti in stringhe, provider o
  config;
- modificare PHPStan o creare un secondo `.neon` per nascondere regressioni.

Decisione: nessuna nuova astrazione finché non è dimostrato che manca un
successore; `laravel/phpstan.neon` resta l'unica configurazione autorizzata e non
viene modificata da questa wave.

## 5 Whys

1. I Services duplicano responsabilità già disponibili in Actions.
2. La duplicazione crea due contratti, due percorsi di test e caller divergenti.
3. I confini non distinguono orchestrazione applicativa da infrastruttura.
4. Una conversione meccanica queueizza letture e adapter che devono restare sincroni.
5. Serve un inventario per responsabilità, con decisione esplicita per classe e metodo.

## SCAMPER — idee selezionate

| Leva | Decisione | Impatto | Fattibilità |
|---|---|---:|---:|
| Substitute | Riutilizzare Actions esistenti prima di crearne altre | Alto | Alta |
| Combine | Spezzare i god-service per use-case, non per classe originale | Alto | Media |
| Adapt | Lasciare adapter/driver sincroni e queueizzare solo l’orchestrazione | Alto | Alta |
| Modify | `execute()` resta invocabile sincrono; `dispatch()` è scelta del caller | Alto | Alta |
| Eliminate | Rimuovere wrapper morti e duplicati dopo la verifica dei caller | Alto | Alta |
| Rearrange | Wave: duplicati → I/O esterno → servizi framework → residui | Alto | Alta |

## Reverse brainstorming — modi per rompere la migrazione

- convertire ogni classe `*Service` senza leggere i caller;
- passare Request, Closure, stream o modelli non necessari nella coda;
- dispatchare prima del commit (`after_commit=false` è il default corrente);
- rendere asincrone letture usate direttamente da Filament;
- spostare driver Mail/SMS, translator e streaming HTTP in Actions pseudo-servizio;
- lasciare i vecchi caller attivi causando invii duplicati;
- testare `Action::class` invece del wrapper `ActionJob` di Spatie;
- modificare insieme più moduli e perdere la provenienza delle regressioni.

## Insight conclusivi

1. **Action = use-case/orchestrazione**, non sinonimo di ogni classe applicativa.
2. **Queueable non significa sempre asincrono**: la stessa Action deve poter essere
   chiamata sincrona quando il contratto UI richiede il risultato immediato.
3. **Adapter, registry, resolver, validator, strategy e stream restano confini
   tecnici**, anche se vivono temporaneamente sotto `Services`.
4. La rimozione del Service avviene solo dopo caller statici/dinamici, test,
   provider, config, route, Livewire e Filament verificati.

## Decisione proposta

Adottare il modello ibrido documentato nell'architecture blueprint e non una
conversione globale cieca. La prima wave deve consolidare duplicati già sostituiti
da Actions, così il lavoro successivo parte da una sola sorgente di verità.
