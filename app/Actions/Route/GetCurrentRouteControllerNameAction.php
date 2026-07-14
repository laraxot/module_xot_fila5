<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Routing\Route;
use Illuminate\Support\Str;
<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> 61938ca4 (delete .claude-audit/)
use Spatie\QueueableAction\QueueableAction;

class GetCurrentRouteControllerNameAction
{
    use QueueableAction;

    public function execute(): string
    {
        $route = request()->route();
        if (! $route instanceof Route) {
<<<<<<< HEAD
            throw new \RuntimeException('Current route action is not available.');
        }

        $routeAction = $route->getActionName();

=======
            throw new RuntimeException('Current route action is not available.');
        }

        $routeAction = $route->getActionName();
>>>>>>> 61938ca4 (delete .claude-audit/)
        return Str::between($routeAction, 'Http\\Controllers\\', 'Controller');
    }
}
