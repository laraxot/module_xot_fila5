<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

use Spatie\QueueableAction\QueueableAction;

<<<<<<< HEAD
/**
 * Allinea ogni riga alle chiavi attese dallo schema: le mancanti diventano null,
 * le presenti vengono conservate. Serve a mantenere il file JSON coerente con lo
 * schema del modello anche quando una riga salvata in precedenza e' incompleta.
 */
=======
>>>>>>> laraxot/dev
class EnsureKeysAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param  array<int|string, array<string, mixed>|mixed>  $data
     * @param  array<int|string, string|int>  $keys
=======
     * @param  array<int|string, string|int>  $keys
     * @param  array<int|string, array<string, mixed>>  $data
>>>>>>> laraxot/dev
     * @return array<int|string, array<string, mixed>>
     */
    public function execute(array $data, array $keys): array
    {
<<<<<<< HEAD
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
=======
        $stringKeys = [];
        foreach ($keys as $key) {
            $stringKeys[] = (string) $key;
        }

        $defaults = array_fill_keys($stringKeys, null);

        $result = [];
        foreach ($data as $index => $item) {
            $result[$index] = array_replace($defaults, $item);
>>>>>>> laraxot/dev
        }

        return $result;
    }
}
