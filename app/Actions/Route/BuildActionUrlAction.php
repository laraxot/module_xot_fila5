<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
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
        $route = request()->route();
<<<<<<< .merge_file_4nkri8
        if (! $route instanceof Route || $route->getName() === null) {
=======
<<<<<<< HEAD
        if (! $route instanceof Route || $route->getName() === null) {
=======
<<<<<<< .merge_file_OWDbnc
<<<<<<< HEAD
        if (! $route instanceof Route || $route->getName() === null) {
=======
        if (! $route instanceof Route || null === $route->getName()) {
>>>>>>> laraxot/dev
=======
        if (! $route instanceof Route || null === $route->getName()) {
>>>>>>> .merge_file_c5Ciqy
>>>>>>> laraxot/dev
>>>>>>> .merge_file_vC05y2
            return '#'.$action;
        }

        $target = Str::beforeLast($route->getName(), '.').'.'.$action;
        $routeParams = $route->parameters();
        $router = app(Router::class);

        return $router->has($target) ? route($target, array_merge($routeParams, [$row], $query)) : '#'.$target;
    }
}
