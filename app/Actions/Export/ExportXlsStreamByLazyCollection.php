<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< .merge_file_4L7A92
<<<<<<< HEAD
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_SJzukM
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ojL5Fe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;
>>>>>>> .merge_file_qRVE3T
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use function Safe\fclose;
use function Safe\fopen;
use function Safe\fputcsv;

<<<<<<< HEAD
<<<<<<< .merge_file_4L7A92
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_SJzukM
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_ojL5Fe
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< .merge_file_SJzukM
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ojL5Fe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_qRVE3T
=======
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
class ExportXlsStreamByLazyCollection
{
    use QueueableAction;

    /**
     * Esporta una LazyCollection in un file CSV streamed.
     *
<<<<<<< HEAD
<<<<<<< .merge_file_4L7A92
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_SJzukM
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_qRVE3T
     * @param  LazyCollection<int, mixed>  $data  I dati da esportare
     * @param  string  $filename  Nome del file CSV
     * @param  string|null  $transKey  Chiave di traduzione per le intestazioni
     * @param  array<string>|null  $_fields  Campi da includere nell'export (attualmente non utilizzato)
<<<<<<< .merge_file_4L7A92
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ojL5Fe
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @param LazyCollection<int, mixed> $data     I dati da esportare
     * @param string                     $filename Nome del file CSV
     * @param string|null                $transKey Chiave di traduzione per le intestazioni
     * @param array<string>|null         $_fields  Campi da includere nell'export (attualmente non utilizzato)
<<<<<<< HEAD
<<<<<<< .merge_file_SJzukM
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ojL5Fe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_qRVE3T
=======
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
                    if (is_object($value) && method_exists($value, 'toArray')) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value->toArray();
                    } elseif (is_array($value)) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value;
                    } else {
                        // Se non è né un oggetto con toArray né un array, saltiamo
                        continue;
                    }
                    // Convertiamo tutti i valori in stringhe o null
<<<<<<< HEAD
                    $safeRowData = array_map(function (string|int|float|bool|null $item) {
<<<<<<< HEAD
                        if ($item === null) {
<<<<<<< .merge_file_4L7A92
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_SJzukM
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
                        if ($item === null) {
=======
                        if (null === $item) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                        if (null === $item) {
>>>>>>> .merge_file_ojL5Fe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                    $safeRowData = array_map(function ($item) {
                        if (null === $item) {
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_qRVE3T
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                            return '';
                        }

                        return is_string($item) ? $item : ((string) $item);
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
<<<<<<< HEAD
<<<<<<< .merge_file_4L7A92
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  LazyCollection<int, mixed>  $data  I dati da cui estrarre le intestazioni
     * @param  string|null  $transKey  Chiave di traduzione per le intestazioni
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_SJzukM
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  LazyCollection<int, mixed>  $data  I dati da cui estrarre le intestazioni
     * @param  string|null  $transKey  Chiave di traduzione per le intestazioni
=======
     * @param LazyCollection<int, mixed> $data     I dati da cui estrarre le intestazioni
     * @param string|null                $transKey Chiave di traduzione per le intestazioni
     *
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param LazyCollection<int, mixed> $data     I dati da cui estrarre le intestazioni
     * @param string|null                $transKey Chiave di traduzione per le intestazioni
     *
>>>>>>> .merge_file_ojL5Fe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param LazyCollection<int, mixed> $data     I dati da cui estrarre le intestazioni
     * @param string|null                $transKey Chiave di traduzione per le intestazioni
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  LazyCollection<int, mixed>  $data  I dati da cui estrarre le intestazioni
     * @param  string|null  $transKey  Chiave di traduzione per le intestazioni
>>>>>>> .merge_file_qRVE3T
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<string>
     */
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        $first = $data->first();
        if (! is_array($first) && (! is_object($first) || ! method_exists($first, 'toArray'))) {
            return []; // Ritorna intestazioni vuote se non c'è un primo elemento valido
        }

        $headArray = is_array($first) ? $first : $first->toArray();

        /**
<<<<<<< HEAD
<<<<<<< .merge_file_4L7A92
<<<<<<< HEAD
<<<<<<< HEAD
         * @var array<string, mixed> $headArray
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_SJzukM
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
         * @var array<string, mixed> $headArray
=======
         * @var array<string, mixed>    $headArray
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
         * @var array<string, mixed>    $headArray
>>>>>>> .merge_file_ojL5Fe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
         * @var array<string, mixed>    $headArray
>>>>>>> 3792da0d (Check & fix styling)
=======
         * @var array<string, mixed> $headArray
>>>>>>> .merge_file_qRVE3T
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
         * @var Collection<int, string> $headings
         */
        $headings = collect($headArray)->keys();

<<<<<<< HEAD
<<<<<<< .merge_file_4L7A92
<<<<<<< HEAD
<<<<<<< HEAD
        if ($transKey !== null) {
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_SJzukM
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($transKey !== null) {
=======
        if (null !== $transKey) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if (null !== $transKey) {
>>>>>>> .merge_file_ojL5Fe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if (null !== $transKey) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($transKey !== null) {
>>>>>>> .merge_file_qRVE3T
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $headings = $headings->map(static function (string $item) use ($transKey) {
                $key = $transKey.'.fields.'.$item;
                $trans = trans($key);
                if ($trans !== $key) {
                    return is_string($trans) ? $trans : $item;
                }

                Assert::string($item1 = Str::replace('.', '_', $item), '['.__LINE__.']['.self::class.']');
                $key = $transKey.'.fields.'.$item1;
                $trans = trans($key);
                if ($trans !== $key) {
                    return is_string($trans) ? $trans : $item;
                }

                return $item;
            });
        }

        /** @var array<string> $headers */
        $headers = array_values($headings->map(strval(...))->toArray());

        return $headers;
    }
}
