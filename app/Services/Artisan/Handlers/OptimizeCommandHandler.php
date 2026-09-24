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
<<<<<<< HEAD
        return $command === 'optimize';
<<<<<<< .merge_file_KUzxZv
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_kaXSCZ
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        return $command === 'optimize';
=======
        return 'optimize' === $command;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        return 'optimize' === $command;
>>>>>>> .merge_file_ZjfKZ7
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return 'optimize' === $command;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_KBGZKy
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
