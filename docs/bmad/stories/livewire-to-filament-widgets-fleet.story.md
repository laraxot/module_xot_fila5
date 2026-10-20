---
type: story
id: Xot/livewire-to-filament-widgets-fleet
title: "Migrare i custom Livewire UI a Filament Widgets"
module: Xot
status: ready-for-dev
priority: P1
created: 2026-10-20
updated: 2026-10-20
qmd: "fleet livewire filament widgets wave reuse migrate keep retire termsofservice planning"
related:
  - ../livewire-to-filament-widgets-objective.md
  - ../livewire-to-filament-widgets-architecture.md
  - ../livewire-to-filament-widgets-filament-blueprint.md
  - ../livewire-to-filament-widgets-inventory.md
  - ../livewire-to-filament-widgets-brainstorming.md
  - ../livewire-widget-parallelization-plan.md
  - ../livewire-widget-advantages.md
  - ../livewire-widget-decision-log.md
---

# Story fleet

Baseline: **28** custom Livewire applicativi; ~168 Filament Widgets.
Classificazione: [inventory](../livewire-to-filament-widgets-inventory.md).
Blueprint destinazioni: [filament-blueprint](../livewire-to-filament-widgets-filament-blueprint.md).
Parallel lanes: [parallelization-plan](../livewire-widget-parallelization-plan.md).

## Acceptance criteria

- [x] baseline e inventario riproducibili (rimisurati 2026-10-20 pm);
- [x] ogni classe custom ha classificazione, caller e destinazione (matrice inventory);
- [ ] nessun candidato panel resta senza widget/resource/page/action;
- [ ] ogni widget nuovo/migrato usa una base Xot appropriata;
- [ ] dominio, auth, tenancy, redirect e traduzioni sono coperti da test;
- [ ] nessun vecchio alias/tag/file viene ritirato finché esiste un caller;
- [ ] scan finale non trova custom Livewire residui non giustificati;
- [ ] PHPStan Modules è a zero errori e i gate mirati sono verdi;
- [ ] docs di modulo/tema aggiornati in lotti piccoli con link bidirezionali.

## Piano di esecuzione (ready-for-dev)

Religione (perché): **panel-first** — niente nuovi custom `Http/Livewire` per UI
di panel; sostituto = `XotBase*Widget` + Action. Livewire runtime Filament resta.
FO (Folio/Volt/Blade) resta se lo scopo non e' una card di panel.

| Wave | Scope | Esito | Note |
|------|-------|-------|------|
| W0 | UI `DarkModeSwitcher`; Lang `Switcher`/`Change`; User `TermsOfService`/`PrivacyPolicy` | **DONE** `REUSE` + ritiro HTTP (2026-10-20) | Toast = `KEEP` FO; alias User solo `profile.delete-account`; arch allowlist TermsOfService svuotata |
| W1 | Job Status/Schedule/Crud/Broad | `REUSE`/`MIGRATE` verso widget esistenti | capability `.env`/Artisan → allowlist |
| W1–W2 | User Auth* + Logout | `REUSE` Auth widgets + test auth | non cambiare policy/redirect |
| W2 | User Profile/Team/Socialite; Cms Page; Geo; Media | `MIGRATE` solo se contratto widget, altrimenti `KEEP` FO | Volt/Cms boundary FO; legal gia' in W0 |
| W3 | Xot `XotBaseComponent` + RegisterLivewire | `RETIRE` dopo foglie chiuse | seriale |
| W4 | ritiro alias, ratchet anti-Http/Livewire panel, PHPStan, smoke | zero residui non giustificati | solo coordinatore |

Dentro una wave le lane disgiunte possono partire in ordine casuale; dipendenze
e gate restano ordinati. **Questa sessione = brainstorm + planning** (artefatti
BMAD aggiornati); l'implementazione parte solo aprendo esplicitamente una wave.

Hub: [brainstorming](../livewire-to-filament-widgets-brainstorming.md),
[filament-blueprint](../livewire-to-filament-widgets-filament-blueprint.md),
[decision-log](../livewire-widget-decision-log.md).
