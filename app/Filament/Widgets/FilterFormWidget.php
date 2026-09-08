<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
class FilterFormWidget extends XotBaseWidget
=======
class FilterFormWidget extends XotBaseSchemaWidget
>>>>>>> c7fd73eb (.)
{
    // protected static string $view = 'filament.resources.your-resource.widgets.filter-form-widget';

    // protected int|string|array $columnSpan = 'full';

    // public ?array $data = [];

    // public array $form_schema = [];

<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> c7fd73eb (.)
    public function getFormSchema(): array
    {
        return [];
    }

    /*
    public function mount(): void
    {
        $this->form->fill();
    }



    public function applyFilters(): void
    {
        // Emetti un evento per aggiornare la pagina principale
        $this->dispatch('filtersUpdated', filters: $this->data);
    }

    public function resetFilters(): void
    {
        $this->form->fill();
        $this->dispatch('filtersUpdated', filters: []);
    }
    */
}
