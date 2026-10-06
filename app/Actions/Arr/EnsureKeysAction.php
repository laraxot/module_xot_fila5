<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

use Spatie\QueueableAction\QueueableAction;

/**
 * Allinea ogni riga alle chiavi attese dallo schema: le mancanti diventano null,
 * le presenti vengono conservate. Serve a mantenere il file JSON coerente con lo
 * schema del modello anche quando una riga salvata in precedenza e' incompleta.
 */
class EnsureKeysAction
{
    use QueueableAction;

    /**
     * @param  array<int|string, array<string, mixed>|mixed>  $data
     * @param  array<int|string, string|int>  $keys
     * @return array<int|string, array<string, mixed>>
     */
    public function execute(array $data, array $keys): array
    {
        $defaults = [];
        foreach ($keys as $key) {
            $defaults[(string) $key] = null;
        }

        // ponytail: use array_map instead of Arr::map for better type inference
        $template = array_fill_keys($stringKeys, null);

        $result = [];
        foreach ($data as $k => $item) {
            if (is_array($item)) {
                $result[$k] = array_replace($template, $item);
            }
        }

        return $result;
    }
}
