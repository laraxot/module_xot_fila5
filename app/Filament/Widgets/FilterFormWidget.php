<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

class FilterFormWidget extends XotBaseWidget
{
    // protected static string $view = 'filament.resources.your-resource.widgets.filter-form-widget';

    // protected int|string|array $columnSpan = 'full';

    // public ?array $data = [];

    // public array $form_schema = [];

    public function getFormSchema(): array
    {
        return [];
    }

    /*
    public function mount(): void
    {
        // @var mixed form->fill(;
    }



    public function applyFilters(): void
    {
        // Emetti un evento per aggiornare la pagina principale
        // @var mixed dispatch('filtersUpdated', filters: $this->data;
    }

    public function resetFilters(): void
    {
        // @var mixed form->fill(;
        // @var mixed dispatch('filtersUpdated', filters: [];
    }
    */
}
