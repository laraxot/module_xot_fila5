<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Traits;

final class ModelLabelFromModelNameProbe extends HasCustomModelLabelProbeBase
{
    public static function getModel(): string
    {
        return 'App\Models\UserInvitation';
    }
}
