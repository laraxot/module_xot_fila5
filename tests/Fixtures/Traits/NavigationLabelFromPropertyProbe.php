<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Traits;

final class NavigationLabelFromPropertyProbe extends HasCustomModelLabelProbeBase
{
    protected static ?string $navigationLabel = 'Nav Label';

    public static function getPluralModelLabel(): string
    {
        return 'Plurals';
    }
}
