<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Modules\Xot\Models\Session;

class SessionResource extends XotBaseResource
{
    protected static ?string $model = Session::class;

    /**
     * @return array<int, Component>
     */
    public function getFormSchemaOld(): array
    {
        return [
            TextInput::make('id')->required()->maxLength(255),
            TextInput::make('user_id')->numeric(),
            TextInput::make('ip_address')->maxLength(45),
            TextInput::make('user_agent')->maxLength(255),
            KeyValue::make('payload')->columnSpanFull(),
            TextInput::make('last_activity')->required()->numeric(),
        ];
    }
}
