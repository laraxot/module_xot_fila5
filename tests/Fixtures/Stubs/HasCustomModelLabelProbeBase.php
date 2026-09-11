<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Stubs;

use Modules\Xot\Traits\Filament\HasCustomModelLabel;
<<<<<<< HEAD
use Modules\User\Models\User;
=======
>>>>>>> laraxot/dev

abstract class HasCustomModelLabelProbeBase
{
    use HasCustomModelLabel;

    protected static ?string $modelLabel = null;

    protected static ?string $pluralModelLabel = null;

    protected static ?string $navigationLabel = null;

    public static function getModel(): string
    {
        return 'App\Models\User';
    }
}
