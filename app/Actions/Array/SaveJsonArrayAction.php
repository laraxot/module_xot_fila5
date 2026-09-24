<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< .merge_file_hgGvyz
use Spatie\QueueableAction\QueueableAction;

use function Safe\file_put_contents;
use function Safe\json_encode;

=======
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;

use function Safe\file_put_contents;
use function Safe\json_encode;

=======
use function Safe\file_put_contents;
use function Safe\json_encode;

use Spatie\QueueableAction\QueueableAction;

>>>>>>> laraxot/dev
>>>>>>> .merge_file_erP9T6
class SaveJsonArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_hgGvyz
     * @param  array<int|string, mixed>  $data
=======
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> laraxot/dev
>>>>>>> .merge_file_erP9T6
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
