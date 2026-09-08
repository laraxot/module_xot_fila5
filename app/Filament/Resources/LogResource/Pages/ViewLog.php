<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Pages;

<<<<<<< HEAD
use Filament\Support\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Override;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Modules\Xot\Filament\Resources\LogResource;

use function Safe\json_encode;
=======
use Modules\Xot\Filament\Resources\LogResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
>>>>>>> c7fd73eb (.)

class ViewLog extends XotBaseViewRecord
{
    protected static string $resource = LogResource::class;
<<<<<<< HEAD

    /**
     * @return array<int, Component>
     */
    #[Override]
    protected function getInfolistSchema(): array
    {
        $log = $this->getRecord()->getModel();
        return [
            Section::make('Informazioni Log')->schema([
                Grid::make(['default' => 3])->schema([
                    TextEntry::make('id'),
                    TextEntry::make('message'),
                    TextEntry::make('level'),
                    TextEntry::make('level_name'),
                    TextEntry::make('channel'),
                    TextEntry::make('datetime')->dateTime(),
                    TextEntry::make('context')->formatStateUsing(
                        fn($state) => json_encode($state, JSON_PRETTY_PRINT),
                    ),
                    TextEntry::make('extra')->formatStateUsing(
                        fn($state) => json_encode($state, JSON_PRETTY_PRINT),
                    ),
                ]),
            ]),
        ];
    }
=======
>>>>>>> c7fd73eb (.)
}
