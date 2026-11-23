<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\CollectionExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Classe per l'esportazione di collezioni in formato Excel.
 */
class ExportXlsByCollection
{
    use QueueableAction;

    /**
     * Esporta una collezione in Excel.
     *
     * @param  Collection<int|string, mixed>|EloquentCollection<int, Model>  $collection  La collezione da esportare
     * @param  string  $filename  Nome del file Excel
     * @param  string|null  $transKey  Chiave di traduzione per i campi
     * @param  array<int|string, string>  $fields  Campi da includere: chiave intera => percorso
     *                                             (intestazione tradotta), chiave stringa => percorso con
     *                                             valore = intestazione esplicita non tradotta
     */
    public function execute(
        Collection|EloquentCollection $collection,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        array $fields = [],
    ): BinaryFileResponse {
        // Conserva le chiavi stringa: chiave = percorso data_get, valore = intestazione esplicita.
        $stringFields = $fields;
        $export = new CollectionExport(
            collection: $collection,
            transKey: $transKey,
            fields: $stringFields,
        );

        return Excel::download($export, $filename);
    }
}
