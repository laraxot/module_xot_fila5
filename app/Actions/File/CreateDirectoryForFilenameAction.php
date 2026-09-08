<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

class CreateDirectoryForFilenameAction
{
    use QueueableAction;

    public function execute(string $filename): void
    {
<<<<<<< HEAD
        if (!File::exists(\dirname($filename))) {
=======
        if (! File::exists(\dirname($filename))) {
>>>>>>> c7fd73eb (.)
            File::makeDirectory(\dirname($filename), 0o755, true, true);
        }
    }
}
