<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
use function Safe\file_put_contents;

use Spatie\QueueableAction\QueueableAction;

=======
use Spatie\QueueableAction\QueueableAction;

/**
 * @deprecated Prefer {@see \Modules\Xot\Actions\Arr\SavePhpArrayAction} (namespace Arr).
 *             Wrapper: stessa regola one-key-per-line.
 */
>>>>>>> laraxot/dev
class SavePhpArrayAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param array<int|string, mixed> $data
     */
    public function execute(array $data, string $filename): bool
    {
        $content = "<?php\n\nreturn ".var_export($data, true).";\n";

        return (bool) file_put_contents($filename, $content);
=======
     * @param  array<int|string, mixed>  $data
     */
    public function execute(array $data, string $filename): bool
    {
        return app(\Modules\Xot\Actions\Arr\SavePhpArrayAction::class)->execute($data, $filename);
>>>>>>> laraxot/dev
    }
}
