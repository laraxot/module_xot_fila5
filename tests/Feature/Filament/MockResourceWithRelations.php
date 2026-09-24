<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature\Filament;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Models\Cache;

class MockResourceWithRelations extends XotBaseResource
{
    protected static ?string $model = Cache::class;
<<<<<<< .merge_file_ggkB4L
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
>>>>>>> .merge_file_OGmlHp
}
