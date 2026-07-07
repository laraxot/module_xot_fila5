<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;

use function Safe\fclose;
use function Safe\fopen;
use function Safe\fputcsv;

use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;

class ExportXlsStreamByLazyCollection
{
    use QueueableAction;

    /**
     * Esporta una LazyCollection in un file CSV streamed.
     *
     * @param LazyCollection     $data     I dati da esportare
     * @param string             $filename Nome del file CSV
     * @param string|null        $transKey Chiave di traduzione per le intestazioni
     * @param array<string>|null $_fields  Campi da includere nell'export (attualmente non utilizzato)
     */
    public function execute(
        LazyCollection $data,
        string $filename = 'test.csv',
        ?string $transKey = null,
        ?array $_fields = null,
    ): StreamedResponse {
        $headers = [
            'Content-Disposition' => 'attachment; filename='.$filename,
        ];
        $head = $this->headings($data, $transKey);

        return response()->stream(
            static function () use ($data, $head): void {
                $file = fopen('php://output', 'w+');

                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(strval(...), $head);

                fputcsv($file, $headStrings);

                foreach ($data as $key => $value) {
                    // Gestiamo sia oggetti che possono essere convertiti ad array che array diretti
<<<<<<< HEAD
                    if (\is_object($value) && method_exists($value, 'toArray')) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value->toArray();
                    } elseif (\is_array($value)) {
=======
                    if (is_object($value) && method_exists($value, 'toArray')) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value->toArray();
                    } elseif (is_array($value)) {
>>>>>>> origin/dev
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value;
                    } else {
                        // Se non è né un oggetto con toArray né un array, saltiamo
                        continue;
                    }
                    // Convertiamo tutti i valori in stringhe o null
<<<<<<< HEAD
                    $safeRowData = array_map(static function ($item) {
=======
                    $safeRowData = array_map(function ($item) {
>>>>>>> origin/dev
                        if (null === $item) {
                            return '';
                        }

<<<<<<< HEAD
                        return \is_string($item) ? $item : ((string) $item);
=======
                        return is_string($item) ? $item : ((string) $item);
>>>>>>> origin/dev
                    }, $rowData);

                    fputcsv($file, $safeRowData);
                }

                // Aggiungiamo righe vuote alla fine
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);

                fclose($file);
            },
            200,
            $headers,
        );
    }

    /**
     * Ottiene le intestazioni per l'export.
     *
     * @param LazyCollection $data     I dati da cui estrarre le intestazioni
     * @param string|null    $transKey Chiave di traduzione per le intestazioni
     *
     * @return array<string>
     */
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        $first = $data->first();
<<<<<<< HEAD
        if (! \is_array($first) && (! \is_object($first) || ! method_exists($first, 'toArray'))) {
            return []; // Ritorna intestazioni vuote se non c'è un primo elemento valido
        }

        $headArray = \is_array($first) ? $first : $first->toArray();
=======
        if (! is_array($first) && (! is_object($first) || ! method_exists($first, 'toArray'))) {
            return []; // Ritorna intestazioni vuote se non c'è un primo elemento valido
        }

        $headArray = is_array($first) ? $first : $first->toArray();
>>>>>>> origin/dev

        /**
         * @var array<string, mixed>    $headArray
         * @var Collection<int, string> $headings
         */
        $headings = collect($headArray)->keys();

        if (null !== $transKey) {
            $headings = $headings->map(static function (string $item) use ($transKey) {
                $key = $transKey.'.fields.'.$item;
                $trans = trans($key);
                if ($trans !== $key) {
<<<<<<< HEAD
                    return \is_string($trans) ? $trans : $item;
=======
                    return is_string($trans) ? $trans : $item;
>>>>>>> origin/dev
                }

                Assert::string($item1 = Str::replace('.', '_', $item), '['.__LINE__.']['.self::class.']');
                $key = $transKey.'.fields.'.$item1;
                $trans = trans($key);
                if ($trans !== $key) {
<<<<<<< HEAD
                    return \is_string($trans) ? $trans : $item;
=======
                    return is_string($trans) ? $trans : $item;
>>>>>>> origin/dev
                }

                return $item;
            });
        }

<<<<<<< HEAD
        /** @var list<string> $result */
        $result = array_values($headings->map(strval(...))->toArray());

        return $result;
=======
        $headers = array_values($headings->map(strval(...))->toArray());

        /* @var array<string> $headers */
        return $headers;
>>>>>>> origin/dev
    }
}
