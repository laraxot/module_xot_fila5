<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Modules\Xot\Datas\RouteParamsData;
use Spatie\QueueableAction\QueueableAction;

class IsAdminRouteAction
{
    use QueueableAction;

<<<<<<< .merge_file_OP4yG5
    public function execute(RouteParamsData $params = new RouteParamsData): bool
    {
        if ($params->in_admin !== null) {
=======
    public function execute(RouteParamsData $params = new RouteParamsData()): bool
    {
        if (null !== $params->in_admin) {
>>>>>>> .merge_file_cRJjJd
            return $params->in_admin;
        }

        if (request()->segment(1) === 'admin') {
            return true;
        }

        $segments = request()->segments();

        return $segments !== [] && $segments[0] === 'livewire' && session('in_admin', false) === true;
    }
}
