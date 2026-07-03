<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Tables;

use Filament\Tables\Table;
use Modules\Xot\Filament\Traits\HasXotTable;

abstract class XotBaseResourceTable
{
    use HasXotTable;

    public function configure(Table $table): Table
    {
        return $this->table($table);
    }

    /**
     * @return array<int|string, \Filament\Tables\Columns\Column>
     */
    abstract public function getTableColumns(): array;
}
