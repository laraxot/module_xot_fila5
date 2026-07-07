<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Schemas;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component as SchemaComponent;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> 40b96bcd6 (.)
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> origin/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class LogForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<int|string, SchemaComponent>
=======
     * @return array<int|string, Component>
>>>>>>> 40b96bcd6 (.)
=======
     * @return array<int|string, Component>
>>>>>>> origin/dev
     */
    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'name' => TextInput::make('name')->required()->maxLength(255),
            'path' => TextInput::make('path')->required()->maxLength(255),
            'content' => Textarea::make('content')->columnSpanFull(),
=======
            Section::make([
                'name' => TextInput::make('name'),
            ]),
>>>>>>> 40b96bcd6 (.)
=======
            Section::make([
                'name' => TextInput::make('name'),
            ]),
>>>>>>> origin/dev
        ];
    }
}
