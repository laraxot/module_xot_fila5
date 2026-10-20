---
title: "Inventario fleet — custom Livewire e destinazioni"
type: inventory
module: Xot
status: baseline-2026-10-20-pm
created: 2026-10-20
updated: 2026-10-20
qmd: "inventario livewire filament widgets migrate reuse keep retire gemelli termsofservice privacy"
related:
  - ./livewire-to-filament-widgets-objective.md
  - ./livewire-to-filament-widgets-filament-blueprint.md
  - ./stories/livewire-to-filament-widgets-fleet.story.md
  - ../../../../bashscripts/docs/prompts/05-livewire-to-filament-widgets.md
---

# Baseline (rimisurata 2026-10-20 pomeriggio)

Scope: solo `app/Http/Livewire/**` e `app/Livewire/**` sotto `Modules/` (nessun
tema con custom Livewire). **Esclusi** View Components Blade, Volt, Filament
Forms Components, test, vendor.

Conteggio applicativo: **28 classi** custom Livewire (+ 2 test sotto
`User/tests/.../Livewire`). Il prompt 05 citava 63: includeva rumore da
`extends Component` sui View Components. Controprova:
`find Modules \( -path '*/Http/Livewire/*.php' -o -path '*/app/Livewire/*.php' \) ! -path '*/tests/*'`.

Widget Filament già presenti: **~168** file sotto `*/Filament/Widgets/` —
spesso il gemello esiste già (`REUSE`).

## Matrice classificazione (source of truth)

Stati: `MIGRATE` | `REUSE` | `KEEP` | `RETIRE`.

| Modulo | Componente | Scopo | Gemello Filament | Verdetto | Wave |
|--------|------------|-------|------------------|----------|------|
| UI | `DarkModeSwitcher` | toggle tema UI chrome | `DarkModeSwitcherWidget` | **DONE** ritirato HTTP; SSoT widget | W0 ✓ |
| UI | `Toast` | feedback flash non-panel | — (chrome FO) | `KEEP` o View/Blade | W0 |
| Lang | `Lang\Switcher`, `Lang\Change` | cambio locale | `LanguageSwitcherWidget` | **DONE** ritirati HTTP+view; SSoT widget | W0 ✓ |
| Job | `Job\Status`, `Schedule\Status`, `Schedule\Crud`, `Broad` | stato code/schedule admin | `JobStatusWidget`, `ScheduleStatusWidget`, `ScheduleCrudWidget` | `REUSE`/`MIGRATE` | W1 |
| User | `Auth\Login\|Register\|Logout\|Verify\|Passwords\*` | auth FO/panel twin | `LoginWidget`, `RegisterWidget`, `LogoutWidget`, … | `MIGRATE`/`REUSE` + test auth | W1–W2 |
| User | `AuthLogout`, `Livewire\Logout` | logout | `AuthLogoutWidget` / `LogoutWidget` | `REUSE` | W1 |
| User | `Profile\*`, `Team\Change`, `Socialite\Buttons` | profilo/team/OAuth | widget parziali + Actions | `MIGRATE` o Folio | W2 |
| User | `TermsOfService`, `PrivacyPolicy` | testo legale (config) in UI | `TermsOfServiceWidget`, `PrivacyPolicyWidget` | **DONE** ritirati HTTP+view+alias; SSoT widget | W0 ✓ |
| Cms | `Page\Show` | render pagina CMS | — | `KEEP` FO Folio | W2 |
| Geo | `FormSearchAddressCategories`, `Test` | ricerca indirizzo / stub | — | `KEEP` FO / `RETIRE` Test | W2 |
| Media | `Card\Video\Clip` | clip video card | — | `KEEP` o Action+Blade | W2 |
| Xot | `XotBaseComponent` (+ registrazione legacy) | base/registrazione | — | `RETIRE` solo a foglie chiuse | W3 |
| Themes | — | mount FQCN widget | — | `KEEP` mount FQCN | W0 |

## Caller da verificare prima di ogni ritiro

Class-name, FQCN, alias stringa, `<livewire:...>`, `@livewire(...)`, provider,
route, config, CMS, test. Mount dinamici verso **Widget Filament FQCN** sono
validi (non sono residui). Docs che dicono “zero” non battono il working tree.

## Note

- Livewire **vendor/interno a Filament** resta: non si elimina il runtime Livewire.
- Nuovi custom sotto `app/Http/Livewire` per il **panel** sono vietati.
