<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/**
 * HasXotFactory provides dynamic factory resolution via GetFactoryAction.
 *
 * This trait is generic to support type-safe factory access via @phpstan-use
 * with specific Factory and Model types passed by concrete model classes.
 * Factories are resolved at runtime via GetFactoryAction.
 *
 * @template TFactory of Factory<covariant Model>
 * @template TModel of Model
 *
 * @phpstan-ignore missingType.generics — Dynamic factory resolution; concrete models resolve at runtime
 */
trait HasXotFactory
{
    /**
     * @param  (callable(array<string, mixed>, Model|null): array<string, mixed>)|array<string, mixed>|int|null  $count
     * @param  (callable(array<string, mixed>, Model|null): array<string, mixed>)|array<string, mixed>  $state
     * @return Factory<covariant Model>
     */
    public static function factory($count = null, $state = []): Factory
    {
        $factory = static::newFactory()
            ->count(is_numeric($count) ? (int) $count : null);

        if (is_callable($count)) {
            return $factory->state($count);
        }

        if (is_array($count)) {
            return $factory->state(self::normalizeFactoryState($count));
        }

        return $factory->state(is_array($state) ? self::normalizeFactoryState($state) : $state);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<covariant Model>
     */
    protected static function newFactory(): Factory
    {
        /** @var Factory<covariant Model> */
        return app(GetFactoryAction::class)->execute(static::class);
    }

    /**
     * @param  array<array-key, mixed>  $state
     * @return array<string, mixed>
     */
    private static function normalizeFactoryState(array $state): array
    {
        $normalized = [];
        foreach ($state as $key => $value) {
            if (! is_string($key)) {
                continue;
            }

            $normalized[$key] = $value;
        }

        return $normalized;
    }
}
