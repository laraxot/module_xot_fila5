<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class BuildActionUrlAction
{
    use QueueableAction;

    /** @param array<string, mixed> $params */
    public function execute(array $params): string
    {
        $action = is_string($params['act'] ?? null) ? $params['act'] : 'show';
        $row = $params['row'] ?? (object) [];
        $query = is_array($params['query'] ?? null) ? $params['query'] : [];
        $routeName = Route::currentRouteName();

        if (null === $routeName) {
            return '#'.$action;
        }

        $target = Str::beforeLast($routeName, '.').'.'.$action;
        $route = Route::current();
        $routeParams = $route instanceof \Illuminate\Routing\Route ? $route->parameters() : [];

        return Route::has($target) ? route($target, array_merge($routeParams, [$row], $query)) : '#'.$target;
    }
}
