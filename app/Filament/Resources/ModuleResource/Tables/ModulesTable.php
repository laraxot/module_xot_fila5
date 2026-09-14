<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\ModuleResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Models\Module;
>>>>>>> laraxot/dev

class ModulesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
     * @var class-string<Module>
     */
    protected static string $model = Module::class;

    /**
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
<<<<<<< HEAD
        /*
         * @return array<int|string, \Filament\Tables\Columns\Column>
         */
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
=======
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'description' => TextColumn::make('description')->searchable()->wrap()->limit(100),
            'status' => IconColumn::make('status')->boolean()->sortable(),
            'priority' => TextColumn::make('priority')->numeric()->sortable(),
            'path' => TextColumn::make('path')->limit(60)->wrap()->toggleable(isToggledHiddenByDefault: true),
>>>>>>> laraxot/dev
        ];
    }
}
