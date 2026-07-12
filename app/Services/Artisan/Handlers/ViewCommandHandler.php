<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerContract;
use Modules\Xot\Services\ArtisanService;

/**
 * Handles view-related artisan commands.
 */
class ViewCommandHandler implements CommandHandlerContract
{
    public function handle(string $moduleName = ''): string
    {
        return ArtisanService::exe('view:clear');
    }

    public function supports(string $command): bool
    {
        return 'viewclear' === $command;
    }
}
