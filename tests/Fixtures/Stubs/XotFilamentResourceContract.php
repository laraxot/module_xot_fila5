<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Fixtures\Stubs;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Models\Cache;

final class XotFilamentResourceContract extends XotBaseResource
{
    protected static ?string $model = Cache::class;

    public static function getModel(): string
    {
        return Cache::class;
    }

    /**
     * @return array<string, mixed>
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * @return array<class-string>
     */
    public static function getWidgets(): array
    {
        return [];
    }
}
