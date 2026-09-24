<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

<<<<<<< .merge_file_4zMxN1
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
>>>>>>> laraxot/dev
=======
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_wZq50b
use Modules\Xot\Filament\Resources\CacheResource\Pages\CreateCache;
use Modules\Xot\Filament\Resources\CacheResource\Pages\EditCache;
use Modules\Xot\Filament\Resources\CacheResource\Pages\ListCaches;
use Modules\Xot\Models\Cache;

class CacheResource extends XotBaseResource
{
    protected static ?string $model = Cache::class;

<<<<<<< .merge_file_4zMxN1
<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function getFormSchemaOld(): array
=======
    #[\Override]
    public static function getFormSchema(): array
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return [
            'key' => TextInput::make('key')->required()->maxLength(255),
            'expiration' => TextInput::make('expiration')->required()->numeric(),
            'value' => KeyValue::make('value')->columnSpanFull(),
        ];
    }

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_wZq50b
    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListCaches::route('/'),
            'create' => CreateCache::route('/create'),
            'edit' => EditCache::route('/{record}/edit'),
        ];
    }
}
