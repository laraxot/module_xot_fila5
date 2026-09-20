<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arrays;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
use function Safe\file_put_contents;

=======
/**
 * @deprecated Prefer {@see \Modules\Xot\Actions\Arr\SavePhpArrayAction} (namespace Arr).
 *             Wrapper: stessa regola one-key-per-line.
 */
>>>>>>> laraxot/dev
class SavePhpArrayAction
{
    use QueueableAction;

    /**
     * @param  array<int|string, mixed>  $data
     */
    public function execute(array $data, string $filename): bool
    {
<<<<<<< HEAD
        $content = "<?php\n\nreturn ".var_export($data, true).";\n";

        return (bool) file_put_contents($filename, $content);
=======
        return app(\Modules\Xot\Actions\Arr\SavePhpArrayAction::class)->execute($data, $filename);
>>>>>>> laraxot/dev
    }
}
