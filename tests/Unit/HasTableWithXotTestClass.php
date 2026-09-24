<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Filament\Schemas\Schema;
use Filament\Support\Contracts\TranslatableContentDriver;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
<<<<<<< HEAD
=======
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Mockery;
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
use Mockery\MockInterface;
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * Dummy class that uses HasTable and HasXotTable traits for testing.
 */
class HasTableWithXotTestClass
{
    use HasXotTable;

<<<<<<< HEAD
<<<<<<< HEAD
    public function getLayoutView(): object
    {
        $mock = \Mockery::mock();
=======
    public function getLayoutView(): mixed
    {
        $mock = Mockery::mock();
>>>>>>> laraxot/dev
=======
    public function getLayoutView(): object
    {
        $mock = \Mockery::mock();
>>>>>>> laraxot/dev
        $mock->shouldReceive('getTableColumns')->andReturn([]);
        $mock->shouldReceive('getTableContentGrid')->andReturn([]);

        return $mock;
    }

    /**
     * @return array<string, Column|ColumnGroup|Component>
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
    /** @return array<string, \Filament\Tables\Columns\Column> */
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    public function getTableColumns(): array
    {
        return [];
    }

    public function getTable(): Table
    {
        /** @var Table&MockInterface $table */
<<<<<<< HEAD
<<<<<<< HEAD
        $table = \Mockery::mock(Table::class);
=======
        $table = Mockery::mock(Table::class);
>>>>>>> laraxot/dev
=======
        $table = \Mockery::mock(Table::class);
>>>>>>> laraxot/dev

        return $table;
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

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string|int, BaseFilter>
=======
     * @return array<string|int, \Filament\Tables\Filters\BaseFilter>
>>>>>>> laraxot/dev
=======
     * @return array<string|int, BaseFilter>
>>>>>>> laraxot/dev
     */
    public function getTableFilters(): array
    {
        return [];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableFiltersForm(): ?Schema
=======
    public function getTableFiltersForm(): mixed
>>>>>>> laraxot/dev
=======
    public function getTableFiltersForm(): ?Schema
>>>>>>> laraxot/dev
    {
        return null;
    }

    /**
     * @return array<string, mixed>|null
     */
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

    /**
     * @return array<int, mixed>
     */
    public function getTableColumnSearchIndicators(): array
    {
        return [];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableColumnToggleForm(): ?Schema
=======
    public function getTableColumnToggleForm(): mixed
>>>>>>> laraxot/dev
=======
    public function getTableColumnToggleForm(): ?Schema
>>>>>>> laraxot/dev
    {
        return null;
    }

    /**
     * @return array<int, mixed>
     */
    public function getTableRecords(): array
    {
        return [];
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * @return Model|array<string, mixed>|null
     */
    public function getTableRecord(): Model|array|null
<<<<<<< HEAD
=======
    public function getTableRecord(): mixed
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableRecordKey(): ?string
=======
    public function getTableRecordKey(): mixed
>>>>>>> laraxot/dev
=======
    public function getTableRecordKey(): ?string
>>>>>>> laraxot/dev
    {
        return null;
    }

    /**
     * @return Collection<int, mixed>
     */
    public function getSelectedTableRecords(bool $_shouldFetchSelectedRecords = true): Collection
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return new Collection();
=======
        return new Collection;
>>>>>>> laraxot/dev
=======
        return new Collection();
>>>>>>> laraxot/dev
    }

    public function getAllTableRecordsCount(): int
    {
        return 0;
    }

    public function getAllSelectableTableRecordsCount(): int
    {
        return 0;
    }

    /**
     * @return array<int, mixed>
     */
    public function getAllSelectableTableRecordKeys(): array
    {
        return [];
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * @return Builder<Model>|null
     */
    public function getTableQueryForExport(): ?Builder
<<<<<<< HEAD
=======
    public function getTableQueryForExport(): mixed
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * @return Builder<Model>|null
     */
    public function getFilteredTableQuery(): ?Builder
<<<<<<< HEAD
=======
    public function getFilteredTableQuery(): mixed
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * @return Builder<Model>|null
     */
    public function getFilteredSortedTableQuery(): ?Builder
<<<<<<< HEAD
=======
    public function getFilteredSortedTableQuery(): mixed
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * @return Builder<Model>|null
     */
    public function getAllTableSummaryQuery(): ?Builder
<<<<<<< HEAD
=======
    public function getAllTableSummaryQuery(): mixed
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * @return Builder<Model>|null
     */
    public function getPageTableSummaryQuery(): ?Builder
<<<<<<< HEAD
=======
    public function getPageTableSummaryQuery(): mixed
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    {
        return null;
    }

    public function getMountedTableAction(): ?string
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableActionForm(): ?Schema
=======
    public function getMountedTableActionForm(): mixed
>>>>>>> laraxot/dev
=======
    public function getMountedTableActionForm(): ?Schema
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableActionRecord(): ?Model
=======
    public function getMountedTableActionRecord(): mixed
>>>>>>> laraxot/dev
=======
    public function getMountedTableActionRecord(): ?Model
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableActionRecordKey(): ?string
=======
    public function getMountedTableActionRecordKey(): mixed
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
    public function getMountedTableBulkActionForm(): ?Schema
=======
    public function getMountedTableBulkActionForm(): mixed
>>>>>>> laraxot/dev
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

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    public function deselectAllTableRecords(): void
    {
    }

    public function mountTableAction(): void
    {
    }

    public function mountTableBulkAction(): void
    {
    }

    public function mountedTableActionRecord(): ?Model
<<<<<<< HEAD
=======
    public function deselectAllTableRecords(): void {}

    public function mountTableAction(): void {}

    public function mountTableBulkAction(): void {}

    public function mountedTableActionRecord(): mixed
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    public function replaceMountedTableAction(): void
    {
    }

    public function replaceMountedTableBulkAction(): void
    {
    }

    public function resetTableSearch(): void
    {
    }

    public function resetTableColumnSearch(): void
    {
    }

    public function toggleTableReordering(): void
    {
    }
<<<<<<< HEAD
=======
    public function replaceMountedTableAction(): void {}

    public function replaceMountedTableBulkAction(): void {}

    public function resetTableSearch(): void {}

    public function resetTableColumnSearch(): void {}

    public function toggleTableReordering(): void {}
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev

    public function parseTableFilterName(): string
    {
        return '';
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
=======
    public function makeFilamentTranslatableContentDriver(): mixed
>>>>>>> laraxot/dev
=======
    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
>>>>>>> laraxot/dev
    {
        return null;
    }
}
