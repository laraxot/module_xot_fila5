<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GetCurrentRouteViewAction
{
    use QueueableAction;

    public function execute(): string
    {
        $routeAction = Route::currentRouteAction();
        if (null === $routeAction) {
            throw new \RuntimeException('Current route action is not available.');
        }

        $controller = Str::between($routeAction, 'Http\\Controllers\\', 'Controller');
        $route = Route::current();
        /** @var array<string, mixed> $params */
        $params = [];
        foreach ($route instanceof \Illuminate\Routing\Route ? $route->parameters() : [] as $key => $value) {
            if (is_string($key)) {
                $params[$key] = $value;
            }
        }

        [$containers] = params2ContainerItem($params);
        $params['containers'] = implode('.', array_map(
            static fn (mixed $value): string => is_scalar($value) ? (string) $value : '',
            array_values($containers),
        ));

        return collect(explode('\\', $controller))
            ->reject(static fn (string $part): bool => in_array($part, ['Module', 'Item'], true))
            ->map(static function (string $part) use ($params): mixed {
                $part = Str::snake($part);

                return $params[$part] ?? $part;
            })
            ->implode('.');
    }
}
