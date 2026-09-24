<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< .merge_file_bPdaZQ
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_5TWY5l
use Spatie\QueueableAction\QueueableAction;

use function Safe\file_put_contents;
use function Safe\json_encode;

<<<<<<< .merge_file_bPdaZQ
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
use function Safe\file_put_contents;
use function Safe\json_encode;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_5TWY5l
class SaveJsonArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_bPdaZQ
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
=======
     * @param array<int|string, mixed> $data
>>>>>>> laraxot/dev
=======
     * @param array<int|string, mixed> $data
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  array<int|string, mixed>  $data
>>>>>>> .merge_file_5TWY5l
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
