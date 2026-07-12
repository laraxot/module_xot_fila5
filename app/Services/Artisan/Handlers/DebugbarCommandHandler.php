<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerContract;
use Modules\Xot\Services\ArtisanService;

/**
 * Handles debugbar-related artisan commands.
 */
class DebugbarCommandHandler implements CommandHandlerContract
{
    public function handle(string $moduleName = ''): string
    {
        return ArtisanService::debugbarClear();
    }

    public function supports(string $command): bool
    {
        return 'debugbar:clear' === $command;
    }
}
