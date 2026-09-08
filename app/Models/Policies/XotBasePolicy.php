<?php

declare(strict_types=1);

/**
 * ----------------------------------------------------------------.
 */

namespace Modules\Xot\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
<<<<<<< HEAD
=======
use Illuminate\Auth\Access\Response;
>>>>>>> c7fd73eb (.)
use Modules\Xot\Contracts\UserContract;

// use Modules\Xot\Datas\XotData;

abstract class XotBasePolicy
{
    use HandlesAuthorization;

<<<<<<< HEAD
    public function before(UserContract $user, string $_ability): null|bool
=======
    public function before(UserContract $user, string $_ability): ?bool
>>>>>>> c7fd73eb (.)
    {
        return once(function () use ($user) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
<<<<<<< HEAD

            return null;
        });
    }

    public function viewAny(UserContract $userContract): bool
=======
        });
    }

    public function viewAny(UserContract $user): Response|bool
>>>>>>> c7fd73eb (.)
    {
        return false;
    }
}
