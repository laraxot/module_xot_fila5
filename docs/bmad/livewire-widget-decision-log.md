---
tags: [documentation]
created: 2026-09-26
updated: 2026-10-20
qmd: "livewire widget decision log"
issues: []
discussions: []
title: "Decision log — Livewire → widget"
type: decision-log
module: Xot
status: active
related:
  - ./livewire-widget-project-context.md
  - ./livewire-inventory.md
  - ./livewire-widget-advantages.md
  - ./livewire-to-filament-widgets-brainstorming.md
  - ./livewire-to-filament-widgets-inventory.md
  - ./stories/livewire-to-filament-widgets-fleet.story.md
---

# Decision log

## [2026-10-20] Blueprint di piattaforma e scope definitivo

**Decision:** il piano operativo è consolidato in
[livewire-widget-platform-blueprint.md](./livewire-widget-platform-blueprint.md),
con brainstorming in
[livewire-to-filament-widgets-brainstorming.md](./livewire-to-filament-widgets-brainstorming.md)
e destinazioni Filament in
[livewire-to-filament-widgets-filament-blueprint.md](./livewire-to-filament-widgets-filament-blueprint.md).

La regola è **panel-first**: solo una superficie realmente appartenente al
panel diventa `XotBase*Widget`. Un componente FO, una Page/Resource, un flusso
auth/legal, un adapter di libreria o dead code riceve la destinazione coerente
con il proprio scopo. Il runtime Livewire interno a Filament resta una
dipendenza implementativa e non è un residuo da eliminare.

**Scope:** la migrazione procede per inventario, classificazione, sostituzione,
verifica dei caller e ritiro. L'ordine casuale è ammesso soltanto dentro wave
con ownership disgiunta; non si randomizzano dipendenze, gate o rollback.

## [2026-09-21] Religione in Xot, inventario nei foglia

**Decision:** Xot possiede la legge (`XotBaseWidget`). Ogni modulo scrive il proprio `docs/bmad/livewire-inventory.md`. User resta il pilota identità (Epic 9–10).

## [2026-09-21] Docs only

Nessun PHP in questa sessione.

## [sessione audit successiva] Inventario approfondito + doc canonico vantaggi

**Decision:** il "perché solo widget" vive in un documento canonico piattaforma
([livewire-widget-advantages.md](./livewire-widget-advantages.md)); i doc di modulo
(`advantages-filament-only.md` in User) restano evidenze locali e non vengono duplicati.

**Findings nuovi nell'inventario:** `LivewireComponentsListCommand` (`xot:livewire-list`)
registrato ma `handle()` no-op; `tableto_formx`/`Tableto_formx` file PHP senza estensione
(dead code a tre livelli: autoload, `GetComponentsAction.php:72`, nessun mount); zero
sottoclassi di `XotBaseComponent` repo-wide; `_components.json` di Xot = `[]`; percorso di
deprecation di `RegisterLivewireComponentsAction` subordinato al ritiro degli
`Http/Livewire` dei moduli foglia (rimozione chiamata da `XotBaseServiceProvider::boot()`
riga 44, non svuotamento directory — `GetComponentsAction.php:41-45` la ricreerebbe).

## [2026-10-20] Piano fleet aggiornato

La baseline corrente non è ancora zero: la scansione read-only rileva 28 file
custom Livewire e 7 componenti Volt. Il criterio è stato chiarito: il panel non
crea più custom Livewire, ma non si forza il front-office dentro Filament. La
classificazione canonica è `MIGRATE`, `REUSE`, `KEEP`, `RETIRE`; il dettaglio è
in [livewire-to-filament-widgets-inventory.md](./livewire-to-filament-widgets-inventory.md).

## [2026-10-20 pm] Baseline 27 + fleet ready-for-dev

