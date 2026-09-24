<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Modules\Xot\Services\Artisan\Contracts\CommandHandlerInterface;
use Modules\Xot\Services\ArtisanService;

/**
 * Handles view-related artisan commands.
 */
class ViewCommandHandler implements CommandHandlerInterface
{
    public function handle(string $moduleName = ''): string
    {
        return ArtisanService::exe('view:clear');
    }

    public function supports(string $command): bool
    {
        return $command === 'viewclear';
<<<<<<< .merge_file_k6l0yV
=======
<<<<<<< HEAD
<<<<<<< .merge_file_BPzZWS
<<<<<<< HEAD
        return $command === 'viewclear';
=======
        return 'viewclear' === $command;
>>>>>>> laraxot/dev
=======
        return 'viewclear' === $command;
>>>>>>> .merge_file_CYw4uZ
>>>>>>> laraxot/dev
=======
        return 'viewclear' === $command;
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_D5i73i
    }
}
