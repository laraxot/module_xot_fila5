<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Filament\Resources\ProbeResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Tests\Modules\Xot\Fixtures\Filament\Resources\ProbeResource;

class ListProbes extends ListRecords
{
    protected static string $resource = ProbeResource::class;
}
