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
<<<<<<< HEAD
        return $command === 'optimize';
<<<<<<< .merge_file_AYp2Ct
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_SU8QuX
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
>>>>>>> .merge_file_vsIwxA
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        return 'optimize' === $command;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Cb7GSf
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
