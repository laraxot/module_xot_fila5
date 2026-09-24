<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan\Handlers;

use Modules\Xot\Actions\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Actions\Artisan\RunArtisanCommandAction;

/**
 * Handles optimization-related artisan commands.
 */
class OptimizeCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        return app(RunArtisanCommandAction::class)->execute('optimize');
    }

    public function supports(string $command): bool
    {
<<<<<<< .merge_file_vAP54u
<<<<<<< HEAD
        return $command === 'optimize';
=======
=======
<<<<<<< .merge_file_9o0nF3
        return $command === 'optimize';
=======
<<<<<<< HEAD
        return $command === 'optimize';
=======
>>>>>>> .merge_file_jFUWA5
<<<<<<< .merge_file_SU8QuX
<<<<<<< HEAD
        return $command === 'optimize';
=======
        return 'optimize' === $command;
>>>>>>> laraxot/dev
=======
        return 'optimize' === $command;
>>>>>>> .merge_file_vsIwxA
>>>>>>> laraxot/dev
<<<<<<< .merge_file_vAP54u
=======
>>>>>>> .merge_file_ytryTE
>>>>>>> .merge_file_jFUWA5
    }
}
