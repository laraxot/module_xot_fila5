<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Support;

<<<<<<< HEAD
use Filament\Tables\Table;
=======
use Filament\Schemas\Schema;
use Filament\Support\Contracts\TranslatableContentDriver;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
>>>>>>> laraxot/dev
use Mockery\MockInterface;
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * @property string|null $tableSearch
 */
class HasTableWithoutOptionalMethodsTestClass
{
    use HasXotTable;

<<<<<<< HEAD
    public function getLayoutView(): mixed
=======
    public function getLayoutView(): object
>>>>>>> laraxot/dev
    {
        $mock = \Mockery::mock();
        $mock->allows(['getTableColumns' => []]);
        $mock->allows(['getTableContentGrid' => []]);

        return $mock;
    }

    #[\Override]
<<<<<<< HEAD
    /** @return array<int, \Filament\Tables\Columns\Column|\Filament\Tables\Columns\ColumnGroup|\Filament\Tables\Columns\Layout\Component> */
=======
    /** @return array<int, Column|ColumnGroup|Component> */
>>>>>>> laraxot/dev
    public function getTableColumns(): array
    {
        return [];
    }

    /**
     * @return Table&MockInterface
     */
    public function getTable(): Table
    {
        /** @var Table&MockInterface $mock */
        $mock = \Mockery::mock(Table::class);

        return $mock;
    }

    public function getTablePage(): ?int
    {
        return 1;
    }

    public function getTableRecordsPerPage(): int
    {
        return 10;
    }

    public function getTableSortColumn(): ?string
    {
        return null;
    }

    public function getTableSortDirection(): ?string
    {
        return null;
    }

<<<<<<< HEAD
    /** @return array<string|int, \Filament\Tables\Filters\BaseFilter> */
=======
    /** @return array<string|int, BaseFilter> */
>>>>>>> laraxot/dev
    public function getTableFilters(): array
    {
        return [];
    }

<<<<<<< HEAD
    public function getTableFiltersForm(): mixed
=======
    public function getTableFiltersForm(): ?Schema
>>>>>>> laraxot/dev
    {
        return null;
    }

    /** @return array<int, mixed> */
    public function getTableFilterState(string $_name): ?array
    {
        return [];
    }

    public function getTableGrouping(): ?string
    {
        return null;
    }

    public function getTableSearchIndicator(): ?string
    {
        return null;
    }

    /** @return array<int, mixed> */
    public function getTableColumnSearchIndicators(): array
    {
        return [];
    }

<<<<<<< HEAD
    public function getTableColumnToggleForm(): mixed
=======
    public function getTableColumnToggleForm(): ?Schema
>>>>>>> laraxot/dev
    {
        return null;
    }

    /** @return array<int, mixed> */
    public function getTableRecords(): array
    {
        return [];
    }

<<<<<<< HEAD
    public function getTableRecord(): mixed
=======
    /**
     * @return Model|array<string, mixed>|null
     */
    public function getTableRecord(): Model|array|null
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
    public function getTableRecordKey(): mixed
=======
    public function getTableRecordKey(): ?string
>>>>>>> laraxot/dev
    {
        return null;
    }

    /** @return array<int, mixed> */
    public function getSelectedTableRecords(): array
    {
        return [];
    }

    public function getAllTableRecordsCount(): int
    {
        return 0;
    }

    public function getAllSelectableTableRecordsCount(): int
    {
        return 0;
    }

    /** @return array<int, mixed> */
    public function getAllSelectableTableRecordKeys(): array
    {
        return [];
    }

<<<<<<< HEAD
    public function getTableQueryForExport(): mixed
=======
    /**
     * @return Builder<Model>|null
     */
    public function getTableQueryForExport(): ?Builder
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
    public function getFilteredTableQuery(): mixed
=======
    /**
     * @return Builder<Model>|null
     */
    public function getFilteredTableQuery(): ?Builder
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
    public function getFilteredSortedTableQuery(): mixed
=======
    /**
     * @return Builder<Model>|null
     */
    public function getFilteredSortedTableQuery(): ?Builder
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
    public function getAllTableSummaryQuery(): mixed
=======
    /**
     * @return Builder<Model>|null
     */
    public function getAllTableSummaryQuery(): ?Builder
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
    public function getPageTableSummaryQuery(): mixed
=======
    /**
     * @return Builder<Model>|null
     */
    public function getPageTableSummaryQuery(): ?Builder
>>>>>>> laraxot/dev
    {
        return null;
    }

    public function getMountedTableAction(): ?string
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableActionForm(): mixed
=======
    public function getMountedTableActionForm(): ?Schema
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableActionRecord(): mixed
=======
    public function getMountedTableActionRecord(): ?Model
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableActionRecordKey(): mixed
=======
    public function getMountedTableActionRecordKey(): ?string
>>>>>>> laraxot/dev
    {
        return null;
    }

    public function getMountedTableBulkAction(): ?string
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableBulkActionForm(): mixed
=======
    public function getMountedTableBulkActionForm(): ?Schema
>>>>>>> laraxot/dev
    {
        return null;
    }

    public function getActiveTableLocale(): ?string
    {
        return null;
    }

    public function isTableLoaded(): bool
    {
        return true;
    }

    public function isTableReordering(): bool
    {
        return false;
    }

    public function hasTableSearch(): bool
    {
        return false;
    }

    public function isTableColumnToggledHidden(): bool
    {
        return false;
    }

    public function callMountedTableAction(): mixed
    {
        return null;
    }

    public function callTableColumnAction(string $_name, string $_recordKey): mixed
    {
        return null;
    }

    public function deselectAllTableRecords(): void {}

    public function mountTableAction(): void {}

    public function mountTableBulkAction(): void {}

<<<<<<< HEAD
    public function mountedTableActionRecord(): mixed
=======
    public function mountedTableActionRecord(): ?Model
>>>>>>> laraxot/dev
    {
        return null;
    }

    public function replaceMountedTableAction(): void {}

    public function replaceMountedTableBulkAction(): void {}

    public function resetTableSearch(): void {}

    public function resetTableColumnSearch(): void {}

    public function toggleTableReordering(): void {}

    public function parseTableFilterName(): string
    {
        return '';
    }

<<<<<<< HEAD
    public function makeFilamentTranslatableContentDriver(): mixed
=======
    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
>>>>>>> laraxot/dev
    {
        return null;
    }
}
