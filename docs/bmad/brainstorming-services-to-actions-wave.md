---
title: Brainstorming — wave Services verso Spatie Queueable Actions
type: bmad-brainstorming
status: synthesized
module: Xot
track: bmad-method
created: 2026-10-20
updated: 2026-10-20
tags: [bmad, brainstorming, services, queueable-action, filament-blueprint]
qmd: "brainstorming services to actions spatie queueable perche 5 whys scamper reverse swot filament"
related:
  - ../bmad-brainstorming.md
  - ./filament-blueprint.md
  - ../stories/services-to-actions-global-wave.story.md
  - ../../../../../bashscripts/ai/wiki/rules/no-services-rule.md
  - ../../../../../bashscripts/docs/prompts/25-services-to-actions.md
  - ../../../../../bashscripts/ai/wiki/memories/services-riapparsi-sono-copie-di-actions-esistenti.md
---

# Domanda guida

Come portare a zero i `*Service` applicativi residui **senza** duplicare Actions gia' esistenti e senza rompere Filament / tenancy / queue?

## Perche' (religione + senso)

La regola [no-services-rule](../../../../../bashscripts/ai/wiki/rules/no-services-rule.md) non e' estetismo: un Service diventa god-class (create/update/notify/export…), non e' accodabile in modo uniforme, e nasconde i confini di dominio.

Una **Spatie QueueableAction** con `execute()`:

1. **un caso d'uso = una classe** (SRP);
2. **stesso codice sync o in coda** (`->onQueue()` / `execute()`);
3. **testabile** senza mock di un bagaglio di metodi;
4. **tipizzabile** (parametri/return concreti o Spatie Data), amica di PHPStan;
5. **chiamabile da Filament** senza ingrassare form hooks (blueprint: logica nelle Actions del modulo).

Non tutto cio' che si chiama `*Service` e' business logic: utility pure, Adapter Laravel (Translator), Facade di naming, e `RouteServiceProvider` di Laravel **non** si convertono.

## Inventario misurato (disco vivo, ripassato)

Gate:

```bash
find Modules -path '*/app/*' -name '*Service.php' ! -name '*ServiceProvider.php'
find Modules -path '*/app/Services/*' -name '*.php'
```

| Esito | Dettaglio |
|-------|-----------|
| `*Service.php` applicativi | **0** (Tenant/Geo/Notify/Xot/Lang/Media/Job/AI eliminati; caller retargetati) |
| Residui in `app/Services/` | `ProfileTest` **GONE**; Translators/Trend = zombie **delete-again** (mai relocate; Actions gia' vive) |
| Actions | ~682 `*Action.php` sotto `Modules/*/app/Actions` |
| Falsi positivi | `TermsOfService` Livewire; `RouteServiceProvider`; menzioni `Was:` nei Data Notify |

Insight aggiornato: la wave non e' piu' "convertire 22 Service", e' **delete zombie merge (Translators/Trend) + ratchet anti-merge** — non relocate.

## 5 Whys

1. Perche' restano Services? → Il merge da `laraxot/dev` li ha riportati dopo che le Actions esistevano gia'.
2. Perche' il merge li riporta? → Upstream/linee parallele non condividono ancora la religione no-services.
3. Perche' rischiamo di "convertire" di nuovo? → Istinto: Service → nuova Action per metodo, senza cercare la gemella.
4. Perche' quello e' pericoloso? → Duplicati, bug copiati (`exit()` in coda), Filament che chiama due API diverse.
5. Causa radice operativa → **Procedura delete-or-retarget**: cerca Action/story prima; crea Action solo se manca il caso d'uso.

## Starbursting

| | |
|---|---|
| **Chi** | Coordinatore Xot + lane per modulo (Geo, Tenant, Notify, Xot cluster) |
| **Cosa** | Zero `app/Services/*Service.php` applicativi; chiamanti su Actions; Filament senza TenantService/Service |
| **Quando** | Wave dopo PHPStan calm; un modulo per volta; lock+mtime |
| **Dove** | `Modules/<M>/app/Actions`, story in `docs/stories/`, blueprint Filament del modulo |
| **Perche'** | Confini chiari, coda, PHPStan, no god-class |
| **Come** | Prompt [25-services-to-actions](../../../../../bashscripts/docs/prompts/25-services-to-actions.md) + blueprint Filament |

## SCAMPER (sintesi)

- **Substitute**: ogni metodo Service → Action verbale esistente o nuova `*Action::execute()`.
- **Combine**: vietato fondere use case diversi in una sola Action "manager".
- **Adapt**: chiamanti Filament (`Breadcrumb`, Resource hooks) passano a `app(Action::class)->execute()`.
- **Modify**: Facade Geo (`GeoServiceFacade`) resta come *nome* di confine solo se accessor punta ad Action, non a Service.
- **Put to other uses**: no — non riusare Service come "compatibility shim" a lungo termine.
- **Eliminate**: Service a 0 chiamanti di produzione + Action presente → delete (non ricreare).
- **Reverse**: partire dai chiamanti Filament/tenancy (alto rischio), poi zombie.

## Reverse brainstorming (come fallire)

- Convertire senza `rg` Action gemella → doppio codice.
- Cancellare TenantService prima di Notify SMS Data / Cms Breadcrumb → runtime break.
- Confondere `RouteService` Xot con `RouteServiceProvider` → lavoro falso.
- Mettere logica in Filament form `afterStateUpdated` invece che Action → viola blueprint.
- Accodare Action con `exit()` / handle aperti (lezione Media) → worker morto.
- Dichiarare done sulla story senza rileggere il file sul disco.

## SWOT

| | |
|---|---|
| **S** | 744 Actions gia' presenti; story per-modulo gia' scritte; blueprint Filament uniforme |
| **W** | Merge riesuma; TenantService ancora vivo nei Data SMS; RouteService ibrido (trait QueueableAction + static) |
| **O** | Wave corta: delete zombie Geo/Notify/Xot-small; retarget Tenant; chiudere Xot Route/Artisan/Theme |
| **T** | Sessioni parallele su PHPStan; RAM scarsa; lock caldi |

## Insight azionabili (top 5)

1. **Non era una conversione da zero**: e' stata una **bonifica di riesumazioni** + retarget; oggi i Service applicativi sono a zero sul disco.
2. **Tenant/Filament canary chiuso** — Notify SMS Data e Cms Breadcrumb citano `TenantService` solo in commenti `Was:`; runtime su Actions.
3. **Residuo vero**: Translators e Trend Adapters sotto `app/Services/` sono zombie merge — **DELETE** (gia' in xot-small), mai relocate ne' Action-izzare di nuovo.
4. **ProfileTest in Services** — **GONE** (rumore; 0 caller).
5. **Filament blueprint** resta vincolo permanente: Resource/Page → Actions; mai reintrodurre Service "per comodita' admin".

## Rischi

- Merge da `laraxot/dev` riesuma di nuovo i Service (serve ratchet).
- Relocate Translators/Trend (anti-pattern) → terzo path + merge riesuma comunque Services.
- Docs storiche che citano ancora i Service come API pubblica.

## Next BMAD

Story operativa: [services-to-actions-global-wave.story.md](../stories/services-to-actions-global-wave.story.md) → delete-again zombie Translators/Trend + ratchet (non nuova conversione di masse).