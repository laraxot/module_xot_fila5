<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Support;

use Mockery;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Schema;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Filters\Indicator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Filament\Actions\Action;
use Filament\Support\Contracts\TranslatableContentDriver;
=======
use Override;
>>>>>>> 5a14301c (.)
=======
use Override;
>>>>>>> 5a14301c (.)
=======
use Override;
>>>>>>> laraxot/develop
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * Test class that uses HasTable and HasXotTable traits for testing.
 */
class HasTableWithXotTestClass implements HasTable
{
    use HasXotTable;

    public function getLayoutView(): mixed
    {
        $mock = Mockery::mock();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $mock->allows([
            'getTableColumns' => [],
            'getTableContentGrid' => [],
        ]);

        return $mock;
    }

=======
=======
>>>>>>> 5a14301c (.)
        $mock->shouldReceive('getTableColumns')->andReturn([]);
        $mock->shouldReceive('getTableContentGrid')->andReturn([]);
        return $mock;
    }

    #[Override]
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
        $mock->shouldReceive('getTableColumns')->andReturn([]);
        $mock->shouldReceive('getTableContentGrid')->andReturn([]);
        return $mock;
    }

    #[Override]
>>>>>>> laraxot/develop
    public function getTableColumns(): array
    {
        return [];
    }

    public function getTable(): Table
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var Table */
        return Mockery::mock(Table::class);
    }

    public function getTablePage(): int|string
=======
=======
>>>>>>> 5a14301c (.)
        return Mockery::mock(Table::class);
    }

    public function getTablePage(): null|int
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
        return Mockery::mock(Table::class);
    }

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
    public function getSelectedTableRecordsQuery(bool $shouldFetchSelectedRecords = true, ?int $chunkSize = 500): Builder
    {
        return Model::query();
    }

    public function getTableFilterFormState(string $name): array
    {
        return [];
    }

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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableFiltersForm(): Schema
    {
        /** @var Schema */
        return Mockery::mock(Schema::class);
    }

    public function getTableFilterState(string $name): ?array
    {
        return [];
    }

    public function getTableGrouping(): ?Group
=======
    public function getTableFiltersForm(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getTableFiltersForm(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getTableFiltersForm(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableSearchIndicator(): Indicator
    {
        /** @var Indicator */
        return Mockery::mock(Indicator::class);
=======
=======
>>>>>>> 5a14301c (.)
    public function getTableFilterState(string $name): null|array
    {
=======
    public function getTableFilterState(string $name): null|array
    {
>>>>>>> laraxot/develop
        return [];
    }

    public function getTableGrouping(): null|string
    {
        return null;
    }

    public function getTableSearchIndicator(): null|string
    {
        return null;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> laraxot/develop
    }

    public function getTableColumnSearchIndicators(): array
    {
        return [];
    }

    public function getTableColumnToggleForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableRecords(): Collection|Paginator|CursorPaginator
    {
        return new Collection;
    }

    public function getTableRecord(mixed $key): array|Model|null
=======
=======
>>>>>>> 5a14301c (.)
    public function getTableRecords(): array
    {
        return [];
    }

    public function getTableRecord(): mixed
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
    public function getTableRecords(): array
    {
        return [];
    }

    public function getTableRecord(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableRecordKey(Model|array $record): string
=======
    public function getTableRecordKey(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

    public function getSelectedTableRecords(bool $shouldFetchSelectedRecords = true): Collection
    {
<<<<<<< HEAD
        return new Collection;
=======
=======
>>>>>>> 5a14301c (.)
    public function getTableRecordKey(): mixed
    {
        return null;
    }

    public function getSelectedTableRecords(bool $shouldFetchSelectedRecords = true): Collection
    {
        return new Collection();
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
        return new Collection();
>>>>>>> laraxot/develop
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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableQueryForExport(): Builder
    {
        return Model::query();
    }

    public function getFilteredTableQuery(): ?Builder
=======
    public function getTableQueryForExport(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getTableQueryForExport(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getTableQueryForExport(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getFilteredSortedTableQuery(): ?Builder
=======
    public function getFilteredTableQuery(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getFilteredTableQuery(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getFilteredTableQuery(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getAllTableSummaryQuery(): ?Builder
=======
    public function getFilteredSortedTableQuery(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getFilteredSortedTableQuery(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getFilteredSortedTableQuery(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getPageTableSummaryQuery(): ?Builder
=======
    public function getAllTableSummaryQuery(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getAllTableSummaryQuery(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getAllTableSummaryQuery(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableAction(): ?Action
=======
    public function getPageTableSummaryQuery(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getPageTableSummaryQuery(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getPageTableSummaryQuery(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableActionForm(): ?Schema
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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableActionRecord(): ?Model
=======
=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> laraxot/develop
    public function getMountedTableActionForm(): mixed
    {
        return null;
    }

    public function getMountedTableActionRecord(): mixed
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> laraxot/develop
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
    public function getMountedTableBulkAction(): ?Action
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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getMountedTableBulkActionForm(): ?Schema
=======
    public function getMountedTableBulkActionForm(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getMountedTableBulkActionForm(): mixed
>>>>>>> 5a14301c (.)
=======
    public function getMountedTableBulkActionForm(): mixed
>>>>>>> laraxot/develop
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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function isTableColumnToggledHidden(string $name): bool
=======
    public function isTableColumnToggledHidden(): bool
>>>>>>> 5a14301c (.)
=======
    public function isTableColumnToggledHidden(): bool
>>>>>>> 5a14301c (.)
=======
    public function isTableColumnToggledHidden(): bool
>>>>>>> laraxot/develop
    {
        return false;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function callMountedTableAction(mixed $arguments = []): mixed
=======
    public function callMountedTableAction(): mixed
>>>>>>> 5a14301c (.)
=======
    public function callMountedTableAction(): mixed
>>>>>>> 5a14301c (.)
=======
    public function callMountedTableAction(): mixed
>>>>>>> laraxot/develop
    {
        return null;
    }

    public function callTableColumnAction(string $name, string $recordKey): mixed
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
    public function mountTableBulkAction(string $name, mixed $selectedRecords = []): void {}
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
    public function replaceMountedTableAction(string $name, mixed $record = null, mixed $arguments = []): void {}

    public function replaceMountedTableBulkAction(string $name, mixed $selectedRecords = []): void {}

    public function resetTableSearch(): void {}

    public function resetTableColumnSearch(string $column): void {}

    public function toggleTableReordering(): void {}

    public function parseTableFilterName(string $name): string
=======
    public function replaceMountedTableAction(): void
>>>>>>> laraxot/develop
    {
    }

<<<<<<< HEAD
    public function makeFilamentTranslatableContentDriver(): ?TranslatableContentDriver
=======
=======
>>>>>>> 5a14301c (.)
    public function replaceMountedTableAction(): void
    {
    }

=======
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

    public function toggleTableReordering(): void
    {
    }

    public function parseTableFilterName(): string
    {
        return '';
    }

    public function makeFilamentTranslatableContentDriver(): mixed
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> laraxot/develop
    {
        return null;
    }
}
