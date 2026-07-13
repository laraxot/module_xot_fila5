<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Facades\Request;
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

        if ('admin' === Request::segment(1)) {
            return true;
        }

        $segments = Request::segments();

        return [] !== $segments && 'livewire' === $segments[0] && true === session('in_admin', false);
    }
}
