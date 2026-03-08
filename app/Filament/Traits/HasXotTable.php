<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

/**
 * Trait HasXotTable.
 *
 * Provides standardized table configuration for Filament resources.
 */
trait HasXotTable
{
    /**
     * Define the table.
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
            ->actions($this->getTableActionsArray())
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * Get table columns based on layout.
     *
     * @return array<int, Tables\Columns\Column|Stack>
     */
    public function getTableColumns(): array
    {
        if ($this->layoutView === TableLayoutEnum::GRID) {
            return $this->getGridTableColumns();
        }

        return $this->getListTableColumns();
    }

    /**
     * Get table actions as array.
     *
     * @return array<int, Action|ActionGroup>
     */
    public function getTableActionsArray(): array
    {
        return [
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
        ];
    }

    /**
     * Check if associate action should be shown.
     */
    protected function shouldShowAssociateAction(): bool
    {
        return false;
    }

    /**
     * Get grid table columns.
     *
     * @return array<int, Tables\Columns\Column|Stack>
     */
    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    /**
     * Get list table columns.
     *
     * @return array<int, Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        // To be implemented by the resource
        return [];
    }
}
