<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\ModuleResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
>>>>>>> laraxot/dev
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Models\Module;
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

class ModulesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<Module>
     */
    protected static string $model = Module::class;

    /**
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        /*
         * @return array<int|string, \Filament\Tables\Columns\Column>
         */
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
=======
>>>>>>> laraxot/dev
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'description' => TextColumn::make('description')->searchable()->wrap()->limit(100),
            'status' => IconColumn::make('status')->boolean()->sortable(),
            'priority' => TextColumn::make('priority')->numeric()->sortable(),
            'path' => TextColumn::make('path')->limit(60)->wrap()->toggleable(isToggledHiddenByDefault: true),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
