<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/**
 * Provides factory support for models using GetFactoryAction.
 *
 * Usage: just use the trait in your model. No type parameters needed.
 *
 * DO NOT DELETE the `$count`/`$state` parameters from factory() below, and DO
 * NOT drop newFactory(). This trait was previously left with unresolved merge
 * conflict markers that silently dropped `$count`/`$state`: PHP does not error
 * when you call a user-defined method with more positional args than it
 * declares, it just discards them. `User::factory(5)` needs `$count` to reach
 * `->count(5)` or it silently creates 1 record instead of 5 with zero
 * warning/error anywhere. `factory()` here mirrors the exact contract of
 * Laravel's own `Illuminate\Database\Eloquent\Factories\HasFactory::factory()`
 * on top of `newFactory()` resolving via `GetFactoryAction`.
 *
 * @mixin Model
 */
trait HasXotFactory
{
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory()
    {
        /** @var Factory<static> $factory */
        $factory = app(GetFactoryAction::class)->execute(static::class);

        return $factory;
    }

    /**
     * Get a new factory instance for the model.
     *
     * @param  (callable(array<string, mixed>, Model|null): array<string, mixed>)|array<string, mixed>|int|null  $count
     * @param  (callable(array<string, mixed>, Model|null): array<string, mixed>)|array<string, mixed>  $state
     * @return Factory<static>
     */
    public static function factory($count = null, $state = [])
    {
        $factory = static::newFactory();

        return $factory
            ->count(is_numeric($count) ? $count : null)
            ->state(is_callable($count) || is_array($count) ? $count : $state);
    }
}
