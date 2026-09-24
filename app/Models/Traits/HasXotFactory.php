<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory as EloquentHasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Webmozart\Assert\Assert;

/**
 * Provides factory support for models using GetFactoryAction.
 *
 * Usage: just use the trait in your model.
 *
 * The public static `factory($count = null, $state = [])` comes from Eloquent's
 * HasFactory and MUST keep its `$count`/`$state` parameters, and newFactory()
 * below MUST NOT be dropped. This trait has been silently broken 5+ times by
 * well-meaning simplifications. Every time, it silently regresses a real call
 * site instead of throwing: PHP does not error when you call a user-defined
 * method with more positional args than it declares, it just discards them.
 * `User::factory(5)` (Modules/Employee/database/seeders/WorkHourSeeder.php)
 * needs $count to reach ->count(5) or it silently creates 1 record instead of 5.
 * See `docs/chat/2026-09-07-URGENT-xotbasemodel-itself-lost-hasxotfactory.md`
 * before touching this file again.
 *
 * @mixin Model
 */
trait HasXotFactory
{
    /** @use EloquentHasFactory<\Illuminate\Database\Eloquent\Factories\Factory<covariant \Illuminate\Database\Eloquent\Model>> */
    use EloquentHasFactory {
        newFactory as parentNewFactory;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<covariant Model>
     */
    protected static function newFactory(): Factory
    {
        $factory = app(GetFactoryAction::class)->execute(static::class);
        Assert::isInstanceOf($factory, Factory::class);

        return $factory;
    }
}
