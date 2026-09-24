<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;

class NavigationProbeResource extends XotBaseResource
{
    protected static string $module = 'Xot';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static string|\UnitEnum|null $navigationGroup = 'Test Group';

    protected static ?int $navigationSort = 1;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev

    public function getFormSchemaOld(): array
    {
        return [];
    }
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
}
