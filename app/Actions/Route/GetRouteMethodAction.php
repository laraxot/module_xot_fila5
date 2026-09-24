<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

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
     * @param array<string, mixed> $v
     *
     * @return array<int, string>
     */
    public function execute(array $v, ?string $namespace = null): array
    {
        if (! isset($v['method'])) {
            return ['get', 'post'];
        }

        $methods = [];
        foreach (Arr::wrap($v['method']) as $method) {
            Assert::string($method);
            $methods[] = $method;
        }

        return $methods;
    }
}
