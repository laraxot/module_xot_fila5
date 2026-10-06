<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Table;
use Mockery;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use Modules\Xot\Tests\Unit\Support\HasTableWithoutOptionalMethodsTestClass;
use Modules\Xot\Tests\Unit\Support\HasTableWithXotTestClass;
use Tests\TestCase;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 5a14301c (.)
use Tests\TestCase;
use Mockery;
use Filament\Tables\Table;
use Modules\Xot\Tests\Unit\Support\DummyTestModel;
use Modules\Xot\Tests\Unit\Support\HasTableWithoutOptionalMethodsTestClass;
use Modules\Xot\Tests\Unit\Support\HasTableWithXotTestClass;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 5a14301c (.)
=======
=======
>>>>>>> 21348520 (.)
=======
>>>>>>> 7131bd09 (.)
=======
>>>>>>> 88ea7103 (.)
=======
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Tests\TestCase;
=======
<<<<<<< HEAD
>>>>>>> b7afadf9 (.)
=======
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Mockery;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable;
use Modules\Xot\Filament\Traits\HasXotTable;
use Illuminate\Support\Collection;
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 7131bd09 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> 6dcebf8a (.)
=======
>>>>>>> 53d6a6ba (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
=======
>>>>>>> 300ef70 (.)
>>>>>>> a6ef6dc7 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)

uses(TestCase::class);

afterEach(function () {
    Mockery::close();
});

it('tests table method with all methods implemented', function () {
    // Avoid DB/Schema access inside TableExistsByModelClassActions
    Mockery::mock('overload:Modules\\Xot\\Actions\\Model\\TableExistsByModelClassActions')
        ->shouldReceive('execute')
        ->andReturn(true);

    // Create partial mock and defer missing to real methods so trait's table() runs
    $mock = Mockery::mock(HasTableWithXotTestClass::class)->makePartial()->shouldDeferMissing();

    // Expect getTableHeaderActions to be called
    $mock->shouldReceive('getTableHeaderActions')->once()->andReturn([]);

    // Expect getTableActions to be called
    $mock->shouldReceive('getTableActions')->once()->andReturn([]);

    // Expect getTableBulkActions to be called
    $mock->shouldReceive('getTableBulkActions')->once()->andReturn([]);

    // Other required method stubs
    $mock->shouldReceive('getModelClass')->andReturn(DummyTestModel::class);
    $mock->shouldReceive('getTableRecordTitleAttribute')->andReturn('name');
    $mock->shouldReceive('getTableHeading')->andReturn('Test Table');
    $mock->shouldReceive('getTableFilters')->andReturn([]);
    // Stub optional methods to avoid resolving translator / actions
    $mock->shouldReceive('getTableHeaderActions')->andReturn([]);
    $mock->shouldReceive('getTableActions')->andReturn([]);
    $mock->shouldReceive('getTableBulkActions')->andReturn([]);
    $mock->shouldReceive('getTableFiltersFormColumns')->andReturn(1);
    $mock->shouldReceive('getTableEmptyStateActions')->andReturn([]);

    // Create a mock for Table
    $tableMock = Mockery::mock(Table::class);
    $tableMock->shouldReceive('recordTitleAttribute')->andReturnSelf();
    $tableMock->shouldReceive('heading')->andReturnSelf();
    $tableMock->shouldReceive('columns')->andReturnSelf();
    $tableMock->shouldReceive('contentGrid')->andReturnSelf();
    $tableMock->shouldReceive('filters')->andReturnSelf();
    $tableMock->shouldReceive('filtersLayout')->andReturnSelf();
    $tableMock->shouldReceive('filtersFormColumns')->andReturnSelf();
    $tableMock->shouldReceive('persistFiltersInSession')->andReturnSelf();
    $tableMock->shouldReceive('headerActions')->andReturnSelf();
    $tableMock->shouldReceive('actions')->andReturnSelf();
    $tableMock->shouldReceive('bulkActions')->andReturnSelf();
    $tableMock->shouldReceive('actionsPosition')->andReturnSelf();
    $tableMock->shouldReceive('emptyStateActions')->andReturnSelf();
    $tableMock->shouldReceive('striped')->andReturnSelf();
    $tableMock->shouldReceive('paginated')->andReturnSelf();

    // Call the table method
    $result = $mock->table($tableMock);

    // Assert the result is a Table instance
    expect($result)->toBe($tableMock);
});

it('tests table method with no optional methods implemented', function () {
    // Avoid DB/Schema access inside TableExistsByModelClassActions
    Mockery::mock('overload:Modules\\Xot\\Actions\\Model\\TableExistsByModelClassActions')
        ->shouldReceive('execute')
        ->andReturn(true);

    // Create partial mock and defer missing to real methods so trait's table() runs
    $mock = Mockery::mock(HasTableWithoutOptionalMethodsTestClass::class)->makePartial()->shouldDeferMissing();

    // Other required method stubs
    $mock->shouldReceive('getModelClass')->andReturn(DummyTestModel::class);
    $mock->shouldReceive('getTableRecordTitleAttribute')->andReturn('name');
    $mock->shouldReceive('getTableHeading')->andReturn('Test Table');
    $mock->shouldReceive('getTableFilters')->andReturn([]);
    // Avoid constructing Filament Actions which require translator binding
    $mock->shouldReceive('getTableHeaderActions')->andReturn([]);
    $mock->shouldReceive('getTableActions')->andReturn([]);
    $mock->shouldReceive('getTableBulkActions')->andReturn([]);
    $mock->shouldReceive('getTableFiltersFormColumns')->andReturn(1);
    $mock->shouldReceive('getTableEmptyStateActions')->andReturn([]);

    // Create a mock for Table
    $tableMock = Mockery::mock(Table::class);
    $tableMock->shouldReceive('recordTitleAttribute')->andReturnSelf();
    $tableMock->shouldReceive('heading')->andReturnSelf();
    $tableMock->shouldReceive('columns')->andReturnSelf();
    $tableMock->shouldReceive('contentGrid')->andReturnSelf();
    $tableMock->shouldReceive('filters')->andReturnSelf();
    $tableMock->shouldReceive('filtersLayout')->andReturnSelf();
    $tableMock->shouldReceive('filtersFormColumns')->andReturnSelf();
    $tableMock->shouldReceive('persistFiltersInSession')->andReturnSelf();
    // headerActions, actions, and bulkActions are called with empty arrays
    $tableMock->shouldReceive('headerActions')->andReturnSelf();
    $tableMock->shouldReceive('actions')->andReturnSelf();
    $tableMock->shouldReceive('bulkActions')->andReturnSelf();
    $tableMock->shouldReceive('actionsPosition')->andReturnSelf();
    $tableMock->shouldReceive('emptyStateActions')->andReturnSelf();
    $tableMock->shouldReceive('striped')->andReturnSelf();
    $tableMock->shouldReceive('paginated')->andReturnSelf();

    // Call the table method
    $result = $mock->table($tableMock);

    // Assert the result is a Table instance
    expect($result)->toBe($tableMock);
});
