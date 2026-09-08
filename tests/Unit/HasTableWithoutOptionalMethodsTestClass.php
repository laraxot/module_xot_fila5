<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< HEAD
use Override;
use Filament\Tables\Table;
use Mockery;
=======
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Table;
use Mockery;
use Mockery\MockInterface;
>>>>>>> c7fd73eb (.)
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * Dummy class without the optional methods.
 */
class HasTableWithoutOptionalMethodsTestClass
{
    use HasXotTable;

    public function getLayoutView(): mixed
    {
        $mock = Mockery::mock();
        $mock->shouldReceive('getTableColumns')->andReturn([]);
        $mock->shouldReceive('getTableContentGrid')->andReturn([]);
<<<<<<< HEAD
        return $mock;
    }

    #[Override]
=======

        return $mock;
    }

    /**
     * @return array<string, Column|ColumnGroup|Component>
     */
>>>>>>> c7fd73eb (.)
    public function getTableColumns(): array
    {
        return [];
    }

    public function getTable(): Table
    {
<<<<<<< HEAD
        return Mockery::mock(Table::class);
    }

    public function getTablePage(): null|int
=======
        /** @var Table&MockInterface $table */
        $table = Mockery::mock(Table::class);

        return $table;
    }

    public function getTablePage(): ?int
>>>>>>> c7fd73eb (.)
    {
        return 1;
    }

    public function getTableRecordsPerPage(): int
    {
        return 10;
    }

<<<<<<< HEAD
    public function getTableSortColumn(): null|string
=======
    public function getTableSortColumn(): ?string
>>>>>>> c7fd73eb (.)
    {
        return null;
    }

<<<<<<< HEAD
    public function getTableSortDirection(): null|string
=======
    public function getTableSortDirection(): ?string
>>>>>>> c7fd73eb (.)
    {
        return null;
    }

<<<<<<< HEAD
=======
    /**
     * @return array<string|int, \Filament\Tables\Filters\BaseFilter>
     */
>>>>>>> c7fd73eb (.)
    public function getTableFilters(): array
    {
        return [];
    }

    public function getTableFiltersForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getTableFilterState(string $_name): null|array
=======
    /**
     * @return array<string, mixed>|null
     */
    public function getTableFilterState(string $_name): ?array
>>>>>>> c7fd73eb (.)
    {
        return [];
    }

<<<<<<< HEAD
    public function getTableGrouping(): null|string
=======
    public function getTableGrouping(): ?string
>>>>>>> c7fd73eb (.)
    {
        return null;
    }

<<<<<<< HEAD
    public function getTableSearchIndicator(): null|string
=======
    public function getTableSearchIndicator(): ?string
>>>>>>> c7fd73eb (.)
    {
        return null;
    }

<<<<<<< HEAD
=======
    /**
     * @return array<int, mixed>
     */
>>>>>>> c7fd73eb (.)
    public function getTableColumnSearchIndicators(): array
    {
        return [];
    }

    public function getTableColumnToggleForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
=======
    /**
     * @return array<int, mixed>
     */
>>>>>>> c7fd73eb (.)
    public function getTableRecords(): array
    {
        return [];
    }

    public function getTableRecord(): mixed
    {
        return null;
    }

    public function getTableRecordKey(): mixed
    {
        return null;
    }

<<<<<<< HEAD
=======
    /**
     * @return array<int, mixed>
     */
>>>>>>> c7fd73eb (.)
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

<<<<<<< HEAD
=======
    /**
     * @return array<int, mixed>
     */
>>>>>>> c7fd73eb (.)
    public function getAllSelectableTableRecordKeys(): array
    {
        return [];
    }

    public function getTableQueryForExport(): mixed
    {
        return null;
    }

    public function getFilteredTableQuery(): mixed
    {
        return null;
    }

    public function getFilteredSortedTableQuery(): mixed
    {
        return null;
    }

    public function getAllTableSummaryQuery(): mixed
    {
        return null;
    }

    public function getPageTableSummaryQuery(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableAction(): null|string
=======
    public function getMountedTableAction(): ?string
>>>>>>> c7fd73eb (.)
    {
        return null;
    }

    public function getMountedTableActionForm(): mixed
    {
        return null;
    }

    public function getMountedTableActionRecord(): mixed
    {
        return null;
    }

    public function getMountedTableActionRecordKey(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableBulkAction(): null|string
=======
    public function getMountedTableBulkAction(): ?string
>>>>>>> c7fd73eb (.)
    {
        return null;
    }

    public function getMountedTableBulkActionForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getActiveTableLocale(): null|string
=======
    public function getActiveTableLocale(): ?string
>>>>>>> c7fd73eb (.)
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
    public function deselectAllTableRecords(): void
    {
    }

    public function mountTableAction(): void
    {
    }

    public function mountTableBulkAction(): void
    {
    }
=======
    public function deselectAllTableRecords(): void {}

    public function mountTableAction(): void {}

    public function mountTableBulkAction(): void {}
>>>>>>> c7fd73eb (.)

    public function mountedTableActionRecord(): mixed
    {
        return null;
    }

<<<<<<< HEAD
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
=======
    public function replaceMountedTableAction(): void {}

    public function replaceMountedTableBulkAction(): void {}

    public function resetTableSearch(): void {}

    public function resetTableColumnSearch(): void {}

    public function toggleTableReordering(): void {}
>>>>>>> c7fd73eb (.)

    public function parseTableFilterName(): string
    {
        return '';
    }

    public function makeFilamentTranslatableContentDriver(): mixed
    {
        return null;
    }
}
