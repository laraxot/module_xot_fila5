<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature\Filament\Traits;

use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HasXotTableReorderingTest extends TestCase
{
    #[Test]
    public function itReturnsOrderColumnWhenModelHasColumn(): void
    {
        $table = new TestTableWithOrderColumn();

        $this->assertEquals('order_column', $table->getOrderColumn());
    }

    #[Test]
    public function itReturnsNullWhenModelMissingOrderColumn(): void
    {
        $table = new TestTableWithoutOrderColumn();

        $this->assertNull($table->getOrderColumn());
    }

    #[Test]
    public function itAllowsOverrideInSubclass(): void
    {
        $table = new TestTableWithCustomOrderColumn();

        $this->assertEquals('custom_sort', $table->getOrderColumn());
    }

    #[Test]
    public function itChecksColumnExistenceViaSchema(): void
    {
        $table = new TestTableWithOrderColumn();

        $this->assertTrue($table->hasOrderableColumn('order_column'));
        $this->assertFalse($table->hasOrderableColumn('nonexistent_column'));
    }

    #[Test]
    public function itAutoEnablesReorderableWhenColumnExists(): void
    {
        $table = new TestTableWithOrderColumn();
        $filamentTable = \Mockery::mock(Table::class);
        $filamentTable->shouldReceive('reorderable')
            ->with('order_column')
            ->once()
            ->andReturnSelf();

        $table->applyReorderable($filamentTable);
    }

    #[Test]
    public function itSkipsReorderableWhenColumnMissing(): void
    {
        $table = new TestTableWithoutOrderColumn();
        $filamentTable = \Mockery::mock(Table::class);
        $filamentTable->shouldNotReceive('reorderable');

        $table->applyReorderable($filamentTable);
    }
}

// Test doubles
class TestTableWithOrderColumn extends XotBaseResourceTable
{
    public function getModelClass(): string
    {
        return TestModelWithOrderColumn::class;
    }
}

class TestTableWithoutOrderColumn extends XotBaseResourceTable
{
    public function getModelClass(): string
    {
        return TestModelWithoutOrderColumn::class;
    }
}

class TestTableWithCustomOrderColumn extends XotBaseResourceTable
{
    public function getModelClass(): string
    {
        return TestModelWithOrderColumn::class;
    }

    protected function getOrderColumn(): ?string
    {
        return 'custom_sort';
    }
}

class TestModelWithOrderColumn extends Model
{
    protected $table = 'test_models_with_order';
    protected $fillable = ['name', 'order_column'];
}

class TestModelWithoutOrderColumn extends Model
{
    protected $table = 'test_models_without_order';
    protected $fillable = ['name'];
}
