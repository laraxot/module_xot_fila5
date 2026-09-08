<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Query;

<<<<<<< HEAD
use InvalidArgumentException;
use RuntimeException;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
=======
use Modules\Xot\Actions\Cast\SafeIntCastAction;
>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Create an index for a specific table based on a model class and columns.
 */
class CreateTableIndexByModelClassColumnsAction
{
    use QueueableAction;

    /**
     * Execute the action.
     *
     * @param class-string<Model> $modelClass fully qualified model class name
<<<<<<< HEAD
     * @param string[]            $columns    array of column names to include in the index
     *
     * @throws InvalidArgumentException|RuntimeException
=======
     * @param array<string>       $columns    array of column names to include in the index
     *
     * @throws \InvalidArgumentException|\RuntimeException
>>>>>>> c7fd73eb (.)
     */
    public function execute(string $modelClass, array $columns): bool
    {
        // Validate the model class
<<<<<<< HEAD
        if (!is_subclass_of($modelClass, Model::class)) {
            throw new InvalidArgumentException("{$modelClass} must be a subclass of " . Model::class . '.');
=======
        if (! is_subclass_of($modelClass, Model::class)) {
            throw new \InvalidArgumentException("{$modelClass} must be a subclass of ".Model::class.'.');
>>>>>>> c7fd73eb (.)
        }

        /** @var Model $modelInstance */
        $modelInstance = new $modelClass();

        $tableName = $modelInstance->getTable();
        $connectionName = $modelInstance->getConnectionName() ?? config('database.default');
<<<<<<< HEAD
        Assert::string($connectionName, __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
        // Validate the table exists
        if (!Schema::connection($connectionName)->hasTable($tableName)) {
            throw new RuntimeException("Table '{$tableName}' does not exist on connection '{$connectionName}'.");
=======
        Assert::string($connectionName, __FILE__.':'.__LINE__.' - '.class_basename(self::class));
        // Validate the table exists
        if (! Schema::connection($connectionName)->hasTable($tableName)) {
            throw new \RuntimeException("Table '{$tableName}' does not exist on connection '{$connectionName}'.");
>>>>>>> c7fd73eb (.)
        }

        // Validate the columns exist
        $this->validateColumnsExist($connectionName, $tableName, $columns);

        // Generate a unique index name
        $indexName = $this->generateIndexName($tableName, $columns);

        // Check if the index already exists
        if ($this->indexExists($connectionName, $tableName, $indexName)) {
            return false; // Skip creation as the index already exists
        }

        // Add the index to the table
<<<<<<< HEAD
        Schema::connection($connectionName)->table($tableName, function (Blueprint $table) use ($indexName, $columns) {
=======
        Schema::connection($connectionName)->table($tableName, function (Blueprint $table) use ($indexName, $columns): void {
>>>>>>> c7fd73eb (.)
            $table->index($columns, $indexName);
        });

        return true;
    }

    /**
     * Validate that all specified columns exist in the table.
     *
<<<<<<< HEAD
     * @param string $connectionName database connection name
     * @param string $tableName      name of the table
     * @param string[] $columns        columns to validate
     *
     * @throws RuntimeException
=======
     * @param string        $connectionName database connection name
     * @param string        $tableName      name of the table
     * @param array<string> $columns        columns to validate
     *
     * @throws \RuntimeException
>>>>>>> c7fd73eb (.)
     */
    private function validateColumnsExist(string $connectionName, string $tableName, array $columns): void
    {
        foreach ($columns as $column) {
<<<<<<< HEAD
            if (!Schema::connection($connectionName)->hasColumn($tableName, $column)) {
                throw new RuntimeException("Column '{$column}' does not exist in table '{$tableName}'.");
=======
            if (! Schema::connection($connectionName)->hasColumn($tableName, $column)) {
                throw new \RuntimeException("Column '{$column}' does not exist in table '{$tableName}'.");
>>>>>>> c7fd73eb (.)
            }
        }
    }

    /**
     * Check if an index exists in the table.
     *
     * @param string $connectionName database connection name
     * @param string $tableName      name of the table
     * @param string $indexName      name of the index
     *
     * @return bool true if the index exists, false otherwise
     */
    private function indexExists(string $connectionName, string $tableName, string $indexName): bool
    {
        $connection = DB::connection($connectionName);

        // Query to check if the index exists
        $query = '
        SELECT COUNT(*) 
        FROM information_schema.statistics 
        WHERE table_schema = ? 
        AND table_name = ? 
        AND index_name = ?;
    ';

        $formName = $connection->getDatabaseName();
        $result = $connection->selectOne($query, [$formName, $tableName, $indexName]);

<<<<<<< HEAD
        // @phpstan-ignore property.nonObject
        return $result && $result->{'COUNT(*)'} > 0;
=======
        $count = is_object($result) && isset($result->{'COUNT(*)'}) ? SafeIntCastAction::cast($result->{'COUNT(*)'}) : 0;

        return $count > 0;
>>>>>>> c7fd73eb (.)
    }

    /*
     * private function indexExists(string $connectionName, string $tableName, string $indexName): bool
     * {
     * $connection = DB::connection($connectionName);
     * $formManager = $connection->getDoctrineSchemaManager();
     * $indexes = $formManager->listTableIndexes($tableName);
     *
     * return array_key_exists($indexName, $indexes);
     * }
     */
    /**
     * Generate a unique index name based on the table and columns.
     *
<<<<<<< HEAD
     * @param string $tableName name of the table
     * @param string[] $columns   columns to include in the index
     */
    private function generateIndexName(string $tableName, array $columns): string
    {
        return $tableName . '_' . implode('_', $columns) . '_index';
=======
     * @param string        $tableName name of the table
     * @param array<string> $columns   columns to include in the index
     */
    private function generateIndexName(string $tableName, array $columns): string
    {
        return $tableName.'_'.implode('_', $columns).'_index';
>>>>>>> c7fd73eb (.)
    }
}
