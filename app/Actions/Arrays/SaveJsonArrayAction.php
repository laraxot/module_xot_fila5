<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arrays;

<<<<<<< .merge_file_TOdUfT
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_FK8Wsu
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_tfQfVq
use Spatie\QueueableAction\QueueableAction;

use function Safe\file_put_contents;
use function Safe\json_encode;

<<<<<<< .merge_file_TOdUfT
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_9dJ2hL
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
use function Safe\file_put_contents;
use function Safe\json_encode;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
<<<<<<< .merge_file_FK8Wsu
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_9dJ2hL
=======
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_tfQfVq
class SaveJsonArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_TOdUfT
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
=======
<<<<<<< HEAD
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
=======
     * @param array<int|string, mixed> $data
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int|string, mixed>  $data
>>>>>>> .merge_file_tfQfVq
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
