<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheLockResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> 3792da0d (Check & fix styling)
use Modules\Xot\Filament\Resources\CacheLockResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCacheLocks extends XotBaseListRecords
{
    protected static string $resource = CacheLockResource::class;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'key' => TextColumn::make('key')
                ->searchable()
                ->sortable()
                ->wrap(),
            'owner' => TextColumn::make('owner')
                ->searchable()
                ->sortable()
                ->wrap(),
            'expiration' => TextColumn::make('expiration')->numeric()->sortable(),
        ];
    }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
}
