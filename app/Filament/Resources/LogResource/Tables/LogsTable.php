<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Illuminate\Support\Number;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Models\Log;
=======
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
use Illuminate\Support\Number;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Models\Log;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

class LogsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<Log>
     */
    protected static string $model = Log::class;

    /**
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        /*
         * @return array<int|string, \Filament\Tables\Columns\Column>
         */
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
=======
>>>>>>> laraxot/dev
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'size' => TextColumn::make('size')
                ->formatStateUsing(static fn (?int $state): ?string => $state === null ? null : Number::fileSize($state))
                ->placeholder('—')
                ->sortable(),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
