<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\LazyCollection;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\LazyCollectionExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByLazyCollection
{
    use QueueableAction;

    /**
     * Esporta una lazy collection in Excel.
     *
<<<<<<< HEAD
<<<<<<< .merge_file_OXIxkK
<<<<<<< HEAD
     * <<<<<<< HEAD
     *
     * @param LazyCollection<int, mixed> $collection La lazy collection da esportare
     * @param string                     $filename   Nome del file Excel
     * @param array<int, string>         $fields     Campi da includere nell'export
     *                                               =======
     * @param LazyCollection<int, mixed> $collection La lazy collection da esportare
     * @param string                     $filename   Nome del file Excel
     * @param array<int, string>         $fields     Campi da includere nell'export
     *                                               >>>>>>> laraxot/dev
=======
     * @param LazyCollection<int, mixed> $collection La lazy collection da esportare
     * @param string                     $filename   Nome del file Excel
     * @param array<int, string>         $fields     Campi da includere nell'export
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  LazyCollection<int, mixed>  $collection  La lazy collection da esportare
     * @param  string  $filename  Nome del file Excel
     * @param  array<int, string>  $fields  Campi da includere nell'export
>>>>>>> .merge_file_mOqleh
=======
<<<<<<< HEAD
     * @param  LazyCollection<int, mixed>  $collection  La lazy collection da esportare
     * @param  string  $filename  Nome del file Excel
     * @param  array<int, string>  $fields  Campi da includere nell'export
=======
     * @param LazyCollection<int, mixed> $collection La lazy collection da esportare
     * @param string                     $filename   Nome del file Excel
     * @param array<int, string>         $fields     Campi da includere nell'export
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function execute(
        LazyCollection $collection,
        string $filename = 'test.xlsx',
        array $fields = [],
    ): BinaryFileResponse {
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(strval(...), array_values($fields));

        $export = new LazyCollectionExport($collection, $filename, $stringFields);

        return Excel::download($export, $filename);
    }
}
