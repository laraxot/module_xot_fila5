<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Traits;

final class NavigationLabelFromPluralProbe extends HasCustomModelLabelProbeBase
{
    public static function getPluralModelLabel(): string
    {
        return 'Plurals';
    }
}
