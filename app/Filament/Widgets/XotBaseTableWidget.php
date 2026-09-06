<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as FilamentTableWidget;
use Illuminate\Database\Eloquent\Model;
=======
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as FilamentTableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
>>>>>>> 7f6cf6be (.)
use Livewire\Attributes\On;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\TransTrait;

abstract class XotBaseTableWidget extends FilamentTableWidget
{
    use HasXotTable;
    use InteractsWithPageFilters;
    use TransTrait;

    /**
     * Ascolta evento di aggiornamento filtri.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $filters
=======
     * @param array<string, mixed> $filters
>>>>>>> 7f6cf6be (.)
     */
    #[On('filterUpdate')]
    public function updateFilters(array $filters): void
    {
        // Forza refresh della tabella quando i filtri cambiano
        $this->resetTable();
    }

    /**
<<<<<<< HEAD
=======
     * Configura la tabella con le risposte.
     */
    public function tableOLD(Table $table): Table
    {
        $query = $this->getTableQuery();
        if ($query instanceof Relation) {
            $query = $query->getQuery();
        }

        /* @var Builder|null $query */
        return $table
            ->query($query)
            ->columns($this->getTableColumns())
            ->defaultSort('submitdate', 'desc')
            ->paginated([10, 25, 50, 100])
            ->poll('30s');
    }

    /**
>>>>>>> 7f6cf6be (.)
     * Restituisce una chiave univoca per ogni record.
     * Usa _id che è l'alias della primary key creato da withAnswersLabel().
     *
     * IMPORTANTE: Non usare mai chiavi hardcoded, altrimenti Livewire
     * pensa che tutti i record siano lo stesso e mostra duplicati.
     */
    public function getTableRecordKey(Model|array $record): string
    {
        if (\is_array($record)) {
            return SafeStringCastAction::cast($record['_id'] ?? $record['id'] ?? '');
        }

        return SafeStringCastAction::cast($record->_id ?? $record->id ?? '');
    }
}
