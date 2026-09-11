<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class CacheInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, TextEntry>
     */
<<<<<<< HEAD
    public static function getInfolistSchema(): array
=======
    public function getInfolistSchema(): array
>>>>>>> laraxot/dev
    {
        return [
            'key' => TextEntry::make('key'),
            'value' => TextEntry::make('value'),
            'expiration' => TextEntry::make('expiration'),
        ];
    }
}
