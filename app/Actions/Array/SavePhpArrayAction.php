<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;

/**
 * @deprecated Prefer {@see \Modules\Xot\Actions\Arr\SavePhpArrayAction} (namespace Arr).
 *             Wrapper: stessa regola one-key-per-line.
 */
=======
use function Safe\file_put_contents;

use Spatie\QueueableAction\QueueableAction;

>>>>>>> 8d801bbe (Check & fix styling)
class SavePhpArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_QqSooE
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param array<int|string, mixed> $data
     *                                       =======
     * @param array<int|string, mixed> $data
     *                                       >>>>>>> laraxot/dev
=======
     * @param  array<int|string, mixed>  $data
>>>>>>> .merge_file_LGVqIK
     */
    public function execute(array $data, string $filename): bool
    {
        return app(\Modules\Xot\Actions\Arr\SavePhpArrayAction::class)->execute($data, $filename);
=======
     * @param array<int|string, mixed> $data
     */
    public function execute(array $data, string $filename): bool
    {
        $content = "<?php\n\nreturn ".var_export($data, true).";\n";

        return (bool) file_put_contents($filename, $content);
>>>>>>> 8d801bbe (Check & fix styling)
    }
}