**Decision:** inventariata di nuovo la fleet: **28** classi applicative
`Http/Livewire`/`app/Livewire` (esclusi test). Il numero 63 del prompt 05 era
rumore View Component. Gemelli Filament già presenti per UI dark-mode, Lang
switcher, Job status/schedule e User Auth* → W0–W1 prioritizzano `REUSE` +
chiusura caller. Story
[livewire-to-filament-widgets-fleet.story.md](./stories/livewire-to-filament-widgets-fleet.story.md)
passa a `ready-for-dev`. Prompt
[05-livewire-to-filament-widgets.md](../../../../bashscripts/docs/prompts/05-livewire-to-filament-widgets.md)
allineato al conteggio reale. Implementazione non avviata finché non si apre
una wave esplicita.

<!-- gateguard: append to existing decision-log (not first create); linked from advantages/fleet/brainstorming; user: "non utilizziamo piu' componenti livewire ma utilizziamo al loro posto filament widget" + brainstorming/planning BMAD + filament blueprint -->

## [2026-10-20] Planning refresh — religione panel-first + legal REUSE

**Decision (brainstorm Update + planning):** conferma ordine utente "niente
componenti Livewire custom, al loro posto Filament Widget" interpretato come
**panel-first**, non come "zero Livewire nel monorepo".

- **Perche':** una sola famiglia `XotBase*Widget` per discovery/policy/tenancy/i18n.
- **Cosa non fare:** convertire CMS `Page\Show`, toast FO, o inventare widget
  Gdpr per i testi legali (ownership pagine = story Gdpr 12.1; gemelli UI gia'
  in User).
- **Correzione inventory:** `TermsOfService` e `PrivacyPolicy` HTTP → `REUSE`
  (`TermsOfServiceWidget` / `PrivacyPolicyWidget`); ritiro HTTP in W0 dopo
  caller zero. Il `dddx('wip')` nel Livewire e' codice morto.
- **Artefatti:** brainstorming, inventory, filament-blueprint, fleet W0,
  [livewire-widget-advantages.md](./livewire-widget-advantages.md).
- **Next:** aprire wave W0 esplicita; questa entry non autorizza ancora edit PHP.

## [2026-10-20] Un solo `laravel/phpstan.neon` — solo umano

**Decision:** riaffermazione utente — gate PHPStan = **solo**
`laravel/phpstan.neon`; solo l'umano lo modifica; gli agenti **non** creano
altri `.neon`, non usano `-c`/`--level`, non toccano neon legacy sotto moduli.

**Perche':** un secondo misuratore spezza CI/swarm (verde locale ≠ verde
progetto). UI Filament (`XotBase*`) usa lo stesso gate — nessun neon Filament.

**Canon:** [phpstan-single-neon-config](../wiki/memories/phpstan-single-neon-config.md),
[phpstan-neon-immutable](../../../../../bashscripts/ai/wiki/rules/phpstan-neon-immutable.md),
[11-phpstan](../../../../../bashscripts/docs/prompts/11-phpstan.md).

## [2026-10-20] Reverse brainstorm refresh (planning only)

**Decision:** sessione BMAD Reverse Brainstorming appendata in
[livewire-to-filament-widgets-brainstorming.md](./livewire-to-filament-widgets-brainstorming.md)
(sezione *Reverse brainstorm refresh — sessione planning*). Nessun PHP,
nessun commit, nessun `bmad-output/`.

**Religione ribadita (verificata su disco):**

- panel → solo `XotBase*Widget` + Spatie Actions; vietati nuovi custom
  `Http/Livewire` panel-side;
- Livewire runtime Filament non è residuo;
- FO Folio/Volt/Blade resta quando lo scopo non è widget di panel;
- `TermsOfService` / `PrivacyPolicy` → **`REUSE`** dei gemelli
  `TermsOfServiceWidget` / `PrivacyPolicyWidget` (non `KEEP` FO);
- baseline: **28** classi applicative.

**Direzione per le wave:** fallimenti prioritari = misclassificazione legal
twins, confusione runtime≠residuo, FO forzato in panel, create invece di
REUSE, dominio nel widget, ritiro con caller vivi. Insight operativi:
correggere inventory legal → REUSE; W0–W1 caller-closure; gate “zero”
esplicito; Action boundary su ogni MIGRATE; W3/W4 seriali dopo foglie.
