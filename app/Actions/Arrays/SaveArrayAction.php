<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arrays;

use Modules\Xot\Actions\Arr\SavePhpArrayAction;
use Spatie\QueueableAction\QueueableAction;

class SaveArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_XDD8OY
     * <<<<<<< HEAD.
     *
     * @param array<int|string, mixed> $data
     *                                       =======
<<<<<<< HEAD
     *                                       <<<<<<< .merge_file_OY9ono.
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       <<<<<<< HEAD
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       <<<<<<< .merge_file_l0wgfw
     * @param array<int|string, mixed> $data
     *                                       =======
     *                                       <<<<<<< HEAD
     * @param array<int|string, mixed> $data
     *                                       =======
     * @param array<int|string, mixed> $data
     *                                       >>>>>>> laraxot/dev
     *                                       >>>>>>> .merge_file_dp2bPs
     *                                       >>>>>>> laraxot/dev
     *                                       >>>>>>> .merge_file_6IHdiT
=======
     * @param array<int|string, mixed> $data
>>>>>>> 3792da0d (Check & fix styling)
     *                                       >>>>>>> laraxot/dev
=======
     * @param  array<int|string, mixed>  $data
>>>>>>> .merge_file_ORbYwE
     */
    public function execute(array $data, string $filename, string $format = 'php'): bool
    {
        return match ($format) {
            'json' => app(SaveJsonArrayAction::class)->execute($data, $filename),
            'php' => app(SavePhpArrayAction::class)->execute($data, $filename),
            default => throw new \InvalidArgumentException("Formato non supportato: {$format}"),
        };
    }
}
