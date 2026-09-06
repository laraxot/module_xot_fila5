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
        if (request()->segment(1) === 'admin') {
=======
        if ('admin' === request()->segment(1)) {
>>>>>>> 7f6cf6be (.)
            return true;
        }

        $segments = request()->segments();

<<<<<<< HEAD
        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
=======
        return [] !== $segments && 'livewire' === $segments[0] && true === session('in_admin', false);
>>>>>>> 7f6cf6be (.)
    }
}
