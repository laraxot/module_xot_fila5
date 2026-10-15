<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Stubs;

use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

final class XotFilamentRelationContract extends XotBaseRelationManager
{
    protected static string $relationship = 'sessions';

    public static function getRelationshipName(): string
    {
        return static::$relationship;
    }
}
