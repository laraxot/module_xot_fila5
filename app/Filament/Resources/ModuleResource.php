<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

<<<<<<< .merge_file_nCiNNT
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
>>>>>>> laraxot/dev
=======
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_2HCoFU
use Filament\Resources\Pages\Page;
use Illuminate\Support\Str;
use Modules\Xot\Models\Module;

class ModuleResource extends XotBaseResource
{
    protected static ?string $model = Module::class;

<<<<<<< .merge_file_nCiNNT
<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function getFormSchemaOld(): array
=======
    #[\Override]
    public static function getFormSchema(): array
>>>>>>> 8d801bbe (Check & fix styling)
    {
        return [
            'name' => TextInput::make('name')->required(),
            'description' => TextInput::make('description'),
            'icon' => Select::make('icon')->options([]),
            'priority' => TextInput::make('priority'),
            'status' => Toggle::make('status'),
        ];
    }

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_2HCoFU
    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[\Override]
    public static function getPages(): array
    {
        $prefix = static::class.'\\Pages\\';
        $name = Str::of(class_basename(static::class))->before('Resource')->toString();
        $plural = Str::of($name)->plural()->toString();
        $index = Str::of($prefix)->append('List'.$plural)->toString();
        $create = Str::of($prefix)->append('Create'.$name.'')->toString();
        $edit = Str::of($prefix)->append('Edit'.$name.'')->toString();

        /** @var class-string<Page> $index */
        $index = $index;
        /** @var class-string<Page> $create */
        $create = $create;
        /** @var class-string<Page> $edit */
        $edit = $edit;

        return [
            'index' => $index::route('/'),
            'create' => $create::route('/create'),
            'edit' => $edit::route('/{record}/edit'),
        ];
    }
}
