<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheLockResource\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component as \\Filament\\Forms\\Components\\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class CacheLockForm extends XotBaseResourceForm
{
    /**
     * @return array<int|string, \\Filament\\Forms\\Components\\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'key' => TextInput::make('key')->required()->maxLength(255),
            'owner' => TextInput::make('owner')->required()->maxLength(255),
            'expiration' => TextInput::make('expiration')->required()->numeric(),
        ];
    }
}
