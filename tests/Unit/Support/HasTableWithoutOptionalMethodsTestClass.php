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
use Mockery\MockInterface;
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * @property string|null $tableSearch
 */
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Traits\HasXotTable;

>>>>>>> 8d801bbe (Check & fix styling)
class HasTableWithoutOptionalMethodsTestClass
{
    use HasXotTable;

<<<<<<< HEAD
    public function getLayoutView(): object
=======
    public function getLayoutView(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
    {
        $mock = \Mockery::mock();
        $mock->allows(['getTableColumns' => []]);
        $mock->allows(['getTableContentGrid' => []]);

        return $mock;
<<<<<<< HEAD
    }

    #[\Override]
    /** @return array<int, Column|ColumnGroup|Component> */
=======
        // Laraxot module file — see docs/wiki for domain contract.
        // Laraxot module file — see docs/wiki for domain contract.
        // Laraxot module file — see docs/wiki for domain contract.
        // Laraxot module file — see docs/wiki for domain contract.
    }

    #[\Override]
    /** @return array<int, mixed> */
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> 8d801bbe (Check & fix styling)
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
    /** @return array<string|int, BaseFilter> */
=======
    /** @return array<int, mixed> */
>>>>>>> 8d801bbe (Check & fix styling)
    public function getTableFilters(): array
    {
        return [];
    }

<<<<<<< HEAD
    public function getTableFiltersForm(): ?Schema
=======
    public function getTableFiltersForm(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
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
    public function getTableColumnToggleForm(): ?Schema
=======
    public function getTableColumnToggleForm(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return null;
    }

<<<<<<< HEAD
    public function getTableRecordKey(): ?string
=======
    public function getTableRecordKey(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
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
    /**
     * @return Builder<Model>|null
     */
    public function getTableQueryForExport(): ?Builder
=======
    public function getTableQueryForExport(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return null;
    }

    public function getMountedTableAction(): ?string
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableActionForm(): ?Schema
=======
    public function getMountedTableActionForm(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableActionRecord(): ?Model
=======
    public function getMountedTableActionRecord(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableActionRecordKey(): ?string
=======
    public function getMountedTableActionRecordKey(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return null;
    }

    public function getMountedTableBulkAction(): ?string
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableBulkActionForm(): ?Schema
=======
    public function getMountedTableBulkActionForm(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
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

<<<<<<< .merge_file_Tm6Xbj
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_055Ujs
    public function deselectAllTableRecords(): void {}

    public function mountTableAction(): void {}

    public function mountTableBulkAction(): void {}
<<<<<<< .merge_file_Tm6Xbj
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
    public function deselectAllTableRecords(): void
    {
    }

    public function mountTableAction(): void
    {
    }

    public function mountTableBulkAction(): void
    {
    }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_055Ujs

    public function mountedTableActionRecord(): ?Model
=======

    public function mountedTableActionRecord(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return null;
    }

<<<<<<< .merge_file_Tm6Xbj
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_055Ujs
    public function replaceMountedTableAction(): void {}

    public function replaceMountedTableBulkAction(): void {}

    public function resetTableSearch(): void {}

    public function resetTableColumnSearch(): void {}

    public function toggleTableReordering(): void {}
<<<<<<< .merge_file_Tm6Xbj
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_055Ujs

    public function parseTableFilterName(): string
    {
        return '';
    }

<<<<<<< HEAD
    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
=======
    public function makeFilamentTranslatableContentDriver(): mixed
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return null;
    }
}
