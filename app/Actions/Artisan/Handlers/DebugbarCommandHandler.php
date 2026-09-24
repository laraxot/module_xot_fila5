<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan\Handlers;

use Modules\Xot\Actions\Artisan\ClearArtisanDebugbarFilesAction;
use Modules\Xot\Actions\Artisan\Contracts\CommandHandlerInterface;

/**
 * Handles debugbar-related artisan commands.
 */
class DebugbarCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        return app(ClearArtisanDebugbarFilesAction::class)->execute();
    }

    public function supports(string $command): bool
    {
<<<<<<< .merge_file_9SqwJ5
<<<<<<< HEAD
<<<<<<< HEAD
        return $command === 'debugbar:clear';
=======
<<<<<<< .merge_file_Anop3z
<<<<<<< HEAD
        return $command === 'debugbar:clear';
=======
        return 'debugbar:clear' === $command;
>>>>>>> laraxot/dev
=======
        return 'debugbar:clear' === $command;
>>>>>>> .merge_file_r5Obyv
>>>>>>> laraxot/dev
=======
        return 'debugbar:clear' === $command;
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return $command === 'debugbar:clear';
>>>>>>> .merge_file_dXjkO1
    }
}
