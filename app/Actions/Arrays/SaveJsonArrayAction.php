<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arrays;

<<<<<<< HEAD
=======
<<<<<<< .merge_file_FK8Wsu
<<<<<<< HEAD
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;

use function Safe\file_put_contents;
use function Safe\json_encode;

<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_9dJ2hL
use function Safe\file_put_contents;
use function Safe\json_encode;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< .merge_file_FK8Wsu
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_9dJ2hL
>>>>>>> laraxot/dev
class SaveJsonArrayAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
=======
<<<<<<< .merge_file_FK8Wsu
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
=======
     * @param array<int|string, mixed> $data
>>>>>>> laraxot/dev
=======
     * @param array<int|string, mixed> $data
>>>>>>> .merge_file_9dJ2hL
>>>>>>> laraxot/dev
     */
    public function execute(array $data, string $filename): bool
    {
        $content = json_encode($data, JSON_PRETTY_PRINT);

        // if ($content === false) {
        //    return false;
        // }
        return (bool) file_put_contents($filename, $content);
    }
}
