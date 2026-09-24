<?php

<<<<<<< .merge_file_qNKjVS
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xrjJxA
/**
 * moved from fileservice.
 */

<<<<<<< .merge_file_qNKjVS
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_xrjJxA
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
