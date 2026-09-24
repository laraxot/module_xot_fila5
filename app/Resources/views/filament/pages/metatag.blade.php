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
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getFormActions()"
        />

<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
</x-filament-panels::page>
