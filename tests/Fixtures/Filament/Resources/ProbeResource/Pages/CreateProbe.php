<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Filament\Resources\ProbeResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Tests\Modules\Xot\Fixtures\Filament\Resources\ProbeResource;

class CreateProbe extends CreateRecord
{
    protected static string $resource = ProbeResource::class;
}
