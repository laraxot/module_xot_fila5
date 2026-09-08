<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

<<<<<<< HEAD
use Spatie\ModelStates\State;
use Illuminate\Database\Eloquent\Model;

/**
 * @property State $status
=======
use Illuminate\Database\Eloquent\Model;

/**
 * @property object|string|null $status
>>>>>>> c7fd73eb (.)
 *
 * @phpstan-require-extends Model
 */
interface WithStateStatusContract
{
}
