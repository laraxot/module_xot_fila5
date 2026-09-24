<?php

declare(strict_types=1);
<<<<<<< .merge_file_nWV8lI
<<<<<<< HEAD
<<<<<<< HEAD
=======

<<<<<<< HEAD
uses(TestCase::class);
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_bVeUA0
=======
=======
uses(Modules\Xot\Tests\TestCase::class);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\User\Models\User;
use Modules\Xot\Actions\Query\CreateTableIndexByModelClassColumnsAction;
use Modules\Xot\Models\XotBaseModel;
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
it('creates table index correctly', function (): void {
    // We use User model for testing as it surely has 'id' and 'email'
    // but we might want to avoid touching production tables.
    // Let's create a temporary table.
    Schema::create('test_index_table', function (Blueprint $table) {
        $table->id();
        $table->string('test_col');
    });

<<<<<<< .merge_file_nWV8lI
<<<<<<< HEAD
<<<<<<< HEAD
    $modelClass = new class extends XotBaseModel
    {
=======
    $modelClass = new class extends XotBaseModel {
>>>>>>> laraxot/dev
=======
    $modelClass = new class extends XotBaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $modelClass = new class extends XotBaseModel
    {
>>>>>>> .merge_file_bVeUA0
        protected $table = 'test_index_table';
    };
    $modelClassName = get_class($modelClass);

    $action = app(CreateTableIndexByModelClassColumnsAction::class);

    // First creation
    $result = $action->execute($modelClassName, ['test_col']);
    Assert::assertTrue($result);
    // Duplicate creation should skip
    $result2 = $action->execute($modelClassName, ['test_col']);
    Assert::assertFalse($result2);
    Schema::dropIfExists('test_index_table');
});

it('throws exception for invalid model class', function (): void {
    $action = app(CreateTableIndexByModelClassColumnsAction::class);
});

it('throws exception for missing table', function (): void {
<<<<<<< .merge_file_nWV8lI
<<<<<<< HEAD
<<<<<<< HEAD
    $modelClass = new class extends XotBaseModel
    {
=======
    $modelClass = new class extends XotBaseModel {
>>>>>>> laraxot/dev
=======
    $modelClass = new class extends XotBaseModel {
>>>>>>> 3792da0d (Check & fix styling)
=======
    $modelClass = new class extends XotBaseModel
    {
>>>>>>> .merge_file_bVeUA0
        protected $table = 'missing_table';
    };
    $modelClassName = get_class($modelClass);

    $action = app(CreateTableIndexByModelClassColumnsAction::class);
});
