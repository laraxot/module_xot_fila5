<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerContract;
use Modules\Xot\Services\ArtisanService;

/**
 * Handles queue-related artisan commands.
 */
class QueueCommandHandler implements CommandHandlerContract
{
    public function handle(string $moduleName = ''): string
    {
        return ArtisanService::exe('queue:flush');
    }

    public function supports(string $command): bool
    {
        return 'queue:flush' === $command;
    }
}
