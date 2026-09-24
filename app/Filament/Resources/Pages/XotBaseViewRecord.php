<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Resources\Pages\ViewRecord as FilamentViewRecord;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
>>>>>>> laraxot/dev
=======
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
>>>>>>> 8d801bbe (Check & fix styling)

abstract class XotBaseViewRecord extends FilamentViewRecord
{
    use HasFiltersForm;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
    final public function infolist(Schema $schema): Schema
    {
        return $schema->components($this->getInfolistSchema());
    }

    /**
     * Restituisce lo schema dell'infolist per la visualizzazione dei dettagli del record.
     * Questo metodo deve sempre restituire un array con chiavi di tipo stringa.
     *
     * @return array<string, Component>
     */
    abstract protected function getInfolistSchema(): array;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
    /**
     * Get the header actions.
     *
     * @return array<string, Action|ActionGroup>
     */
    protected function getHeaderActions(): array
    {
        return [];
    }
}
