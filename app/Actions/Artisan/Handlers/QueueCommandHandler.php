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
<<<<<<< .merge_file_5qIWvG
<<<<<<< HEAD
        return $command === 'queue:flush';
=======
        return 'queue:flush' === $command;
>>>>>>> laraxot/dev
=======
        return 'queue:flush' === $command;
>>>>>>> .merge_file_J8dYiX
    }
}
