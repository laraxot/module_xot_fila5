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
>>>>>>> 3792da0d (Check & fix styling)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getFormActions()"
        />

<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
>>>>>>> 3792da0d (Check & fix styling)
</x-filament-panels::page>
