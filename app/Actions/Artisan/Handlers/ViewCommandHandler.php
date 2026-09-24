<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan\Handlers;

use Modules\Xot\Actions\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Actions\Artisan\RunArtisanCommandAction;

/**
 * Handles view-related artisan commands.
 */
class ViewCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        return app(RunArtisanCommandAction::class)->execute('view:clear');
    }

    public function supports(string $command): bool
    {
<<<<<<< HEAD
        return $command === 'viewclear';
=======
<<<<<<< .merge_file_8hTgE9
<<<<<<< HEAD
        return $command === 'viewclear';
=======
        return 'viewclear' === $command;
>>>>>>> laraxot/dev
=======
        return 'viewclear' === $command;
>>>>>>> .merge_file_zxJGTI
>>>>>>> laraxot/dev
    }
}
