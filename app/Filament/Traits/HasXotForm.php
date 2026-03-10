<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Schema;

/**
 * Trait HasXotForm.
 *
 * Provides standardized form handling for Filament widgets and components.
 * Implementing classes must define getFormSchema() as public.
 *
 * REGOLA CRITICA: Il metodo form() DEVE essere final. Le classi che usano questo
 * trait NON devono mai fare override di form() — devono adattarsi implementando
 * getFormSchema() che restituisce l'array di componenti.
 *
 * @see ../../docs/hasxotform-form-final.md
 */
trait HasXotForm
{
    use InteractsWithForms;

    /** @var array<string, mixed> */
    public array $data = [];

    /**
     * Form schema builder. FINAL: non sovrascrivere — implementare getFormSchema().
     */
    final public function form(Schema $schema): Schema
    {
        return $schema
            ->components($this->getFormSchema())
            ->columns(2)
            ->statePath('data');
    }
}
