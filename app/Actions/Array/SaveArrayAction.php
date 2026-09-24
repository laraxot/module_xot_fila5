<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
use Modules\Xot\Actions\Arr\SavePhpArrayAction;
=======
>>>>>>> 8d801bbe (Check & fix styling)
use Spatie\QueueableAction\QueueableAction;

class SaveArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_SVIvuU
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param array<int|string, mixed> $data
     *                                       =======
     * @param array<int|string, mixed> $data
     *                                       >>>>>>> laraxot/dev
=======
     * @param array<int|string, mixed> $data
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  array<int|string, mixed>  $data
>>>>>>> .merge_file_A4zUE0
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
