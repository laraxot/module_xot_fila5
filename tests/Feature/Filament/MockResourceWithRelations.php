<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Feature\Filament;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Models\Cache;

class MockResourceWithRelations extends XotBaseResource
{
    protected static ?string $model = Cache::class;
}
