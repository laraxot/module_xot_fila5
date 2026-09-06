<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/**
 * Provides factory support for models using GetFactoryAction.
 *
 * Usage: just use the trait in your model. No type parameters needed.
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
=======
use Illuminate\Database\Eloquent\Factories\HasFactory as EloquentHasFactory;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/** @template TFactory of Factory */
trait HasXotFactory
{
    /** @use EloquentHasFactory<TFactory> */
    use EloquentHasFactory {
        newFactory as parentNewFactory;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return TFactory
     */
    protected static function newFactory(): Factory
    {
        /** @var TFactory $factory */
>>>>>>> 7f6cf6be (.)
        $factory = app(GetFactoryAction::class)->execute(static::class);

        return $factory;
    }
}
