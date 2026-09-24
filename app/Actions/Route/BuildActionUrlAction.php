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
<<<<<<< HEAD
<<<<<<< .merge_file_aZ0XtI
<<<<<<< HEAD
<<<<<<< HEAD
        if (! $route instanceof Route || $route->getName() === null) {
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_OWDbnc
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if (! $route instanceof Route || $route->getName() === null) {
=======
        if (! $route instanceof Route || null === $route->getName()) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (! $route instanceof Route || null === $route->getName()) {
>>>>>>> .merge_file_c5Ciqy
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if (! $route instanceof Route || null === $route->getName()) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if (! $route instanceof Route || $route->getName() === null) {
>>>>>>> .merge_file_fgl7eH
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return '#'.$action;
        }

        $target = Str::beforeLast($route->getName(), '.').'.'.$action;
        $routeParams = $route->parameters();
        $router = app(Router::class);

        return $router->has($target) ? route($target, array_merge($routeParams, [$row], $query)) : '#'.$target;
    }
}
