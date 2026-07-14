<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory as EloquentHasFactory;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/** @template TFactory of Factory */
trait HasXotFactory
{
    use EloquentHasFactory {
        newFactory as parentNewFactory;
    }

    /**
     * Create a new factory instance for the model.
     *
<<<<<<< HEAD
     * <<<<<<< HEAD
     * <<<<<<< HEAD
     * <<<<<<< HEAD
     *
     * @return TFactory
     *                                  =======
     * @return Factory<covariant Model>
     *                                  >>>>>>> 64619e34 (.)
     *                                  =======
     * @return TFactory
     *                                  >>>>>>> 61938ca4 (delete .claude-audit/)
     *                                  =======
     * @return TFactory
     *                                  >>>>>>> 4784e8f0 (.)
=======
     * @return TFactory
>>>>>>> 2353ccee (.)
     */
    protected static function newFactory()
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }
}
