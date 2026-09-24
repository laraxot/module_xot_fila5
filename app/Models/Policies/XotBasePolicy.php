<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * ----------------------------------------------------------------.
 */

namespace Modules\Xot\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Modules\Xot\Contracts\UserContract;

// use Modules\Xot\Datas\XotData;

abstract class XotBasePolicy
{
    use HandlesAuthorization;

    public function before(UserContract $user, string $_ability): ?bool
    {
        return once(function () use ($user) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });
    }

    public function viewAny(UserContract $user): Response|bool
    {
        return false;
    }
}
