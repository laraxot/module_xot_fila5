<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\CollectionExport;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Collection<int|string, mixed>|EloquentCollection<int, Model>  $collection  La collezione da esportare
     * @param  string  $filename  Nome del file Excel
     * @param  string|null  $transKey  Chiave di traduzione per i campi
     * @param  array<int|string, string>  $fields  Campi da includere: chiave intera => percorso
     *                                             (intestazione tradotta), chiave stringa => percorso con
     *                                             valore = intestazione esplicita non tradotta
=======
     * @param Collection<int|string, mixed>|EloquentCollection<int, Model> $collection La collezione da esportare
     * @param string                                                       $filename   Nome del file Excel
     * @param string|null                                                  $transKey   Chiave di traduzione per i campi
     * @param array<int|string, string>                                    $fields     Campi da includere: chiave intera => percorso
     *                                                                                 (intestazione tradotta), chiave stringa => percorso con
     *                                                                                 valore = intestazione esplicita non tradotta
>>>>>>> laraxot/dev
=======
     * @param Collection<int|string, mixed>|EloquentCollection<int, Model> $collection La collezione da esportare
     * @param string                                                       $filename   Nome del file Excel
     * @param string|null                                                  $transKey   Chiave di traduzione per i campi
     * @param array<int, string>                                           $fields     Campi da includere nell'export
>>>>>>> 8d801bbe (Check & fix styling)
     */
    public function execute(
        Collection|EloquentCollection $collection,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        array $fields = [],
    ): BinaryFileResponse {
<<<<<<< HEAD
        // Conserva le chiavi stringa: chiave = percorso data_get, valore = intestazione esplicita.
        $stringFields = $fields;
        $export = new CollectionExport(
            collection: $collection,
=======
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(fn (mixed $field): string => (string) $field, array_values($fields));

        if ($collection instanceof EloquentCollection) {
            $collection = $this->convertToSupportCollection($collection);
        }

        /** @var Collection<int, mixed> $supportCollection */
        $supportCollection = Collection::make($collection->values()->all());

        $export = new CollectionExport(
            collection: $supportCollection,
>>>>>>> 8d801bbe (Check & fix styling)
            transKey: $transKey,
            fields: $stringFields,
        );

        return Excel::download($export, $filename);
    }

    /**
     * Esporta una collezione in Excel utilizzando PhpSpreadsheet direttamente.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Collection<int|string, mixed>|EloquentCollection<int, Model>  $rows  La collezione da esportare
     * @param  array<int|string, string>  $fields  Campi da includere nell'export
     * @param  string  $filename  Nome del file Excel
=======
     * @param Collection<int|string, mixed>|EloquentCollection<int, Model> $rows     La collezione da esportare
     * @param array<int|string, string>                                    $fields   Campi da includere nell'export
     * @param string                                                       $filename Nome del file Excel
     *
>>>>>>> laraxot/dev
=======
     * @param Collection<int|string, mixed>|EloquentCollection<int, Model> $rows     La collezione da esportare
     * @param array<int, string>                                           $fields   Campi da includere nell'export
     * @param string                                                       $filename Nome del file Excel
     *
>>>>>>> 8d801bbe (Check & fix styling)
     * @return string Il percorso del file generato
     */
    public function executeWithSpreadsheet(Collection|EloquentCollection $rows, array $fields, string $filename): string
    {
        // Converte EloquentCollection in Support\Collection se necessario
        if ($rows instanceof EloquentCollection) {
            $rows = Collection::make($rows->toArray());
        }

<<<<<<< HEAD
<<<<<<< HEAD
        $spreadsheet = new Spreadsheet;
=======
        $spreadsheet = new Spreadsheet();
>>>>>>> laraxot/dev
=======
        $spreadsheet = new Spreadsheet();
>>>>>>> 8d801bbe (Check & fix styling)
        $sheet = $spreadsheet->getActiveSheet();

        $this->writeHeader($sheet, $fields);
        $this->writeRows($sheet, $rows, $fields);

        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        return $filename;
    }

    /**
     * Scrive l'intestazione nel foglio Excel.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Worksheet  $sheet  Il foglio Excel
     * @param  array<int|string, string>  $fields  I campi da utilizzare come intestazioni
=======
     * @param Worksheet                 $sheet  Il foglio Excel
     * @param array<int|string, string> $fields I campi da utilizzare come intestazioni
>>>>>>> laraxot/dev
     */
    protected function writeHeader(Worksheet $sheet, array $fields): void
    {
        foreach (array_values($fields) as $col => $field) {
=======
     * @param Worksheet          $sheet  Il foglio Excel
     * @param array<int, string> $fields I campi da utilizzare come intestazioni
     */
    protected function writeHeader(Worksheet $sheet, array $fields): void
    {
        foreach ($fields as $col => $field) {
>>>>>>> 8d801bbe (Check & fix styling)
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1).'1', $field);
        }
    }

    /**
     * Scrive le righe nel foglio di lavoro.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Worksheet  $sheet  Il foglio di lavoro
     * @param  Collection<int|string, mixed>  $rows  I dati da scrivere
     * @param  array<int|string, string>  $fields  I campi da utilizzare per le colonne
=======
     * @param Worksheet                     $sheet  Il foglio di lavoro
     * @param Collection<int|string, mixed> $rows   I dati da scrivere
     * @param array<int|string, string>     $fields I campi da utilizzare per le colonne
>>>>>>> laraxot/dev
=======
     * @param Worksheet                     $sheet  Il foglio di lavoro
     * @param Collection<int|string, mixed> $rows   I dati da scrivere
     * @param array<int, string>            $fields I campi da utilizzare per le colonne
>>>>>>> 8d801bbe (Check & fix styling)
     */
    protected function writeRows(Worksheet $sheet, Collection $rows, array $fields): void
    {
        $row = 2;
        foreach ($rows as $data) {
<<<<<<< HEAD
            $col = 0;
            foreach ($fields as $key => $field) {
                $path = \is_string($key) ? $key : $field;
                $value = $this->extractValue($data, $path);
                $sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1).(string) $row, $value);
<<<<<<< HEAD
                $col++;
            }
            $row++;
=======
                ++$col;
            }
            ++$row;
