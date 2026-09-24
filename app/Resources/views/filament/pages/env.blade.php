<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
?>
<x-filament-panels::page>
     <form wire:submit.prevent="submit">
        {{ $this->form }}

        <x-filament::button type="submit" class="mt-4">
            Save <x-filament::loading-indicator class="h-5 w-5" wire:loading wire:target="submit"/>
        </x-filament::button>
    </form>
</x-filament-panels::page>
