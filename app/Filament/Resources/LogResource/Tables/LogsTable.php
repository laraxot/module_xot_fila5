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
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

class LogsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<Log>
     */
    protected static string $model = Log::class;

    /**
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
<<<<<<< HEAD
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'size' => TextColumn::make('size')
                ->formatStateUsing(static fn (?int $state): ?string => $state === null ? null : Number::fileSize($state))
                ->placeholder('—')
                ->sortable(),
=======
        /*
         * @return array<int|string, \Filament\Tables\Columns\Column>
         */
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        ];
    }
}
