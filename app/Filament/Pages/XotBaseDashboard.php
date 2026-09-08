<?php

declare(strict_types=1);

<<<<<<< HEAD

namespace Modules\Xot\Filament\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Get;
=======
namespace Modules\Xot\Filament\Pages;

>>>>>>> c7fd73eb (.)
use Filament\Pages\Dashboard as FilamentDashboard;

abstract class XotBaseDashboard extends FilamentDashboard
{
<<<<<<< HEAD
    use FilamentDashboard\Concerns\HasFiltersForm;

    protected static null|int $navigationSort = 1;
    protected bool $persistsFiltersInSession = true;

    final public function filtersForm(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema($this->getFiltersFormSchema())->columns(3),
        ]);
    }

    public function getFiltersFormSchema(): array
    {
        return [];
=======
    /**
     * @return array<string, mixed>
     */
    public function getWidgets(): array
    {
        return [
            // Override if needed
        ];
    }

    public function getColumns(): int|array
    {
        return 2;
>>>>>>> c7fd73eb (.)
    }
}
