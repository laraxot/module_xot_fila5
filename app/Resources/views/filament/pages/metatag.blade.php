<?php

declare(strict_types=1);
<<<<<<< HEAD
?>
<x-filament-panels::page>
    <form wire:submit="save">
=======

?>
<x-filament-panels::page>
    <x-filament-schemas::form wire:submit="save">
>>>>>>> laraxot/dev
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getFormActions()"
        />

<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
>>>>>>> laraxot/dev
</x-filament-panels::page>
