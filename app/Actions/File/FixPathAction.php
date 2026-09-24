<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
/**
 * moved from fileservice.
 */

<<<<<<< HEAD
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
namespace Modules\Xot\Actions\File;

use Spatie\QueueableAction\QueueableAction;

class FixPathAction
{
    use QueueableAction;

    public function execute(string $path): string
    {
        return str_replace(['/', '\\'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $path);
    }
}
