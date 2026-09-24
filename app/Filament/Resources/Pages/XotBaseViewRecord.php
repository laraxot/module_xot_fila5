<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Resources\Pages\ViewRecord as FilamentViewRecord;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
=======
>>>>>>> laraxot/dev
=======
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
>>>>>>> laraxot/dev

abstract class XotBaseViewRecord extends FilamentViewRecord
{
    use HasFiltersForm;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
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
    protected function getInfolistSchema(): array{
        return [];
    }

<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
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
