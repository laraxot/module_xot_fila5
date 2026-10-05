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
     * @param  array<array-key, array<mixed>>  $data
     * @param  array<array-key, string|int>  $keys
     * @return array<array-key, array<string, mixed>>
     */
    public function execute(array $data, array $keys): array
    {
        $defaults = [];
        foreach ($keys as $key) {
            $defaults[(string) $key] = null;
        }

        $result = [];
        foreach ($data as $key => $item) {
            $result[$key] = array_replace($defaults, $item);
        }

        return $result;
    }
}