<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 8d801bbe (Check & fix styling)
/**
 * moved from fileservice.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 8d801bbe (Check & fix styling)
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
