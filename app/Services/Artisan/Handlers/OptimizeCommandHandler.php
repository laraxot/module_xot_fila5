<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Services\ArtisanService;

/**
 * Handles optimization-related artisan commands.
 */
class OptimizeCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        return ArtisanService::exe('optimize');
    }

    public function supports(string $command): bool
    {
<<<<<<< .merge_file_GVJ63C
        return $command === 'optimize';
=======
<<<<<<< HEAD
        return $command === 'optimize';
=======
<<<<<<< .merge_file_kaXSCZ
<<<<<<< HEAD
        return $command === 'optimize';
=======
        return 'optimize' === $command;
>>>>>>> laraxot/dev
=======
        return 'optimize' === $command;
>>>>>>> .merge_file_ZjfKZ7
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mw2GES
    }
}
