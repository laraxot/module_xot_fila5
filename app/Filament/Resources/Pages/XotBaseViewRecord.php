<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

<<<<<<< HEAD
use Filament\Forms\Components\Component;
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
>>>>>>> c7fd73eb (.)
use Filament\Resources\Pages\ViewRecord as FilamentViewRecord;

abstract class XotBaseViewRecord extends FilamentViewRecord
{
<<<<<<< HEAD
    // Aggiungi qui eventuali metodi o proprietà comuni a tutte le pagine di visualizzazione

    /**
     * Restituisce lo schema dell'infolist per la visualizzazione dei dettagli del record.
     * Questo metodo deve sempre restituire un array con chiavi di tipo stringa.
     *
     * @return array<string|int, \Filament\Support\Components\Component>
     */
    abstract protected function getInfolistSchema(): array;
=======
    use HasFiltersForm;

    /**
     * Get the header actions.
     *
     * @return array<string, Action|ActionGroup>
     */
    protected function getHeaderActions(): array
    {
        return [];
    }
>>>>>>> c7fd73eb (.)
}
