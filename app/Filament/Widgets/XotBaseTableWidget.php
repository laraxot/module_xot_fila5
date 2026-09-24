<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< .merge_file_2RFitT
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as FilamentTableWidget;
use Illuminate\Database\Eloquent\Model;
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as FilamentTableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as FilamentTableWidget;
use Illuminate\Database\Eloquent\Model;
>>>>>>> .merge_file_xMGyrj
use Livewire\Attributes\On;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\TransTrait;

abstract class XotBaseTableWidget extends FilamentTableWidget
{
<<<<<<< HEAD
    use HasXotTable;
=======
    use HasXotTable {
        getGridTableColumns as private xotGetGridTableColumns;
        getTablePaginated as private xotGetTablePaginated;
        getSearchableColumns as private xotSearchableColumns;
        getHeaderActions as private xotGetHeaderActions;
    }
>>>>>>> 930f8146 (Check & fix styling)
    use InteractsWithPageFilters;
    use TransTrait;

    /**
<<<<<<< HEAD
=======
     * @return array<int, \Filament\Tables\Columns\Column|\Filament\Tables\Columns\ColumnGroup|\Filament\Tables\Columns\Layout\Component>
     */
    public function getGridTableColumns(): array
    {
        return $this->xotGetGridTableColumns();
    }

    /**
     * @return bool|array<int|string>
     */
    protected function getTablePaginated(): bool|array
    {
        $paginated = $this->xotGetTablePaginated();

        if (is_bool($paginated)) {
            return $paginated;
        }

        /** @var array<int|string> $options */
        $options = $paginated;

        return $options;
    }

    /**
     * @return array<string>
     */
    protected function getSearchableColumns(): array
    {
        /** @var array<string> $columns */
        $columns = $this->xotSearchableColumns();

        return $columns;
    }

    /**
     * @return array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
     */
    protected function getHeaderActions(): array
    {
        /** @var array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup> $actions */
        $actions = $this->xotGetHeaderActions();

        return $actions;
    }

    /**
>>>>>>> 930f8146 (Check & fix styling)
     * Ascolta evento di aggiornamento filtri.
     *
<<<<<<< .merge_file_2RFitT
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $filters
=======
     * @param array<string, mixed> $filters
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $filters
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $filters
>>>>>>> .merge_file_xMGyrj
     */
    #[On('filterUpdate')]
    public function updateFilters(array $filters): void
    {
        // Forza refresh della tabella quando i filtri cambiano
        $this->resetTable();
    }

    /**
<<<<<<< .merge_file_2RFitT
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_xMGyrj
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
<<<<<<< .merge_file_2RFitT
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

    public function getTableSearch(): ?string
    {
        $search = $this->tableSearch ?? null;

        if (! \is_string($search)) {
            return null;
        }

        $search = trim($search);

        return '' !== $search ? $search : null;
    }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_xMGyrj
}
