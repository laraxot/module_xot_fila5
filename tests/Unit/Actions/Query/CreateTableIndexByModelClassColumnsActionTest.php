<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\User\Models\User;
use Modules\Xot\Actions\Query\CreateTableIndexByModelClassColumnsAction;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('creates table index correctly', function (): void {
    // We use User model for testing as it surely has 'id' and 'email'
    // but we might want to avoid touching production tables.
    // Let's create a temporary table.
    Schema::create('test_index_table', function (Blueprint $table) {
        $table->id();
        $table->string('test_col');
    });

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

    // `execute()` e' tipizzato class-string<Model>: la guardia runtime si prova passando
    // una classe non-Model via reflection, senza violare il contratto statico.
    $execute = new ReflectionMethod($action, 'execute');

    expect(fn (): mixed => $execute->invoke($action, \stdClass::class, ['id']))
        ->toThrow(\InvalidArgumentException::class, 'must be a subclass of');
});

it('throws exception for missing table', function (): void {
    $modelClass = new class extends XotBaseModel
    {
        protected $table = 'missing_table';
    };
    $modelClassName = get_class($modelClass);

    $action = app(CreateTableIndexByModelClassColumnsAction::class);

    expect(fn (): bool => $action->execute($modelClassName, ['id']))
        ->toThrow(\RuntimeException::class, "Table 'missing_table' does not exist");
});
