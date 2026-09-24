<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Routing\Route;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GetCurrentRouteViewAction
{
    use QueueableAction;

    public function execute(): string
    {
        $route = request()->route();
        if (! $route instanceof Route) {
            throw new \RuntimeException('Current route action is not available.');
        }

        $routeAction = $route->getActionName();
        $controller = Str::between($routeAction, 'Http\\Controllers\\', 'Controller');
        /** @var array<string, mixed> $params */
        $params = [];
        foreach ($route->parameters() as $key => $value) {
            if (is_string($key)) {
                $params[$key] = $value;
            }
        }

        $params['containers'] = implode('.', array_map(
            static fn (mixed $value): string => is_scalar($value) ? (string) $value : '',
            array_values(array_filter(
                $params,
                static fn (string $key): bool => str_starts_with($key, 'container'),
                ARRAY_FILTER_USE_KEY,
            )),
        ));

        return collect(explode('\\', $controller))
            ->reject(static fn (string $part): bool => in_array($part, ['Module', 'Item'], true))
<<<<<<< HEAD
<<<<<<< .merge_file_9kYBDo
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_gjPP1P
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
            ->map(static function (string $part) use ($params): mixed {
                $part = Str::snake($part);

                return $params[$part] ?? $part;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_jykUJQ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ptcZSa
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            ->map(static function (string $part) use ($params): string {
                $part = Str::snake($part);
                $value = $params[$part] ?? $part;

                return is_scalar($value) || $value instanceof \Stringable ? (string) $value : $part;
<<<<<<< HEAD
<<<<<<< .merge_file_9kYBDo
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_gjPP1P
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_jykUJQ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ptcZSa
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            })
            ->implode('.');
    }
}
