<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

<<<<<<< HEAD
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
=======
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;

>>>>>>> c7fd73eb (.)
trait HasXotForm
{
    /** @var array<string, mixed> */
    public array $data = [];

<<<<<<< HEAD
    abstract public function getFormSchema(): array;

=======
    /**
     * @return array<string, Component>
     */
    abstract public function getFormSchema(): array;

    public function getFormColumns(): int
    {
        return 2;
    }

>>>>>>> c7fd73eb (.)
    final public function form(Schema $schema): Schema
    {
        return $schema
            ->components($this->getFormSchema())
<<<<<<< HEAD
            ->columns(2)
=======
            ->columns($this->getFormColumns())
>>>>>>> c7fd73eb (.)
            ->statePath('data');
    }
}
