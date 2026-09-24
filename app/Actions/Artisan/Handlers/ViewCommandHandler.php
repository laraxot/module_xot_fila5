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
<<<<<<< .merge_file_bKgnBZ
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_8hTgE9
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        return $command === 'viewclear';
=======
        return 'viewclear' === $command;
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        return 'viewclear' === $command;
>>>>>>> .merge_file_zxJGTI
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return 'viewclear' === $command;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_t1Br8e
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
