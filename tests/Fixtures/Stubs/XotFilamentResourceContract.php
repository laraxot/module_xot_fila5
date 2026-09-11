<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Stubs;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Models\Cache;

final class XotFilamentResourceContract extends XotBaseResource
{
    protected static ?string $model = Cache::class;
<<<<<<< HEAD

    /**
     * @return array<int|string, Component>
     */
    public static function getFormSchema(): array
    {
        return [];
    }
=======
>>>>>>> laraxot/dev
}
