<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Mockery;
use Mockery\MockInterface;
=======
// Xot Pest/PHPUnit — claude-audit documentation ratio.
// Xot Pest/PHPUnit — claude-audit documentation ratio.

use Filament\Tables\Table;
use Illuminate\Support\Collection;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * Dummy class that uses HasTable and HasXotTable traits for testing.
 */
class HasTableWithXotTestClass
{
    use HasXotTable;

    public function getLayoutView(): mixed
    {
<<<<<<< HEAD
        $mock = Mockery::mock();
        $mock->shouldReceive('getTableColumns')->andReturn([]);
        $mock->shouldReceive('getTableContentGrid')->andReturn([]);
=======
        /** @var \Mockery\MockInterface&\Mockery\LegacyMockInterface $mock */
        $mock = \Mockery::mock();
        /** @var \Mockery\Expectation $e1 */
        $e1 = $mock->shouldReceive('getTableColumns');
        $e1->andReturn([]);
        /** @var \Mockery\Expectation $e2 */
        $e2 = $mock->shouldReceive('getTableContentGrid');
        $e2->andReturn([]);
>>>>>>> laraxot/dev

        return $mock;
    }

<<<<<<< HEAD
    /**
     * @return array<string, Column|ColumnGroup|Component>
     */
    /** @return array<string, \Filament\Tables\Columns\Column> */
=======
    #[\Override]
>>>>>>> laraxot/dev
    public function getTableColumns(): array
    {
        return [];
    }

    public function getTable(): Table
    {
<<<<<<< HEAD
        /** @var Table&MockInterface $table */
        $table = Mockery::mock(Table::class);

        return $table;
=======
        /** @var Table $mock */
        $mock = \Mockery::mock(Table::class);

        return $mock;
>>>>>>> laraxot/dev
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
    /**
     * @return array<string|int, \Filament\Tables\Filters\BaseFilter>
     */
=======
    /** @return array<mixed> */
>>>>>>> laraxot/dev
    public function getTableFilters(): array
    {
        return [];
    }

    public function getTableFiltersForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    /**
     * @return array<string, mixed>|null
     */
=======
    /** @return array<mixed>|null */
>>>>>>> laraxot/dev
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

<<<<<<< HEAD
    /**
     * @return array<int, mixed>
     */
=======
    /** @return array<mixed> */
>>>>>>> laraxot/dev
    public function getTableColumnSearchIndicators(): array
    {
        return [];
    }

    public function getTableColumnToggleForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    /**
     * @return array<int, mixed>
     */
=======
    /** @return array<mixed> */
>>>>>>> laraxot/dev
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
    /**
     * @return Collection<int, mixed>
     */
    public function getSelectedTableRecords(bool $_shouldFetchSelectedRecords = true): Collection
    {
        return new Collection;
=======
    /** @return Collection<int, mixed> */
    public function getSelectedTableRecords(bool $_shouldFetchSelectedRecords = true): Collection
    {
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

<<<<<<< HEAD
    /**
     * @return array<int, mixed>
     */
=======
    /** @return array<mixed> */
>>>>>>> laraxot/dev
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

    public function getMountedTableAction(): ?string
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

    public function getMountedTableBulkAction(): ?string
    {
        return null;
    }

    public function getMountedTableBulkActionForm(): mixed
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
>>>>>>> laraxot/dev

    public function mountedTableActionRecord(): mixed
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

    public function makeFilamentTranslatableContentDriver(): mixed
    {
        return null;
    }
}
