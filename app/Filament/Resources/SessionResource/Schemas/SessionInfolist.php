<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\SessionResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class SessionInfolist extends XotBaseResourceInfolist
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
            'user_id' => TextEntry::make('user_id'),
            'ip_address' => TextEntry::make('ip_address'),
            'user_agent' => TextEntry::make('user_agent'),
            'payload' => TextEntry::make('payload'),
            'last_activity' => TextEntry::make('last_activity'),
        ];
    }
}
