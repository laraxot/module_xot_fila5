<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Query;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

final class GetFieldnamesByTablenameAction
{
    use QueueableAction;

    /**
     * Get column names from a table with specific database connection.
     *
     * @param string      $table          Table name to get columns from
     * @param string|null $connectionName Database connection name (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return list<string>
     */
    public function execute(string $table, ?string $connectionName = null): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
        // Validate table name
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        if (empty(trim($table))) {
            throw new \InvalidArgumentException('Table name cannot be empty.');
        }

<<<<<<< HEAD
<<<<<<< HEAD
        Assert::string($connectionName ??= config('database.default'));

=======
        // Use default connection if none is provided
        Assert::string($connectionName ??= config('database.default'));

        // Validate database connection
>>>>>>> laraxot/dev
=======
        Assert::string($connectionName ??= config('database.default'));

>>>>>>> laraxot/dev
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
        // Check if table exists in the database
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        if (! Schema::connection($connectionName)->hasTable($table)) {
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, $connectionName));
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        try {
            $columns = Schema::connection($connectionName)->getColumnListing($table);

            return array_values(array_map(
                static function (mixed $column): string {
                    Assert::string($column);

                    return $column;
                },
                $columns,
            ));
<<<<<<< HEAD
=======
        // Get and return column listing
        try {
            $columns = Schema::connection($connectionName)->getColumnListing($table);

            return array_values($columns);
            // $columns = array_map('strval', $columns);
            // return array_values(array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns));
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        } catch (\Throwable $e) {
            throw new \InvalidArgumentException(sprintf('Error fetching columns from table "%s": %s', $table, $e->getMessage()));
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * Check if a given database connection is valid.
     */
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    private function isValidConnection(string $connectionName): bool
    {
        try {
            DB::connection($connectionName)->getPdo();

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
