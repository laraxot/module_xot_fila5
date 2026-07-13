<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GetCurrentRouteActionNameAction
{
    use QueueableAction;

    public function execute(): string
    {
        $routeAction = Route::currentRouteAction();
        if (null === $routeAction) {
            throw new \RuntimeException('Current route action is not available.');
        }

        $action = Str::after($routeAction, '@');
        $action = Str::contains($action, '\\') ? Str::afterLast($action, '\\') : $action;
        $action = Str::endsWith($action, 'Controller') ? Str::before($action, 'Controller') : $action;

        return Str::snake($action);
    }
}
