<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> c7fd73eb (.)
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\QueryExport;
use Spatie\QueueableAction\QueueableAction;
// use Staudenmeir\LaravelCte\Query\Builder as CteBuilder;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByQuery
{
    use QueueableAction;

    /**
     * Esporta i risultati di una query in Excel.
     *
<<<<<<< HEAD
     * @param Builder $query Query da esportare
     * @param string $filename Nome del file Excel
     * @param array<int, string> $fields Campi da includere nell'export
     * @param int|null $limit Limite di righe da esportare
     *
     * @return BinaryFileResponse
=======
     * @param Builder<Model>     $query    Query da esportare
     * @param string             $filename Nome del file Excel
     * @param array<int, string> $fields   Campi da includere nell'export
     * @param int|null           $limit    Limite di righe da esportare
>>>>>>> c7fd73eb (.)
     */
    public function execute(
        Builder $query,
        string $filename = 'test.xlsx',
        array $fields = [],
<<<<<<< HEAD
        null|int $limit = null,
=======
        ?int $limit = null,
>>>>>>> c7fd73eb (.)
    ): BinaryFileResponse {
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(strval(...), array_values($fields));

        $export = new QueryExport(
            query: $query,
            transKey: null,
            fields: $stringFields,
        );
        // Note: QueryExport doesn't accept a limit parameter directly
        // If limit is needed, apply it to the query before passing to the exporter
<<<<<<< HEAD
        if ($limit !== null) {
=======
        if (null !== $limit) {
>>>>>>> c7fd73eb (.)
            $query->limit($limit);
        }

        return Excel::download($export, $filename);
    }
}
