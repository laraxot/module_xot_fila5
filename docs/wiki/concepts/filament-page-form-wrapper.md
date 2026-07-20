---
title: "Wrapper form nelle Filament Page custom — plain <form>, non componenti inesistenti"
module: Xot
type: concept
status: approved
tags: [filament, blade, form, view-cache, cross-module]
created: "2026-07-20"
updated: "2026-07-20"
related:
  - "../../../../../docs/chat/filament-schemas-form-component-missing.md"
  - "../../../../../docs/wiki/rules/multi-agent-lock-coordination.md"
---

# Wrapper form nelle Filament Page custom

## Regola

Per avvolgere `{{ $this->form }}` in una Page Filament 5 custom (non un Resource), usa un `<form>` HTML semplice con `wire:submit`, **non** un componente Blade come `<x-filament-schemas::form>` — non esiste in nessuna versione di `filament/schemas` (verificato: `vendor/filament/schemas/resources/views/components/` contiene solo `grid.blade.php` e `fieldset.blade.php`; zero occorrenze nel sorgente ufficiale `filamentphp/filament`).

## Pattern verificato (fonte: filamentphp/demo, resources/views/livewire/form.blade.php)

```blade
<form wire:submit="save">
    {{ $this->form }}

    <x-filament::button type="submit">
        {{ __('Save') }}
    </x-filament::button>
</form>
```

## Stato in questo repo

Ci sono 12 view (`Modules/{Cms,User,Xot}/resources/views/filament/...`) scritte con `<x-filament-schemas::form wire:submit="...">`. Invece di editare ciascuna, il fix è un **singolo view override Laravel**:

`laravel/resources/views/vendor/filament-schemas/components/form.blade.php`:

```blade
<form {{ $attributes }}>
    {{ $slot }}
</form>
```

Questo fa risolvere il componente inesistente come alias del `<form>` nativo, senza toccare i 12 consumer. Vedi `docs/chat/filament-schemas-form-component-missing.md` per il dettaglio della ricerca e lo stato del coordinamento multi-agente (questo file è stato rimosso per errore da agenti concorrenti più volte — non cancellarlo senza controllare `php artisan view:cache` prima).

## Verifica

```bash
cd laravel && php artisan view:cache
```

Deve completare senza `InvalidArgumentException: Unable to locate a class or view for component [filament-schemas::form]`.
