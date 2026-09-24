<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Actions\Query\CreateTableIndexByModelClassColumnsAction;
use Modules\Xot\Models\XotBaseModel;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('xot');

it('creates table index correctly', function (): void {
    Schema::create('test_index_table', function (Blueprint $table): void {
        $table->id();
        $table->string('test_col');
    });

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
});
