<?php

declare(strict_types=1);

?>
<x-filament-panels::page>
<<<<<<< HEAD
    <x-filament-schemas::form wire:submit="save">
=======
    <form wire:submit="save">
>>>>>>> c7fd73eb (.)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getFormActions()"
        />

<<<<<<< HEAD
    </x-filament-schemas::form>
=======
    </form>
>>>>>>> c7fd73eb (.)
</x-filament-panels::page>
