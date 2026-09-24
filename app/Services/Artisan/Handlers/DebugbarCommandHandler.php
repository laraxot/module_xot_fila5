<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Services\ArtisanService;

/**
 * Handles debugbar-related artisan commands.
 */
class DebugbarCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        return ArtisanService::debugbarClear();
    }

    public function supports(string $command): bool
    {
<<<<<<< HEAD
        return $command === 'debugbar:clear';
=======
<<<<<<< .merge_file_AyMtsX
<<<<<<< HEAD
        return $command === 'debugbar:clear';
=======
        return 'debugbar:clear' === $command;
>>>>>>> laraxot/dev
=======
        return 'debugbar:clear' === $command;
>>>>>>> .merge_file_jqVYuL
>>>>>>> laraxot/dev
    }
}
