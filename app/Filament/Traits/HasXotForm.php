<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;

=======
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;

/**
 * Trait HasXotTable.
 *
 * Provides enhanced table functionality with translations and optimized structure.
 *
 * @property TableLayoutEnum $layoutView
 *
 * @SuppressWarnings("PHPMD.StaticAccess")
 * @SuppressWarnings("PHPMD.CyclomaticComplexity")
 * @SuppressWarnings("PHPMD.NPathComplexity")
 */
>>>>>>> laraxot/dev
trait HasXotForm
{
    /** @var array<string, mixed> */
    public array $data = [];

<<<<<<< HEAD
    /**
     * @return array<string, Component>
     */
    abstract public function getFormSchema(): array;

    public function getFormColumns(): int
    {
        return 2;
    }

=======
    abstract public function getFormSchema(): array;

>>>>>>> laraxot/dev
    final public function form(Schema $schema): Schema
    {
        return $schema
            ->components($this->getFormSchema())
<<<<<<< HEAD
            ->columns($this->getFormColumns())
            ->statePath('data');
    }

    public function schema(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema());
    }
=======
            ->columns(2)
            ->statePath('data');
    }
>>>>>>> laraxot/dev
}
