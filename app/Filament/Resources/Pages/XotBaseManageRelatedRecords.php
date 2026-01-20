<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Modules\Xot\Filament\Traits\HasXotTable;
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;

/**
 * ---
*/
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{
    use HasXotTable;
}