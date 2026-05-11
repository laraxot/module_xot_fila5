<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheResource\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component as \\Filament\\Forms\\Components\\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class CacheForm extends XotBaseResourceForm
{
    /**
     * @return array<int|string, \\Filament\\Forms\\Components\\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'key' => TextInput::make('key')->required()->maxLength(255),
            'expiration' => TextInput::make('expiration')->required()->numeric(),
            'value' => KeyValue::make('value')->columnSpanFull(),
        ];
    }
}
