<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Table;
<<<<<<< HEAD
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\TransTrait;
=======
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> laraxot/dev
use Webmozart\Assert\Assert;

/**
 * @property string|null $tableSearch Fornita a runtime da chi consuma HasXotTable
 *                                    in un contesto Livewire (mai dichiarata qui
 *                                    per non ricreare il conflitto di composizione
 *                                    risolto in HasXotTable).
 */
abstract class XotBaseResourceTable
{
    use HasXotTable;
<<<<<<< HEAD
    use TransTrait;
=======
>>>>>>> laraxot/dev

    public static function configure(Table $table): Table
    {
        if (static::class === self::class) {
            throw new \LogicException('XotBaseResourceTable::configure() must be called on a concrete table class.');
        }

        $instance = app(static::class);
        Assert::isInstanceOf($instance, self::class);

        return $instance->table($table);
    }

    /**
<<<<<<< HEAD
     * @return array<int|string, Column>
     */
    abstract public function getTableColumns(): array;
=======
     * @return array<string, Column>
     */
    abstract public function getTableColumns(): array;

    /**
     * La Resource proprietaria, dedotta dal namespace `{Resource}\Schemas\{Model}Form`.
     *
     * @return class-string<XotBaseResource>
     */
    public static function getResource(): string
    {
        $resource = Str::of(static::class)->before('\\Tables\\')->toString();
        Assert::classExists($resource);
        Assert::subclassOf($resource, XotBaseResource::class);

        return $resource;
    }
>>>>>>> laraxot/dev
}
