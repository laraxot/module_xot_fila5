<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

use Spatie\QueueableAction\QueueableAction;

class EnsureKeysAction
{
    use QueueableAction;

    /**
     * @param  array<int|string, string|int>  $keys
     * @param  array<int|string, array<string, mixed>>  $data
     * @return array<int|string, array<string, mixed>>
     */
    public function execute(array $data, array $keys): array
    {
        $stringKeys = [];
        foreach ($keys as $key) {
            $stringKeys[] = (string) $key;
        }

        $defaults = array_fill_keys($stringKeys, null);

        $result = [];
        foreach ($data as $index => $item) {
            $result[$index] = array_replace($defaults, $item);
        }

        return $result;
    }
}
