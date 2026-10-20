---
title: "Filament Blueprint — Xot"
type: filament-blueprint
status: active
module: Xot
created: 2026-10-16
updated: 2026-10-16
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

## Form / Table / Infolist

Preferire triad schema dedicati (`*Form`, `*Table`, `*Infolist`) quando la Resource
cresce oltre pochi campi. Enum tipizzati al posto di option array.

## Policy e tenant

Ogni query Filament rispetta tenant + policy del modello owner. Nessun elenco
cross-tenant per comodita admin.

## PHPStan (stesso gate del monorepo)

Widget e Resource `XotBase*` passano da **`laravel/phpstan.neon` solo** (umano
unica modifica; agenti mai altri `.neon`). Vedi
[phpstan-single-neon-config](../wiki/memories/phpstan-single-neon-config.md).

## Related

- Planning: [bmad-planning.md](../bmad-planning.md)
- Brainstorming: [bmad-brainstorming.md](../bmad-brainstorming.md)
- Livewire→Widget blueprint: [livewire-to-filament-widgets-filament-blueprint.md](./livewire-to-filament-widgets-filament-blueprint.md)
