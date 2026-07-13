<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Route;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GetCurrentRouteModuleNameAction
{
    use QueueableAction;

    public function execute(): string
    {
        $routeAction = Route::currentRouteAction();
        if (null === $routeAction) {
            throw new \RuntimeException('Current route action is not available.');
        }

        return Str::between($routeAction, 'Modules\\', '\\Http');
    }
}
