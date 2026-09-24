<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Feature\Filament;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Models\Cache;

class MockResourceWithRelations extends XotBaseResource
{
    protected static ?string $model = Cache::class;
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
