<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan\Handlers;

use Modules\Xot\Actions\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Actions\Artisan\RunArtisanCommandAction;

/**
 * Handles queue-related artisan commands.
 */
class QueueCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        return app(RunArtisanCommandAction::class)->execute('queue:flush');
    }

    public function supports(string $command): bool
    {
<<<<<<< HEAD
        return $command === 'queue:flush';
<<<<<<< .merge_file_rew8Go
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_5qIWvG
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        return $command === 'queue:flush';
=======
        return 'queue:flush' === $command;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        return 'queue:flush' === $command;
>>>>>>> .merge_file_J8dYiX
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return 'queue:flush' === $command;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_wU98co
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
