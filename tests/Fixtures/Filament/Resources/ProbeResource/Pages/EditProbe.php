<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Filament\Resources\ProbeResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Tests\Modules\Xot\Fixtures\Filament\Resources\ProbeResource;

class EditProbe extends EditRecord
{
    protected static string $resource = ProbeResource::class;
}
