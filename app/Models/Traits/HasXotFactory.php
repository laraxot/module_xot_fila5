<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory as EloquentHasFactory;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/**
 * Include gia' HasFactory (via newFactory override con GetFactoryAction).
 * Model che usano HasXotFactory NON devono aggiungere `use HasFactory;`
 * ne' ridefinire newFactory(): la factory viene risolta/generata da
 * GetFactoryAction seguendo le convenzioni Laraxot.
 *
 * @use EloquentHasFactory<Factory<static>>
 */
trait HasXotFactory
{
    /** @use EloquentHasFactory<Factory<static>> */
    use EloquentHasFactory {
        newFactory as parentNewFactory;
    }

    /**
     * @return Factory<static>
     */
    protected static function newFactory(): Factory
    {
        /** @var Factory<static> */
        return app(GetFactoryAction::class)->execute(static::class);
    }
}
