<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory as EloquentHasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Webmozart\Assert\Assert;
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
>>>>>>> laraxot/dev

/**
 * Provides factory support for models using GetFactoryAction.
 *
<<<<<<< HEAD
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
=======
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
>>>>>>> laraxot/dev
 * before touching this file again.
 *
 * @mixin Model
 */
trait HasXotFactory
{
<<<<<<< HEAD
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
=======
    /**
     * @return Factory<static>
     */
    protected static function factory(): Factory
    {
        /** @var Factory<static> $factory */
        $factory = app(GetFactoryAction::class)->execute(static::class);
>>>>>>> laraxot/dev

        return $factory;
    }
}
