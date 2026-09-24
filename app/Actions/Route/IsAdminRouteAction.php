<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Spatie\QueueableAction\QueueableAction;

class IsAdminRouteAction
{
    use QueueableAction;

    /** @param array<string, mixed> $params */
    public function execute(array $params = []): bool
    {
        if (isset($params['in_admin'])) {
            return (bool) $params['in_admin'];
        }

<<<<<<< HEAD
<<<<<<< .merge_file_kw6f0a
<<<<<<< HEAD
<<<<<<< HEAD
        if (request()->segment(1) === 'admin') {
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_qqeQNf
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if (request()->segment(1) === 'admin') {
=======
        if ('admin' === request()->segment(1)) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('admin' === request()->segment(1)) {
>>>>>>> .merge_file_LXWvod
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('admin' === request()->segment(1)) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (request()->segment(1) === 'admin') {
>>>>>>> .merge_file_Qt4Gpv
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return true;
        }

        $segments = request()->segments();

<<<<<<< HEAD
<<<<<<< .merge_file_kw6f0a
<<<<<<< HEAD
<<<<<<< HEAD
        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_qqeQNf
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
=======
        return [] !== $segments && 'livewire' === $segments[0] && true === session('in_admin', false);
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        return [] !== $segments && 'livewire' === $segments[0] && true === session('in_admin', false);
>>>>>>> .merge_file_LXWvod
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return [] !== $segments && 'livewire' === $segments[0] && true === session('in_admin', false);
>>>>>>> 3792da0d (Check & fix styling)
=======
        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
>>>>>>> .merge_file_Qt4Gpv
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
