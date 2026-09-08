<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\CollectionExport;
=======
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\CollectionExport;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
>>>>>>> c7fd73eb (.)
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
     * @param Collection<int|string, mixed>|EloquentCollection<int, Model> $collection La collezione da esportare
     * @param string $filename Nome del file Excel
     * @param string|null $transKey Chiave di traduzione per i campi
     * @param array<int, string> $fields Campi da includere nell'export
     *
     * @return BinaryFileResponse
=======
     * @param  Collection<int|string, mixed>|EloquentCollection<int, Model>  $collection  La collezione da esportare
     * @param  string  $filename  Nome del file Excel
     * @param  string|null  $transKey  Chiave di traduzione per i campi
     * @param  array<int, string>  $fields  Campi da includere nell'export
>>>>>>> c7fd73eb (.)
     */
    public function execute(
        Collection|EloquentCollection $collection,
        string $filename = 'test.xlsx',
<<<<<<< HEAD
        null|string $transKey = null,
        array $fields = [],
    ): BinaryFileResponse {
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(fn(mixed $field): string => (string) $field, array_values($fields));

        $export = new CollectionExport(
            collection: $collection,
=======
        ?string $transKey = null,
        array $fields = [],
    ): BinaryFileResponse {
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(fn (mixed $field): string => (string) $field, array_values($fields));

        /** @var Collection<int, mixed> $supportCollection */
        $supportCollection = $collection instanceof EloquentCollection
            ? Collection::make($collection->values()->all())
            : Collection::make($collection->values()->all());

        $export = new CollectionExport(
            collection: $supportCollection,
>>>>>>> c7fd73eb (.)
            transKey: $transKey,
            fields: $stringFields,
        );

        return Excel::download($export, $filename);
    }

    /**
     * Esporta una collezione in Excel utilizzando PhpSpreadsheet direttamente.
     *
<<<<<<< HEAD
     * @param Collection<int|string, mixed>|EloquentCollection<int, Model> $rows La collezione da esportare
     * @param array<int, string> $fields Campi da includere nell'export
     * @param string $filename Nome del file Excel
     *
=======
     * @param  Collection<int|string, mixed>|EloquentCollection<int, Model>  $rows  La collezione da esportare
     * @param  array<int, string>  $fields  Campi da includere nell'export
     * @param  string  $filename  Nome del file Excel
>>>>>>> c7fd73eb (.)
     * @return string Il percorso del file generato
     */
    public function executeWithSpreadsheet(Collection|EloquentCollection $rows, array $fields, string $filename): string
    {
        // Converte EloquentCollection in Support\Collection se necessario
        if ($rows instanceof EloquentCollection) {
            $rows = Collection::make($rows->toArray());
        }

<<<<<<< HEAD
        $spreadsheet = new Spreadsheet();
=======
        $spreadsheet = new Spreadsheet;
>>>>>>> c7fd73eb (.)
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
     * @param Worksheet $sheet Il foglio Excel
     * @param array<int, string> $fields I campi da utilizzare come intestazioni
=======
     * @param  Worksheet  $sheet  Il foglio Excel
     * @param  array<int, string>  $fields  I campi da utilizzare come intestazioni
>>>>>>> c7fd73eb (.)
     */
    protected function writeHeader(Worksheet $sheet, array $fields): void
    {
        foreach ($fields as $col => $field) {
<<<<<<< HEAD
            $sheet->setCellValueByColumnAndRow($col + 1, 1, $field);
=======
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1).'1', $field);
>>>>>>> c7fd73eb (.)
        }
    }

    /**
     * Scrive le righe nel foglio di lavoro.
     *
<<<<<<< HEAD
     * @param Worksheet $sheet Il foglio di lavoro
     * @param Collection<int|string, mixed> $rows I dati da scrivere
     * @param array<int, string> $fields I campi da utilizzare per le colonne
=======
     * @param  Worksheet  $sheet  Il foglio di lavoro
     * @param  Collection<int|string, mixed>  $rows  I dati da scrivere
     * @param  array<int, string>  $fields  I campi da utilizzare per le colonne
>>>>>>> c7fd73eb (.)
     */
    protected function writeRows(Worksheet $sheet, Collection $rows, array $fields): void
    {
        $row = 2;
        foreach ($rows as $data) {
            foreach ($fields as $col => $field) {
                $value = $this->extractValue($data, $field);
<<<<<<< HEAD
                $sheet->setCellValueByColumnAndRow($col + 1, $row, $value);
=======
                $sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1).(string) $row, $value);
>>>>>>> c7fd73eb (.)
            }
            $row++;
        }
    }

    /**
     * Estrae il valore da un oggetto o array usando il campo specificato.
     *
<<<<<<< HEAD
     * @param mixed $data I dati da cui estrarre il valore
     * @param string $field Il campo da estrarre
     *
=======
     * @param  mixed  $data  I dati da cui estrarre il valore
     * @param  string  $field  Il campo da estrarre
>>>>>>> c7fd73eb (.)
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
     * @param EloquentCollection<int, Model> $eloquentCollection
     * @return Collection<int|string, mixed>
=======
     * @param  EloquentCollection<int, Model>  $eloquentCollection
     * @return Collection<int, mixed>
>>>>>>> c7fd73eb (.)
     */
    protected function convertToSupportCollection(EloquentCollection $eloquentCollection): Collection
    {
        return Collection::make($eloquentCollection->toArray());
    }
}
