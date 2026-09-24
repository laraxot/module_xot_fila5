<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Services\ArtisanService;

/**
 * Handles queue-related artisan commands.
 */
class QueueCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        return ArtisanService::exe('queue:flush');
    }

    public function supports(string $command): bool
    {
<<<<<<< .merge_file_6EjS6A
        return $command === 'queue:flush';
=======
<<<<<<< HEAD
        return $command === 'queue:flush';
=======
<<<<<<< .merge_file_erD48r
<<<<<<< HEAD
        return $command === 'queue:flush';
=======
        return 'queue:flush' === $command;
>>>>>>> laraxot/dev
=======
        return 'queue:flush' === $command;
>>>>>>> .merge_file_aKWUII
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Xfdn44
    }
}
