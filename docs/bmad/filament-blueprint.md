---
title: "Filament Blueprint — Xot"
type: filament-blueprint
status: active
module: Xot
created: 2026-10-16
updated: 2026-10-20
tags: [bmad, filament, blueprint, xot]
qmd: "filament blueprint xot xotbase resource widget"
related:
  - ../bmad-planning.md
  - ../bmad-brainstorming.md
---

# Scopo

Contratto Filament del modulo **Xot**: chrome BO e/o widget FO senza violare
i confini di dominio.

## Regole non negoziabili

1. Estendere solo `XotBaseResource` / `XotBaseWidget` / basi Xot — mai classi Filament dirette.
2. Nessun `->label()` hardcoded: chiavi in `lang/<locale>/` del modulo.
3. Business logic nelle Actions del modulo (`QueueableAction` + `execute()`), non nei form hooks grassi e **mai** in `*Service` applicativi ([services-to-queueable-actions-filament-blueprint](./services-to-queueable-actions-filament-blueprint.md)).
4. FO: widget montati esplicitamente; non abusare `discoverWidgets` per chrome.
5. Sync di default (`app(Action::class)->execute(...)`); `dispatch()` solo se il contratto UI e' esplicitamente asincrono e il payload e' serializzabile.

## Resource / widget

- `XotBaseResource`
- `ModuleResource`
- `LogResource`

`XotBaseMigration` risolve il modello dal file `create_{modello}_table`.
La Resource non lo ricalca con `$model_class` sulla migration.

## Form / Table / Infolist

Preferire triad schema dedicati (`*Form`, `*Table`, `*Infolist`) quando la Resource
cresce oltre pochi campi. Enum tipizzati al posto di option array.

## Policy e tenant

Ogni query Filament rispetta tenant + policy del modello owner. Nessun elenco
cross-tenant per comodita admin.

## Asset del pannello

`header-actions-wrap.css` e' un asset Filament del modulo: sorgente in `resources/css/`, pubblicato da `FilamentAsset` in `public_html/assets/xot/`. Non va nell'`outDir` del tema Sixteen (`Themes/Sixteen/public`), che e' solo il prodotto di `vite build`.

## PHPStan (stesso gate del monorepo)

Resource, widget e test Filament passano da **`laravel/phpstan.neon` solo** (modifica solo umano; agenti mai altri `.neon`, ignore o baseline). Ogni turn non banale riallinea verso `analyse Modules` a zero senza conferma ([ordine permanente](../../../../../bashscripts/docs/prompts/00-start.md#ordine-permanente-dellutente)). Memorie: [phpstan-single-neon-config](../wiki/memories/phpstan-single-neon-config.md), [phpstan-modules-zero-standing-order](../wiki/memories/phpstan-modules-zero-standing-order.md).

## Related

- Planning: [bmad-planning.md](../bmad-planning.md)
- Brainstorming: [bmad-brainstorming.md](../bmad-brainstorming.md)
- Livewire→Widget blueprint: [livewire-to-filament-widgets-filament-blueprint.md](./livewire-to-filament-widgets-filament-blueprint.md)
- Code quality wave: [code-quality-wave.md](./code-quality-wave.md)
- Services→Actions Filament: [services-to-queueable-actions-filament-blueprint.md](./services-to-queueable-actions-filament-blueprint.md)
- Zero cartelle `app/Services` (planning): [planning-services-to-actions-zero-folders.md](./planning-services-to-actions-zero-folders.md)
- Ratchet: `Modules/Xot/tests/Unit/Filament/NeverExtendFilamentDirectlyTest.php`

## Tooling fuori dal panel

`graphify-out/` e tooling second brain (grafo codice), **non** contratto Filament: non montare Resource/Widget che leggono quel path; ignorarlo in `.gitignore` ([graphify-out-gitignore.md](./graphify-out-gitignore.md)).
