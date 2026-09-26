<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Table;
use Mockery;
use Modules\Xot\Filament\Traits\HasXotTable;
use Override;
=======
=======
>>>>>>> 5a14301c (.)
use Override;
use Filament\Tables\Table;
use Mockery;
use Modules\Xot\Filament\Traits\HasXotTable;
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
use Override;
use Filament\Tables\Table;
use Mockery;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> laraxot/develop

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
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> laraxot/develop
        return $mock;
    }

    #[Override]
    public function getTableColumns(): array
    {
        return [];
    }

    public function getTable(): Table
    {
        return Mockery::mock(Table::class);
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTablePage(): ?int
=======
    public function getTablePage(): null|int
>>>>>>> 5a14301c (.)
=======
    public function getTablePage(): null|int
>>>>>>> 5a14301c (.)
=======
    public function getTablePage(): null|int
>>>>>>> laraxot/develop
    {
        return 1;
    }

    public function getTableRecordsPerPage(): int
    {
        return 10;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableSortColumn(): ?string
=======
    public function getTableSortColumn(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getTableSortColumn(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getTableSortColumn(): null|string
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableSortDirection(): ?string
=======
    public function getTableSortDirection(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getTableSortDirection(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getTableSortDirection(): null|string
>>>>>>> laraxot/develop
    {
        return null;
    }

    public function getTableFilters(): array
    {
        return [];
    }

    public function getTableFiltersForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableFilterState(string $_name): ?array
=======
    public function getTableFilterState(string $_name): null|array
>>>>>>> 5a14301c (.)
=======
    public function getTableFilterState(string $_name): null|array
>>>>>>> 5a14301c (.)
=======
    public function getTableFilterState(string $_name): null|array
>>>>>>> laraxot/develop
    {
        return [];
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableGrouping(): ?string
=======
    public function getTableGrouping(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getTableGrouping(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getTableGrouping(): null|string
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableSearchIndicator(): ?string
=======
    public function getTableSearchIndicator(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getTableSearchIndicator(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getTableSearchIndicator(): null|string
>>>>>>> laraxot/develop
    {
        return null;
    }

    public function getTableColumnSearchIndicators(): array
    {
        return [];
    }

    public function getTableColumnToggleForm(): mixed
    {
        return null;
    }

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
<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableAction(): ?string
=======
    public function getMountedTableAction(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getMountedTableAction(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getMountedTableAction(): null|string
>>>>>>> laraxot/develop
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
<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableBulkAction(): ?string
=======
    public function getMountedTableBulkAction(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getMountedTableBulkAction(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getMountedTableBulkAction(): null|string
>>>>>>> laraxot/develop
    {
        return null;
    }

    public function getMountedTableBulkActionForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getActiveTableLocale(): ?string
=======
    public function getActiveTableLocale(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getActiveTableLocale(): null|string
>>>>>>> 5a14301c (.)
=======
    public function getActiveTableLocale(): null|string
>>>>>>> laraxot/develop
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
<<<<<<< HEAD
    public function deselectAllTableRecords(): void {}
=======
    public function deselectAllTableRecords(): void
    {
    }
>>>>>>> laraxot/develop

    public function mountTableAction(): void
    {
    }

<<<<<<< HEAD
    public function mountTableBulkAction(): void {}
=======
=======
>>>>>>> 5a14301c (.)
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
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
    public function mountTableBulkAction(): void
    {
    }
>>>>>>> laraxot/develop

    public function mountedTableActionRecord(): mixed
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function replaceMountedTableAction(): void {}
=======
    public function replaceMountedTableAction(): void
    {
    }
>>>>>>> laraxot/develop

    public function replaceMountedTableBulkAction(): void
    {
    }

    public function resetTableSearch(): void
    {
    }

    public function resetTableColumnSearch(): void
    {
    }

<<<<<<< HEAD
    public function toggleTableReordering(): void {}
=======
=======
>>>>>>> 5a14301c (.)
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
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
    public function toggleTableReordering(): void
    {
    }
>>>>>>> laraxot/develop

    public function parseTableFilterName(): string
    {
        return '';
    }

    public function makeFilamentTranslatableContentDriver(): mixed
    {
        return null;
    }
}