>>>>>>> laraxot/dev
=======
            foreach ($fields as $col => $field) {
                $value = $this->extractValue($data, $field);
                $sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1).(string) $row, $value);
            }
            ++$row;
>>>>>>> 8d801bbe (Check & fix styling)
        }
    }

    /**
     * Estrae il valore da un oggetto o array usando il campo specificato.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  mixed  $data  I dati da cui estrarre il valore
     * @param  string  $field  Il campo da estrarre
=======
     * @param mixed  $data  I dati da cui estrarre il valore
     * @param string $field Il campo da estrarre
     *
>>>>>>> laraxot/dev
=======
     * @param mixed  $data  I dati da cui estrarre il valore
     * @param string $field Il campo da estrarre
     *
>>>>>>> 8d801bbe (Check & fix styling)
     * @return mixed Il valore estratto
     */
    protected function extractValue(mixed $data, string $field): mixed
    {
        // Usa data_get di Laravel per accesso sicuro ai dati nidificati
        return data_get($data, $field, '');
    }

    /**
     * Converte EloquentCollection in Support\Collection mantenendo i dati.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  EloquentCollection<int, Model>  $eloquentCollection
=======
     * @param EloquentCollection<int, Model> $eloquentCollection
     *
>>>>>>> laraxot/dev
=======
     * @param EloquentCollection<int, Model> $eloquentCollection
     *
>>>>>>> 8d801bbe (Check & fix styling)
     * @return Collection<int, mixed>
     */
    protected function convertToSupportCollection(EloquentCollection $eloquentCollection): Collection
    {
        return Collection::make($eloquentCollection->toArray());
    }
}
