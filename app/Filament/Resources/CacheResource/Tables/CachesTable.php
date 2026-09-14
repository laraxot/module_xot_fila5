<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheResource\Tables;

<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class CachesTable extends XotBaseResourceTable
{
    public function getTableColumns(): array
    {
        /*
         * @return array<int|string, \Filament\Tables\Columns\Column>
         */
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime(),
            'updated_at' => TextColumn::make('updated_at')->dateTime(),
=======
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Carbon;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Models\Cache;

class CachesTable extends XotBaseResourceTable
{
    /**
     * @var class-string<Cache>
     */
    protected static string $model = Cache::class;

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'key' => TextColumn::make('key')->searchable()->sortable()->wrap(),
            'expiration' => TextColumn::make('expiration')
                ->since()
                ->dateTimeTooltip()
                ->badge()
                ->color(static fn (int $state): string => Carbon::createFromTimestamp($state)->isPast() ? 'danger' : 'success')
                ->sortable(),
>>>>>>> laraxot/dev
        ];
    }
}
