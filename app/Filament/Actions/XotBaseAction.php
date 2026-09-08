<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions;

<<<<<<< HEAD
use Filament\Actions\Action;
=======
use Filament\Actions\Action as FilamentAction;
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Model;

/**
 * Base class for Filament actions.
 *
 * @property ?Model $record The associated record for this action
 *
 * @method static static make(?string $name = null) Create a new instance of the action
 */
<<<<<<< HEAD
abstract class XotBaseAction extends Action
=======
abstract class XotBaseAction extends FilamentAction
>>>>>>> c7fd73eb (.)
{
}
