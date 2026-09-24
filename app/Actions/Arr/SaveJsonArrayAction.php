<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

<<<<<<< .merge_file_SlNWi8
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_jxIXA8
use Spatie\QueueableAction\QueueableAction;

use function Safe\file_put_contents;
use function Safe\json_encode;

<<<<<<< .merge_file_SlNWi8
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
use function Safe\file_put_contents;
use function Safe\json_encode;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_jxIXA8
class SaveJsonArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_SlNWi8
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
=======
     * @param array<int|string, mixed> $data
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int|string, mixed>  $data
>>>>>>> .merge_file_jxIXA8
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
