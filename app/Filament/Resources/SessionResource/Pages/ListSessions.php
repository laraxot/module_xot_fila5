<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\SessionResource\Pages;

<<<<<<< .merge_file_pkC10T
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_6ldPkF
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\SessionResource;

/**
 * @see SessionResource
 */
class ListSessions extends XotBaseListRecords
{
    protected static string $resource = SessionResource::class;
<<<<<<< .merge_file_pkC10T
<<<<<<< HEAD
<<<<<<< HEAD
=======

<<<<<<< HEAD
=======

    #[\Override]
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
=======
    /**
     * @return array<int, Stack>
     */
    #[\Override]
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getTableColumns()),
        ];
    }

<<<<<<< HEAD
    #[\Override]
=======
    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    #[\Override]
    /**
     * @return array<string, mixed>
     */
>>>>>>> 930f8146 (Check & fix styling)
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable()->label('ID'),
            'user_id' => TextColumn::make('user_id')
                ->sortable()
                ->searchable()
                ->label('User ID'),
            'ip_address' => TextColumn::make('ip_address')->searchable()->label('IP Address'),
            'user_agent' => TextColumn::make('user_agent')
                ->searchable()
                ->wrap()
                ->label('User Agent'),
            'payload' => TextColumn::make('payload')
                ->searchable()
                ->wrap()
                ->label('Payload'),
            'last_activity' => TextColumn::make('last_activity')
                ->dateTime()
                ->sortable()
                ->label('Last Activity'),
        ];
    }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_6ldPkF
}
