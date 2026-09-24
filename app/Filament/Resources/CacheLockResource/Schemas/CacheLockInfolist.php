<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheLockResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class CacheLockInfolist extends XotBaseResourceInfolist
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
            'key' => TextEntry::make('key'),
            'owner' => TextEntry::make('owner'),
            'expiration' => TextEntry::make('expiration'),
        ];
    }
}
