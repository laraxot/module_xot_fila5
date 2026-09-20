<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Stubs;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\XotBaseResource\Pages\XotBaseManageRelatedRecords;
=======
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRelatedRecords;
use Modules\Xot\Filament\Resources\XotBaseResource;
>>>>>>> laraxot/dev
use Modules\Xot\Models\Cache as CacheModel;

/** @extends XotBaseManageRelatedRecords<CacheModel> */
final class XotCovManageRelated extends XotBaseManageRelatedRecords
{
    protected static string $resource = XotBaseResource::class;

    protected static string $relationship = 'sessions';
}
