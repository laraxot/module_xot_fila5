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
<<<<<<< .merge_file_0XJ777
<<<<<<< HEAD
<<<<<<< HEAD
=======

    public function getFormSchemaOld(): array
    {
        return [];
    }
>>>>>>> laraxot/dev
=======

    public static function getFormSchema(): array
    {
        return [];
    }
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_NjEpdG
}
