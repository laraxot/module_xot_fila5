<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
use Modules\Xot\Actions\Arr\SavePhpArrayAction;
=======
>>>>>>> 3792da0d (Check & fix styling)
use Spatie\QueueableAction\QueueableAction;

class SaveArrayAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_nvTmRR
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param array<int|string, mixed> $data
     *                                       =======
     * @param array<int|string, mixed> $data
     *                                       >>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int|string, mixed>  $data
>>>>>>> .merge_file_DjQjYJ
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
