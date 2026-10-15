<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Stubs;

use Modules\Xot\Filament\Resources\Pages\XotBaseManageRelatedRecords;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Models\Cache as CacheModel;

/** @extends XotBaseManageRelatedRecords<CacheModel> */
final class XotCovManageRelated extends XotBaseManageRelatedRecords
{
    protected static string $resource = XotBaseResource::class;

    protected static string $relationship = 'sessions';

    public static function getNavigationGroup(): string
    {
        return 'Test';
    }
}
