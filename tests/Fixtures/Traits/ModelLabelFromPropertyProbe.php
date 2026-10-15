<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Traits;

final class ModelLabelFromPropertyProbe extends HasCustomModelLabelProbeBase
{
    protected static ?string $modelLabel = 'Custom Label';
}
