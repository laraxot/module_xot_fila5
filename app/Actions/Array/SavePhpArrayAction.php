<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

use function Safe\file_put_contents;
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\VarExporter\VarExporter;
=======

use Spatie\QueueableAction\QueueableAction;
>>>>>>> c7fd73eb (.)

class SavePhpArrayAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(array $data, string $filename): bool
    {
        $exported = VarExporter::export($data);
        //$exported = var_export($data, true);
        $content = "<?php\n\ndeclare(strict_types=1);\n\nreturn " . $exported . ";\n";
=======
    /**
     * @param array<int|string, mixed> $data
     */
    public function execute(array $data, string $filename): bool
    {
        $content = "<?php\n\nreturn ".var_export($data, true).";\n";

>>>>>>> c7fd73eb (.)
        return (bool) file_put_contents($filename, $content);
    }
}
