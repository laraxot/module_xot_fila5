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
    public function it_returns_order_column_when_model_has_column(): void
    {
        $table = new TestTableWithOrderColumn();

        $this->assertEquals('order_column', $table->getOrderColumn());
    }

    #[Test]
    public function it_returns_null_when_model_missing_order_column(): void
    {
        $table = new TestTableWithoutOrderColumn();

        $this->assertNull($table->getOrderColumn());
    }

    #[Test]
    public function it_allows_override_in_subclass(): void
    {
        $table = new TestTableWithCustomOrderColumn();

        $this->assertEquals('custom_sort', $table->getOrderColumn());
    }

    #[Test]
    public function it_checks_column_existence_via_schema(): void
    {
        $table = new TestTableWithOrderColumn();

        $this->assertTrue($table->hasOrderableColumn('order_column'));
        $this->assertFalse($table->hasOrderableColumn('nonexistent_column'));
    }

    #[Test]
    public function it_auto_enables_reorderable_when_column_exists(): void
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
    public function it_skips_reorderable_when_column_missing(): void
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
