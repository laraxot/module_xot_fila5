<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arrays;

use Spatie\QueueableAction\QueueableAction;

/**
 * @deprecated Prefer {@see \Modules\Xot\Actions\Arr\SavePhpArrayAction} (namespace Arr).
 *             Wrapper: stessa regola one-key-per-line.
 */
class SavePhpArrayAction
{
    use QueueableAction;

    /**
     * <<<<<<< .merge_file_lQfotK
     * <<<<<<< HEAD.
     *
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       <<<<<<< .merge_file_EvqBne.
     *                                       =======
     *                                       <<<<<<< .merge_file_GDeLjX.
     *                                       >>>>>>> .merge_file_PdpWSx
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       <<<<<<< HEAD
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       <<<<<<< .merge_file_lQfotK
     *                                       =======
     *                                       <<<<<<< .merge_file_EvqBne.
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       <<<<<<< HEAD
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       >>>>>>> .merge_file_PdpWSx
     *                                       <<<<<<< .merge_file_gemX0T
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       <<<<<<< HEAD
     * @param array<int|string, mixed> $data
     *                                       =======
     * @param array<int|string, mixed> $data
     *                                       >>>>>>> laraxot/dev
     *                                       >>>>>>> .merge_file_z3uypR
     *                                       >>>>>>> laraxot/dev
     *                                       >>>>>>> .merge_file_n4lYsv
     *                                       <<<<<<< .merge_file_lQfotK
     *                                       >>>>>>> laraxot/dev
     *                                       =======
     *                                       >>>>>>> laraxot/dev
     *                                       >>>>>>> .merge_file_xbdtjz
     *                                       >>>>>>> .merge_file_PdpWSx
     */
    public function execute(array $data, string $filename): bool
    {
        return app(\Modules\Xot\Actions\Arr\SavePhpArrayAction::class)->execute($data, $filename);
    }
}
