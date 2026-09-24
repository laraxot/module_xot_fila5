<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;
>>>>>>> laraxot/dev

/**
 * Replaces Modules\Xot\Services\RouteDynService::getMethod().
 *
 * Standalone pure helper (independently tested), kept as its own Action
 * rather than folded into RegisterDynamicRoutesAction.
 */
class GetRouteMethodAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $v
=======
     * @param array<string, mixed> $v
     *
>>>>>>> laraxot/dev
     * @return array<int, string>
     */
    public function execute(array $v, ?string $namespace = null): array
    {
<<<<<<< HEAD
=======
        if (! isset($v['method'])) {
            return ['get', 'post'];
        }

        $methods = [];
        foreach (Arr::wrap($v['method']) as $method) {
            Assert::string($method);
            $methods[] = $method;
        }

        return $methods;
>>>>>>> laraxot/dev
        if (isset($v['method'])) {
            /** @var array<int, string> */
            return Arr::wrap($v['method']);
        }

        return ['get', 'post'];
    }
}
