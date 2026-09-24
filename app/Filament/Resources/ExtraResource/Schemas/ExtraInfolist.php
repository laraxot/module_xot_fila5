<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\ExtraResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class ExtraInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, TextEntry>
     */
<<<<<<< HEAD
    public function getInfolistSchema(): array
=======
    public static function getInfolistSchema(): array
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    {
        return [
            'id' => TextEntry::make('id'),
            'model_type' => TextEntry::make('model_type'),
            'model_id' => TextEntry::make('model_id'),
            'extra_attributes' => TextEntry::make('extra_attributes'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
            'updated_at' => TextEntry::make('updated_at')->dateTime(),
        ];
    }
}
