<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
use function Safe\json_encode;
use function Safe\file_put_contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
=======
use function Safe\file_put_contents;
use function Safe\json_encode;

>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;

class SaveJsonArrayAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(array $data, string $filename): bool
    {
        $content = json_encode($data, JSON_PRETTY_PRINT);
        //if ($content === false) {
        //    return false;
        //}
=======
    /**
     * @param array<int|string, mixed> $data
     */
    public function execute(array $data, string $filename): bool
    {
        $content = json_encode($data, JSON_PRETTY_PRINT);

        // if ($content === false) {
        //    return false;
        // }
>>>>>>> c7fd73eb (.)
        return (bool) file_put_contents($filename, $content);
    }
}
