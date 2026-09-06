<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Models\User;
>>>>>>> 7f6cf6be (.)
use Modules\Xot\Actions\Query\CreateTableIndexByModelClassColumnsAction;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Xot\Tests\TestCase::class);
>>>>>>> 7f6cf6be (.)

it('creates table index correctly', function (): void {
    // We use User model for testing as it surely has 'id' and 'email'
    // but we might want to avoid touching production tables.
    // Let's create a temporary table.
    Schema::create('test_index_table', function (Blueprint $table) {
        $table->id();
        $table->string('test_col');
    });

<<<<<<< HEAD
    $modelClass = new class extends XotBaseModel
    {
=======
    $modelClass = new class extends XotBaseModel {
>>>>>>> 7f6cf6be (.)
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
<<<<<<< HEAD
    $modelClass = new class extends XotBaseModel
    {
=======
    $modelClass = new class extends XotBaseModel {
>>>>>>> 7f6cf6be (.)
        protected $table = 'missing_table';
    };
    $modelClassName = get_class($modelClass);

    $action = app(CreateTableIndexByModelClassColumnsAction::class);
});
