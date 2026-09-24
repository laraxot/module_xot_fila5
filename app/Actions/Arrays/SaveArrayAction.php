<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arrays;

use Modules\Xot\Actions\Arr\SavePhpArrayAction;
use Spatie\QueueableAction\QueueableAction;

class SaveArrayAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param  array<int|string, mixed>  $data
=======
     * <<<<<<< HEAD.
     *
     * @param array<int|string, mixed> $data
     *                                       =======
     * @param array<int|string, mixed> $data
     *                                       >>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
