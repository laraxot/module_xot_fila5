<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Traits;

final class BreadcrumbProbe extends HasCustomModelLabelProbeBase
{
    public static function getModelLabel(): string
    {
        return 'Bread';
    }
}
