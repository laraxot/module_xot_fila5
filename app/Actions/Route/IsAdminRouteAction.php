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

<<<<<<< .merge_file_7I4JV3
<<<<<<< HEAD
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
=======
        if ('admin' === request()->segment(1)) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if (request()->segment(1) === 'admin') {
>>>>>>> .merge_file_1WFFGX
            return true;
        }

        $segments = request()->segments();

<<<<<<< .merge_file_7I4JV3
<<<<<<< HEAD
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
=======
        return [] !== $segments && 'livewire' === $segments[0] && true === session('in_admin', false);
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
>>>>>>> .merge_file_1WFFGX
    }
}
