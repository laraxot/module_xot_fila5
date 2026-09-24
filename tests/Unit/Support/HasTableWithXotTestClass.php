<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Support;

<<<<<<< HEAD
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
use Mockery\MockInterface;
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * @property string|null $tableSearch
 */
=======
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Modules\Xot\Filament\Traits\HasXotTable;

>>>>>>> laraxot/dev
class HasTableWithXotTestClass
{
    use HasXotTable;

<<<<<<< .merge_file_b0Ds3u
    public function getLayoutView(): object
=======
<<<<<<< HEAD
    public function getLayoutView(): object
=======
    public function getLayoutView(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    {
        $mock = \Mockery::mock();
        $mock->allows(['getTableColumns' => []]);
        $mock->allows(['getTableContentGrid' => []]);

        return $mock;
    }

    #[\Override]
<<<<<<< .merge_file_b0Ds3u
    /** @return array<int, Column|ColumnGroup|Component> */
=======
<<<<<<< HEAD
    /** @return array<int, Column|ColumnGroup|Component> */
=======
    /** @return array<int, mixed> */
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    public function getTableColumns(): array
    {
        return [];
    }

    /**
<<<<<<< HEAD
     * @return Table&MockInterface
     */
    public function getTable(): Table
    {
        /** @var Table&MockInterface $mock */
=======
     * @return Table&\Mockery\MockInterface
     */
    public function getTable(): Table
    {
        /** @var Table&\Mockery\MockInterface $mock */
>>>>>>> laraxot/dev
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

<<<<<<< .merge_file_b0Ds3u
    /** @return array<string|int, BaseFilter> */
=======
<<<<<<< HEAD
    /** @return array<string|int, BaseFilter> */
=======
    /** @return array<int, mixed> */
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    public function getTableFilters(): array
    {
        return [];
    }

<<<<<<< .merge_file_b0Ds3u
    public function getTableFiltersForm(): ?Schema
=======
<<<<<<< HEAD
    public function getTableFiltersForm(): ?Schema
=======
    public function getTableFiltersForm(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
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

<<<<<<< .merge_file_b0Ds3u
    public function getTableColumnToggleForm(): ?Schema
=======
<<<<<<< HEAD
    public function getTableColumnToggleForm(): ?Schema
=======
    public function getTableColumnToggleForm(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

    /** @return array<int, mixed> */
    public function getTableRecords(): array
    {
        return [];
    }

<<<<<<< HEAD
    /**
     * @return Model|array<string, mixed>|null
     */
    public function getTableRecord(): Model|array|null
=======
    public function getTableRecord(): mixed
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

<<<<<<< .merge_file_b0Ds3u
    public function getTableRecordKey(): ?string
=======
<<<<<<< HEAD
    public function getTableRecordKey(): ?string
=======
    public function getTableRecordKey(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

    /** @return Collection<int, mixed> */
    public function getSelectedTableRecords(bool $_shouldFetchSelectedRecords = true): Collection
    {
<<<<<<< HEAD
        return new Collection;
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

    /** @return array<int, mixed> */
    public function getAllSelectableTableRecordKeys(): array
    {
        return [];
    }

<<<<<<< HEAD
    /**
     * @return Builder<Model>|null
     */
    public function getTableQueryForExport(): ?Builder
=======
    public function getTableQueryForExport(): mixed
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

<<<<<<< HEAD
    /**
     * @return Builder<Model>|null
     */
    public function getFilteredTableQuery(): ?Builder
=======
    public function getFilteredTableQuery(): mixed
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

<<<<<<< HEAD
    /**
     * @return Builder<Model>|null
     */
    public function getFilteredSortedTableQuery(): ?Builder
=======
    public function getFilteredSortedTableQuery(): mixed
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

<<<<<<< HEAD
    /**
     * @return Builder<Model>|null
     */
    public function getAllTableSummaryQuery(): ?Builder
=======
    public function getAllTableSummaryQuery(): mixed
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

<<<<<<< HEAD
    /**
     * @return Builder<Model>|null
     */
    public function getPageTableSummaryQuery(): ?Builder
=======
    public function getPageTableSummaryQuery(): mixed
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

    public function getMountedTableAction(): ?string
    {
        return null;
    }

<<<<<<< .merge_file_b0Ds3u
    public function getMountedTableActionForm(): ?Schema
=======
<<<<<<< HEAD
    public function getMountedTableActionForm(): ?Schema
=======
    public function getMountedTableActionForm(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

<<<<<<< .merge_file_b0Ds3u
    public function getMountedTableActionRecord(): ?Model
=======
<<<<<<< HEAD
    public function getMountedTableActionRecord(): ?Model
=======
    public function getMountedTableActionRecord(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

<<<<<<< .merge_file_b0Ds3u
    public function getMountedTableActionRecordKey(): ?string
=======
<<<<<<< HEAD
    public function getMountedTableActionRecordKey(): ?string
=======
    public function getMountedTableActionRecordKey(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

    public function getMountedTableBulkAction(): ?string
    {
        return null;
    }

<<<<<<< .merge_file_b0Ds3u
    public function getMountedTableBulkActionForm(): ?Schema
=======
<<<<<<< HEAD
    public function getMountedTableBulkActionForm(): ?Schema
=======
    public function getMountedTableBulkActionForm(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
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
    public function deselectAllTableRecords(): void {}

    public function mountTableAction(): void {}

    public function mountTableBulkAction(): void {}

    public function mountedTableActionRecord(): ?Model
<<<<<<< .merge_file_b0Ds3u
=======
=======
    public function deselectAllTableRecords(): void
    {
    }

    public function mountTableAction(): void
    {
    }

    public function mountTableBulkAction(): void
    {
    }

    public function mountedTableActionRecord(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }

<<<<<<< HEAD
    public function replaceMountedTableAction(): void {}

    public function replaceMountedTableBulkAction(): void {}

    public function resetTableSearch(): void {}

    public function resetTableColumnSearch(): void {}

    public function toggleTableReordering(): void {}
=======
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
>>>>>>> laraxot/dev

    public function parseTableFilterName(): string
    {
        return '';
    }

<<<<<<< .merge_file_b0Ds3u
    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
=======
<<<<<<< HEAD
    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
=======
    public function makeFilamentTranslatableContentDriver(): mixed
>>>>>>> laraxot/dev
>>>>>>> .merge_file_TFFQw5
    {
        return null;
    }
}
