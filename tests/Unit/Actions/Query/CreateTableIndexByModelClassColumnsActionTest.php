<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
=======
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\User\Models\User;
>>>>>>> laraxot/dev
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
>>>>>>> laraxot/dev
use Modules\Xot\Actions\Query\CreateTableIndexByModelClassColumnsAction;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
uses(TestCase::class)->group('xot');

it('creates table index correctly', function (): void {
    Schema::create('test_index_table', function (Blueprint $table): void {
<<<<<<< HEAD
=======
uses(TestCase::class);

it('creates table index correctly', function (): void {
    // We use User model for testing as it surely has 'id' and 'email'
    // but we might want to avoid touching production tables.
    // Let's create a temporary table.
    Schema::create('test_index_table', function (Blueprint $table) {
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        $table->id();
        $table->string('test_col');
    });

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    $model = new class extends XotBaseModel
    {
        protected $table = 'test_index_table';
    };

    $action = app(CreateTableIndexByModelClassColumnsAction::class);

    $result = $action->execute($model::class, ['test_col']);
    Assert::assertTrue($result);

    $result2 = $action->execute($model::class, ['test_col']);
    Assert::assertFalse($result2);

    Schema::dropIfExists('test_index_table');
});

it('throws exception for missing table', function (): void {
    $model = new class extends XotBaseModel
    {
        protected $table = 'missing_table';
    };

    $action = app(CreateTableIndexByModelClassColumnsAction::class);

    expect(fn () => $action->execute($model::class, ['id']))->toThrow(\Throwable::class);
<<<<<<< HEAD
=======
    $modelClass = new class extends XotBaseModel
    {
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
    $modelClass = new class extends XotBaseModel
    {
        protected $table = 'missing_table';
    };
    $modelClassName = get_class($modelClass);

    $action = app(CreateTableIndexByModelClassColumnsAction::class);
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
});
