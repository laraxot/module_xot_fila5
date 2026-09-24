<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< .merge_file_AkgE9t
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory as EloquentHasFactory;
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_zafBhd
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/**
 * Provides factory support for models using GetFactoryAction.
 *
 * Usage: just use the trait in your model. No type parameters needed.
 *
 * DO NOT DELETE the `$count`/`$state` parameters from factory() below, and DO
 * NOT drop newFactory(). This trait has been silently broken 5+ times this
 * session by well-meaning simplifications (removing "unused" params, removing
 * the "redundant" newFactory() indirection). Every time, it silently regresses
 * a real call site instead of throwing: PHP does not error when you call a
 * user-defined method with more positional args than it declares, it just
 * discards them. `User::factory(5)` (Modules/Employee/database/seeders/
 * WorkHourSeeder.php) needs $count to reach ->count(5) or it silently creates
 * 1 record instead of 5 with zero warning/error anywhere. See second-brain
 * memory `feedback_validate_generated_files_before_saving.md` and
 * `docs/chat/2026-09-07-URGENT-xotbasemodel-itself-lost-hasxotfactory.md`
 * before touching this file again.
 *
 * @mixin Model
 */
trait HasXotFactory
{
    /**
     * @return Factory<static>
     */
    protected static function factory(): Factory
    {
        /** @var Factory<static> $factory */
<<<<<<< .merge_file_AkgE9t
=======
=======
use Illuminate\Database\Eloquent\Factories\HasFactory as EloquentHasFactory;
use Modules\Xot\Actions\Factory\GetFactoryAction;

/** @template TFactory of Factory */
trait HasXotFactory
{
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_zafBhd
        $factory = app(GetFactoryAction::class)->execute(static::class);

        return $factory;
    }
}
