<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;

trait HasXotForm
{
    /** @var array<string, mixed> */
    public array $data = [];

    /**
     * @return array<string, Component>
     */
    abstract public function getFormSchema(): array;

    public function getFormColumns(): int
    {
        return 2;
    }

    final public function form(Schema $schema): Schema
    {
        return $schema
            ->components($this->getFormSchema())
            ->columns($this->getFormColumns())
            ->statePath('data');
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev

    public function schema(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema());
    }
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
}
