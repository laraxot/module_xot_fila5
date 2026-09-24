<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Import;

use Filament\Notifications\Notification;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Xot\Datas\ColumnData;
<<<<<<< .merge_file_zedzNt
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Ydff6S
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\ini_set;

<<<<<<< .merge_file_zedzNt
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

use function Safe\ini_set;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Ydff6S
class ImportCsvAction
{
    use QueueableAction;

    /**
     * Import a CSV file into a database table.
     *
<<<<<<< .merge_file_zedzNt
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Ydff6S
     * @param  string  $disk  the storage disk where the file is located
     * @param  string  $filename  the name of the file to import
     * @param  string  $db  the database connection name
     * @param  string  $tbl  the table name where data will be imported
<<<<<<< .merge_file_zedzNt
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
     * @param string $disk     the storage disk where the file is located
     * @param string $filename the name of the file to import
     * @param string $db       the database connection name
     * @param string $tbl      the table name where data will be imported
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Ydff6S
     *
     * @throws \Exception
     */
    public function execute(string $disk, string $filename, string $db, string $tbl): void
    {
        ini_set('max_execution_time', '0');
        ini_set('memory_limit', '-1');

        $storage = Storage::disk($disk);
        Assert::true($storage->exists($filename), "File {$filename} does not exist on disk {$disk}.");

        $path = $storage->path($filename);
        $path = Str::of($path)->replace('\\', '/')->toString();

        $conn = Schema::connection($db);
        $pdo = DB::connection($db)->getPdo();

        // Retrieve table columns
        $columns = $this->getTableColumns($conn, $tbl);

        // Prepare fields for SQL query
        $fieldsUp = $this->prepareFields($columns);
        $fieldsUpList = implode(', ', $fieldsUp);

        // Build SQL query
        $sql = $this->buildSql($path, $db, $tbl, $fieldsUpList, $columns);
        // Enable local infile
        $pdo->exec('SET GLOBAL local_infile=1;');

        // Execute the SQL query
        $nRows = $pdo->exec($sql);

        // Send success notification
        Notification::make()
            ->title('Import successful')
            ->success()
            ->body("{$nRows} records imported successfully.")
            ->persistent()
            ->send();
    }

    /**
     * Get table columns excluding certain fields.
     *
<<<<<<< HEAD
     * @return array<int, ColumnData>
=======
     * @return array<ColumnData>
>>>>>>> 3792da0d (Check & fix styling)
     */
    private function getTableColumns(Builder $conn, string $tbl): array
    {
        $columns = $conn->getColumnListing($tbl);
        $excludedColumns = ['id'];

        return array_map(
<<<<<<< HEAD
            function (string $column) use ($conn, $tbl) {
=======
            function ($column) use ($conn, $tbl) {
                /** @var string $column */
>>>>>>> 3792da0d (Check & fix styling)
                $type = $conn->getColumnType($tbl, $column);

                return new ColumnData(
                    name: $column,
                    type: $type,
                );
            },
            array_diff($columns, $excludedColumns),
        );
    }

    /**
     * Prepare fields for the SQL query.
     *
<<<<<<< .merge_file_zedzNt
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int, ColumnData>  $columns
=======
     * @param array<int, ColumnData> $columns
     *
>>>>>>> laraxot/dev
=======
     * @param array<ColumnData> $columns
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int, ColumnData>  $columns
>>>>>>> .merge_file_Ydff6S
     * @return array<string>
     */
    private function prepareFields(array $columns): array
    {
        return array_map(
<<<<<<< .merge_file_zedzNt
<<<<<<< HEAD
<<<<<<< HEAD
            fn (ColumnData $column) => $column->type === 'decimal' ? '@'.$column->name : $column->name,
=======
            fn (ColumnData $column) => 'decimal' === $column->type ? '@'.$column->name : $column->name,
>>>>>>> laraxot/dev
=======
            fn (ColumnData $column) => 'decimal' === $column->type ? '@'.$column->name : $column->name,
>>>>>>> 3792da0d (Check & fix styling)
=======
            fn (ColumnData $column) => $column->type === 'decimal' ? '@'.$column->name : $column->name,
>>>>>>> .merge_file_Ydff6S
            $columns,
        );
    }

    /**
     * Build the SQL query for importing data.
     *
<<<<<<< .merge_file_zedzNt
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int, ColumnData>  $columns
=======
     * @param array<int, ColumnData> $columns
>>>>>>> laraxot/dev
=======
     * @param array<ColumnData> $columns
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int, ColumnData>  $columns
>>>>>>> .merge_file_Ydff6S
     */
    private function buildSql(string $path, string $db, string $tbl, string $fieldsUpList, array $columns): string
    {
        $sql =
            "LOAD DATA LOW_PRIORITY LOCAL INFILE '{$path}' ".
            "INTO TABLE `{$db}`.`{$tbl}` CHARACTER SET latin1 ".
            "FIELDS TERMINATED BY ';' OPTIONALLY ENCLOSED BY '".
            '"'.
            "' ".
            "ESCAPED BY '".
            '"'.
            "' ".
            "LINES TERMINATED BY '\r\n' ({$fieldsUpList})";

        $sqlReplace = [];
        foreach ($columns as $column) {
<<<<<<< .merge_file_zedzNt
<<<<<<< HEAD
<<<<<<< HEAD
            if ($column->type === 'decimal') {
=======
            if ('decimal' === $column->type) {
>>>>>>> laraxot/dev
=======
            if ('decimal' === $column->type) {
>>>>>>> 3792da0d (Check & fix styling)
=======
            if ($column->type === 'decimal') {
>>>>>>> .merge_file_Ydff6S
                $sqlReplace[] = "{$column->name} = REPLACE(@{$column->name}, ',', '.')";
            }
        }

        if (! empty($sqlReplace)) {
            $sql .= ' SET '.implode(', ', $sqlReplace).';';
        }

        return $sql;
    }
<<<<<<< .merge_file_zedzNt
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)

    /**
     * Transform columns into ColumnData objects.
     *
     * @param array<string> $columns
     *
     * @return array<ColumnData>
     *
     * @deprecated this method is currently unused but kept for future expansion
     *
     * @phpstan-ignore method.unused
     */
    private function transformColumnsToColumnData(array $columns): array
    {
        return array_map(
            function (string $column): ColumnData {
                return new ColumnData(
                    name: $column,
                    type: 'string', // Default type, modify if necessary
                );
            },
            $columns,
        );
    }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Ydff6S
}
