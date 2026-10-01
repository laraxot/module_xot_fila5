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
     * @param  array<int|string, mixed>  $keys
     * @return array<int|string, mixed>
     */
    public function execute(array $data, array $keys): array
    {
        return Arr::map(
            $data,
            fn (array $item) => array_replace(
                array_fill_keys(array_map('strval', $keys), null),
                $item,
            ),
        );
    }
}
