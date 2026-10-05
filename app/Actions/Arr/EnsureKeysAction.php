<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

class EnsureKeysAction
{
    use QueueableAction;

    /**
     * @param  array<int|string, mixed>  $data
=======
     * @param  array<int|string, string|int>  $keys
     * @return array<int|string, mixed>
     */
    public function execute(array $data, array $keys): array
    {
        $stringKeys = [];
        foreach ($keys as $key) {
            $stringKeys[] = (string) $key;
        }

        return Arr::map(
            $data,
            fn (array $item) => array_replace(
                array_fill_keys($stringKeys, null),
                $item,
            ),
        );
    }
}
