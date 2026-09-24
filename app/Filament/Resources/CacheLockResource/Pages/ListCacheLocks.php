<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheLockResource\Pages;

<<<<<<< .merge_file_IBrTc4
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_UBiXtR
use Modules\Xot\Filament\Resources\CacheLockResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCacheLocks extends XotBaseListRecords
{
    protected static string $resource = CacheLockResource::class;
<<<<<<< .merge_file_IBrTc4
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

<<<<<<< HEAD
    #[\Override]
=======
    /**
     * @return array<string, TextColumn>
     */
    #[\Override]
    /**
     * @return array<string, mixed>
     */
>>>>>>> 930f8146 (Check & fix styling)
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
=======
>>>>>>> .merge_file_UBiXtR
}
