<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Traits;

final class PluralModelLabelFromPropertyProbe extends HasCustomModelLabelProbeBase
{
    protected static ?string $pluralModelLabel = 'Plural Labels';

    public static function getModelLabel(): string
    {
        return 'Label';
    }
}
