<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
=======
use Filament\Resources\RelationManagers\RelationManager;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\ExtraResource\Pages\CreateExtra;
use Modules\Xot\Filament\Resources\ExtraResource\Pages\EditExtra;
use Modules\Xot\Filament\Resources\ExtraResource\Pages\ListExtras;
use Modules\Xot\Models\Extra;

class ExtraResource extends XotBaseResource
{
    protected static ?string $model = Extra::class;

    /**
<<<<<<< HEAD
     * Get the form schema for the resource.
     *
     * @return array<string, Component>
=======
     * @return array<string, class-string<RelationManager>>
>>>>>>> laraxot/dev
     */
    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListExtras::route('/'),
            'create' => CreateExtra::route('/create'),
            'edit' => EditExtra::route('/{record}/edit'),
        ];
    }
}
