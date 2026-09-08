<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
>>>>>>> c7fd73eb (.)

/**
 * Modules\Xot\Contracts\UpdaterContract.
 *
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
<<<<<<< HEAD
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
=======
 * @property string|null $created_by
 * @property string|null $updated_by
>>>>>>> c7fd73eb (.)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface UpdaterContract
{
}
