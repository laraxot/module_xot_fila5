<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Table;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\TransTrait;
use Webmozart\Assert\Assert;

abstract class XotBaseResourceTable
{
    use HasXotTable {
        getTableHeaderActions as private xotGetTableHeaderActions;
        getGridTableColumns as private xotGetGridTableColumns;
        getTablePaginated as private xotGetTablePaginated;
        getSearchableColumns as private xotSearchableColumns;
    }
    use TransTrait;

    /**
     * @return array<int|string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
     */
    public function getTableHeaderActions(): array
    {
        return $this->xotGetTableHeaderActions();
    }

    /**
     * @return array<int, \Filament\Tables\Columns\Column|\Filament\Tables\Columns\ColumnGroup|\Filament\Tables\Columns\Layout\Component>
     */
    public function getGridTableColumns(): array
    {
        return $this->xotGetGridTableColumns();
    }

    /**
     * @return bool|array<int|string>
     */
    protected function getTablePaginated(): bool|array
    {
        $paginated = $this->xotGetTablePaginated();

        if (is_bool($paginated)) {
            return $paginated;
        }

        /** @var array<int|string> $options */
        $options = $paginated;

        return $options;
    }

    /**
     * @return array<string>
     */
    protected function getSearchableColumns(): array
    {
        /** @var array<string> $columns */
        $columns = $this->xotSearchableColumns();

        return $columns;
    }

    public static function configure(Table $table): Table
    {
        if (self::class === static::class) {
            throw new \LogicException('XotBaseResourceTable::configure() must be called on a concrete table class.');
        }

        $instance = app(static::class);
        Assert::isInstanceOf($instance, self::class);

        return $instance->table($table);
    }

    /**
     * @return array<int|string, Column>
     */
    abstract public function getTableColumns(): array;
}
