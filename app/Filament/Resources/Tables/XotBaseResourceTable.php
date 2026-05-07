<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Tables;

use Filament\Tables\Table;

class XotBaseResourceTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(static::getTableColumns())
            ->filters(static::getTableFilters())
            ->recordActions(static::getTableActions())
            ->toolbarActions(static::getTableBulkActions());
    }

    /**
     * @return array<int|string, \Filament\Tables\Columns\Column>
     */
    public static function getTableColumns(): array
    {
        return [];
    }

    /**
     * @return array<int|string, \Filament\Tables\Filters\BaseFilter>
     */
    public static function getTableFilters(): array
    {
        return [];
    }

    /**
     * @return array<int|string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
     */
    public static function getTableActions(): array
    {
        return [];
    }

    /**
     * @return array<int|string, \Filament\Actions\BulkAction|\Filament\Actions\BulkActionGroup>
     */
    public static function getTableBulkActions(): array
    {
        return [];
    }
}
