<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

<<<<<<< .merge_file_674C8d
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Support\Components\Component;
>>>>>>> laraxot/dev
=======
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Support\Components\Component;
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_t7GykT
use Modules\Xot\Models\Session;

class SessionResource extends XotBaseResource
{
    protected static ?string $model = Session::class;
<<<<<<< .merge_file_674C8d
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

    /**
     * @return array<int, Component>
     */
<<<<<<< HEAD
    public function getFormSchemaOld(): array
=======
    #[\Override]
    public static function getFormSchema(): array
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_t7GykT
}
