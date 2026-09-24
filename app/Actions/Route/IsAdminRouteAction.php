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

<<<<<<< .merge_file_Ard0UT
        if (request()->segment(1) === 'admin') {
=======
<<<<<<< HEAD
        if (request()->segment(1) === 'admin') {
=======
<<<<<<< .merge_file_qqeQNf
<<<<<<< HEAD
        if (request()->segment(1) === 'admin') {
=======
        if ('admin' === request()->segment(1)) {
>>>>>>> laraxot/dev
=======
        if ('admin' === request()->segment(1)) {
>>>>>>> .merge_file_LXWvod
>>>>>>> laraxot/dev
>>>>>>> .merge_file_pGgwEZ
            return true;
        }

        $segments = request()->segments();

<<<<<<< .merge_file_Ard0UT
        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
=======
<<<<<<< HEAD
        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
=======
<<<<<<< .merge_file_qqeQNf
<<<<<<< HEAD
        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
=======
        return [] !== $segments && 'livewire' === $segments[0] && true === session('in_admin', false);
>>>>>>> laraxot/dev
=======
        return [] !== $segments && 'livewire' === $segments[0] && true === session('in_admin', false);
>>>>>>> .merge_file_LXWvod
>>>>>>> laraxot/dev
>>>>>>> .merge_file_pGgwEZ
    }
}
