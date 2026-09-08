<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

<<<<<<< HEAD
use Filament\Support\Components\Component;
use Override;
use Modules\Xot\Filament\Resources\CacheResource\Pages\ListCaches;
use Modules\Xot\Filament\Resources\CacheResource\Pages\CreateCache;
use Modules\Xot\Filament\Resources\CacheResource\Pages\EditCache;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\CacheResource\Pages;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Modules\Xot\Filament\Resources\CacheResource\Pages\CreateCache;
use Modules\Xot\Filament\Resources\CacheResource\Pages\EditCache;
use Modules\Xot\Filament\Resources\CacheResource\Pages\ListCaches;
>>>>>>> c7fd73eb (.)
use Modules\Xot\Models\Cache;

class CacheResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static null|string $model = Cache::class;

    /**
     * @return array<int, Component>
     */
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            TextInput::make('key')->required()->maxLength(255),
            TextInput::make('expiration')->required()->numeric(),
            KeyValue::make('value')->columnSpanFull(),
        ];
    }

    #[Override]
=======
    protected static ?string $model = Cache::class;

    #[\Override]
>>>>>>> c7fd73eb (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> c7fd73eb (.)
    public static function getPages(): array
    {
        return [
            'index' => ListCaches::route('/'),
            'create' => CreateCache::route('/create'),
            'edit' => EditCache::route('/{record}/edit'),
        ];
    }
}
