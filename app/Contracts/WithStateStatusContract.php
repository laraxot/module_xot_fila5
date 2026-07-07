<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

/**
 * @property object $status
=======
use Spatie\ModelStates\State;

/**
 * @property State $status
>>>>>>> origin/dev
 *
 * @phpstan-require-extends Model
 */
interface WithStateStatusContract
{
}
