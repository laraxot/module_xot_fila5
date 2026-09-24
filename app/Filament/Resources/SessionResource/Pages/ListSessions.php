<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\SessionResource\Pages;

<<<<<<< HEAD
=======
use Filament\Tables\Columns\Column;
>>>>>>> laraxot/dev
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\SessionResource;

/**
 * @see SessionResource
 */
class ListSessions extends XotBaseListRecords
{
    protected static string $resource = SessionResource::class;

<<<<<<< HEAD
   
=======
    /**
     * @return array<string, Column>
     */
    protected function defineTableColumns(): array
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

    #[\Override]
    public function getTableColumns(): array
    {
        return $this->defineTableColumns();
    }

    /**
     * @return list<\Filament\Tables\Columns\Layout\Component>
     */
    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->defineTableColumns()),
        ];
    }
>>>>>>> laraxot/dev
}
