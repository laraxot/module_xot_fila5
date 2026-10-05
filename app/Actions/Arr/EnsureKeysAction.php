<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Arr;

<<<<<<< .merge_file_dzW1dI
use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

=======
use Spatie\QueueableAction\QueueableAction;

/**
 * Allinea ogni riga alle chiavi attese dallo schema: le mancanti diventano null,
 * le presenti vengono conservate. Serve a mantenere il file JSON coerente con lo
 * schema del modello anche quando una riga salvata in precedenza e' incompleta.
 */
>>>>>>> .merge_file_EKgVA7
class EnsureKeysAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_dzW1dI
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
=======
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
>>>>>>> .merge_file_EKgVA7
