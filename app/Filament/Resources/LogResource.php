<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

<<<<<<< HEAD
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Components\Component;
<<<<<<< .merge_file_3AzJ40
=======
use Filament\Schemas\Components\Component;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
=======
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Components\Component;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_KuKQLt
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Modules\Xot\Filament\Infolists\Components\FileContentEntry;
use Modules\Xot\Filament\Resources\LogResource\Pages\CreateLog;
use Modules\Xot\Filament\Resources\LogResource\Pages\ListLogs;
use Modules\Xot\Filament\Resources\LogResource\Pages\ViewLog;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Modules\Xot\Models\Log;

class LogResource extends XotBaseResource
{
    use NavigationLabelTrait;

    protected static ?string $model = Log::class;

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
    public function getInfolistSchema(): array
=======
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'path' => TextInput::make('path')->required()->maxLength(255),
            'content' => Textarea::make('content')->columnSpanFull(),
        ];
    }

    public static function getInfolistSchema(): array
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    {
        return [
            'name' => TextEntry::make('name')->columnSpanFull(),
            /*
             * Infolists\Components\TextEntry::make('email')
             * ->columnSpanFull(),
             *
             * Infolists\Components\TextEntry::make('message')
             * ->formatStateUsing(static fn ($state) => new HtmlString(nl2br($state)))
             * ->columnSpanFull(),
             */
            'file-content' => FileContentEntry::make('file-content'),
            /*
             * RepeatableEntry::make('lines')
             * ->schema([
             * TextEntry::make('txt'),
             * ])
             */
        ];
    }

<<<<<<< .merge_file_3AzJ40
<<<<<<< HEAD
<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> laraxot/dev
=======
    #[\Override]
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_KuKQLt
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< .merge_file_3AzJ40
<<<<<<< HEAD
<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> laraxot/dev
=======
    #[\Override]
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_KuKQLt
    public static function getPages(): array
    {
        return [
            'index' => ListLogs::route('/'),
            'create' => CreateLog::route('/create'),
            // 'edit' => Pages\EditLog::route('/{record}/edit'),
            'view' => ViewLog::route('/{record}'),
        ];
    }
}
