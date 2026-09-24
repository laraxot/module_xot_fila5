<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Number;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Models\Log;

class LogsTable extends XotBaseResourceTable
{
    /**
     * @var class-string<Log>
     */
    protected static string $model = Log::class;

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'size' => TextColumn::make('size')
<<<<<<< HEAD
                ->formatStateUsing(static fn (?int $state): ?string => $state === null ? null : Number::fileSize($state))
=======
                ->formatStateUsing(static fn (?int $state): ?string => null === $state ? null : Number::fileSize($state))
>>>>>>> laraxot/dev
                ->placeholder('—')
                ->sortable(),
        ];
    }
}
