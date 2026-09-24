<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 3792da0d (Check & fix styling)
use Filament\Tables\Table;
use Mockery\MockInterface;
use Modules\Xot\Tests\TestCase;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use Modules\Xot\Tests\Unit\Support\HasTableWithoutOptionalMethodsTestClass;
use Modules\Xot\Tests\Unit\Support\HasTableWithXotTestClass;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/**
<<<<<<< .merge_file_DGxbam
<<<<<<< HEAD
 * <<<<<<< HEAD.
 *
 * @param MockInterface&Table $tableMock
 *                                       =======
 * @param MockInterface&Table $tableMock
 *
 * >>>>>>> laraxot/dev
=======
 * @param MockInterface&Table $tableMock
>>>>>>> 3792da0d (Check & fix styling)
 *
=======
 * @param  MockInterface&Table  $tableMock
>>>>>>> .merge_file_jSUFZ7
 * @return MockInterface&Table
 */
function stubTableChain(MockInterface $tableMock): MockInterface
{
    $chainMethods = [
        'recordTitleAttribute',
        'heading',
        'columns',
        'contentGrid',
        'filters',
        'filtersLayout',
        'filtersFormColumns',
<<<<<<< HEAD
        'deferFilters',
=======
>>>>>>> 3792da0d (Check & fix styling)
        'persistFiltersInSession',
        'headerActions',
        'actions',
        'bulkActions',
        'actionsPosition',
        'recordActions',
        'toolbarActions',
        'recordActionsPosition',
        'emptyStateActions',
        'striped',
        'paginated',
        'defaultSort',
        'poll',
    ];

    $allows = [];
    foreach ($chainMethods as $method) {
        $allows[$method] = $tableMock;
    }

    $tableMock->allows($allows);

    return $tableMock;
}

afterEach(function (): void {
    Mockery::close();
});

it('tests table method with all methods implemented', function (): void {
    Mockery::mock('overload:Modules\\Xot\\Actions\\Model\\TableExistsByModelClassActions')
        ->allows(['execute' => true]);

    /** @var HasTableWithXotTestClass&MockInterface $mock */
    $mock = Mockery::mock(HasTableWithXotTestClass::class)
        ->makePartial()
<<<<<<< HEAD
        ->shouldAllowMockingProtectedMethods();
=======
        ->shouldAllowMockingProtectedMethods()
        ->shouldDeferMissing();
>>>>>>> 3792da0d (Check & fix styling)
    $mock->allows([
        'getTableHeaderActions' => [],
        'getTableActions' => [],
        'getTableBulkActions' => [],
        'getModelClass' => DummyTestModel::class,
        'getTableRecordTitleAttribute' => 'name',
        'getTableHeading' => 'Test Table',
        'getTableFilters' => [],
        'getTableFiltersFormColumns' => 1,
        'getTableEmptyStateActions' => [],
        'getDefaultTableSortColumn' => null,
        'getDefaultTableSortDirection' => null,
        'getTablePollInterval' => null,
    ]);

    /** @var MockInterface&Table $tableMock */
    $tableMock = Mockery::mock(Table::class);
    stubTableChain($tableMock);

    $result = $mock->table($tableMock);

    Assert::assertSame($tableMock, $result);
});

it('tests table method with no optional methods implemented', function (): void {
    Mockery::mock('overload:Modules\\Xot\\Actions\\Model\\TableExistsByModelClassActions')
        ->allows(['execute' => true]);

    /** @var HasTableWithoutOptionalMethodsTestClass&MockInterface $mock */
    $mock = Mockery::mock(HasTableWithoutOptionalMethodsTestClass::class)
        ->makePartial()
<<<<<<< HEAD
        ->shouldAllowMockingProtectedMethods();
=======
        ->shouldAllowMockingProtectedMethods()
        ->shouldDeferMissing();
>>>>>>> 3792da0d (Check & fix styling)
    $mock->allows([
        'getModelClass' => DummyTestModel::class,
        'getTableRecordTitleAttribute' => 'name',
        'getTableHeading' => 'Test Table',
        'getTableFilters' => [],
        'getTableHeaderActions' => [],
        'getTableActions' => [],
        'getTableBulkActions' => [],
        'getTableFiltersFormColumns' => 1,
        'getTableEmptyStateActions' => [],
        'getDefaultTableSortColumn' => null,
        'getDefaultTableSortDirection' => null,
        'getTablePollInterval' => null,
    ]);

    /** @var MockInterface&Table $tableMock */
    $tableMock = Mockery::mock(Table::class);
    stubTableChain($tableMock);

    $result = $mock->table($tableMock);

    Assert::assertSame($tableMock, $result);
});
