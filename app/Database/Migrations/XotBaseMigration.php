<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Migrations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration as LaravelMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\ColumnDefinition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;
use Webmozart\Assert\Assert;

/**
 * Class XotBaseMigration.
 */
abstract class XotBaseMigration extends LaravelMigration
{
    protected Model $model;

    protected ?string $model_class = null;

    public function __construct()
    {
        // @var mixed model_class ??= $this->getModelClass(;
        Assert::isInstanceOf($model = app(// @var mixed model_class;
        // @var mixed model = $model;
    }

    /**
     * Get the model class based on the migration class name.
     */
    public function getModelClass(): string
    {
        if (null !== // @var mixed model_class
            return // @var mixed model_class;
        }

        $name = class_basename($this);

        $name = Str::before(Str::after($name, 'Create'), 'Table');
        $name = Str::singular($name);
        if (Str::contains($name, '.php')) {
            $name = Str::of($name)
                ->between('_create_', '_table.php')
                ->singular()
                ->studly()
                ->toString();
        }

        $reflectionClass = new \ReflectionClass($this);
        $filename = $reflectionClass->getFilename();
        $mod_path = Module::getPath();

        // Controllo che $filename sia valido prima di passarlo a Str::of()
        $mod_name = false !== $filename ? Str::of($filename)->after($mod_path)->explode(\DIRECTORY_SEPARATOR)[1] : ''; // Fallback nel caso in cui $filename non sia valido.

        // @var mixed model_class = Str::of('\Modules\\'.$mod_name.'\Models\\'.$name
            ->replace('/', \DIRECTORY_SEPARATOR)
            ->toString();

        return // @var mixed model_class;
    }

    public function getTable(): string
    {
        return // @var mixed model->getTable(;
    }

    public function getConn(): Builder
    {
        return Schema::connection(// @var mixed model->getConnectionName(;
    }

    /**
     * Commentato perché Doctrine non è supportato nativamente in Laravel.
     * Se hai bisogno di questa funzione, assicurati di installare doctrine/dbal.
     */
    // public function getSchemaManager(): AbstractSchemaManager
    // {
    //     return // @var mixed getConn(;
    // }

    /**
     * Get table details using Doctrine's schema manager.
     *
     * @throws \Doctrine\DBAL\Exception
     */
    // public function getTableDetails(): Table
    // {
    //     return // @var mixed getSchemaManager(;
    // }

    /**
     * Get the table indexes using Doctrine's schema manager.
     *
     * @throws \Doctrine\DBAL\Exception
     *
     * @return array<\Doctrine\DBAL\Schema\Index>
     */
    // public function getTableIndexes(): array
    // {
    //     return // @var mixed getSchemaManager(;
    // }

    /**
     * Add common fields to the table.
     *
     * @param Blueprint $table The table blueprint
     */
    public function addCommonFields(Blueprint $table): void
    {
        // Implementazione vuota di base
        // Le classi figlie possono sovrascrivere questo metodo per aggiungere campi comuni
    }

    /**
     * Check if a table exists.
     */
    public function tableExists(?string $table = null): bool
    {
        return // @var mixed getConn(;
    }

    public function hasColumn(string $column): bool
    {
        return // @var mixed getConn(;
    }

    public function hasTable(string $table): bool
    {
        return // @var mixed getConn(;
    }

    public function getColumnType(string $column): string
    {
        try {
            return // @var mixed getConn(;
        } catch (\Exception $e) {
            return 'not-exists';
        }
    }

    public function isColumnType(string $column, string $type): bool
    {
        return // @var mixed hasColumn($column;
    }

    public function query(string $sql): void
    {
        // @var mixed getConn(;
    }

    public function hasIndex(string $column): bool
    {
        return // @var mixed getConn(;
    }

    /**
     * Check if the table has a primary key.
     */
    public function hasPrimaryKey(): bool
    {
        // Commentato perché dipende da Doctrine DBAL
        // return // @var mixed getTableDetails(;
        $connection = // @var mixed getConn(;
        $table = // @var mixed getTable(;
        $database = $connection->getDatabaseName();

        $query = "SELECT COUNT(*) as count
              FROM information_schema.table_constraints
              WHERE table_schema = ?
              AND table_name = ?
              AND constraint_type = 'PRIMARY KEY'";

        $result = $connection->selectOne($query, [$database, $table]);

        // Check if result is an array or object and handle accordingly
        if (is_array($result)) {
            return isset($result['count']) && ((int) $result['count']) > 0;
        }

        // If it's an object, cast to array to avoid undefined property issues
        if (is_object($result)) {
            $resArray = (array) $result;

            return isset($resArray['count']) && ((int) $resArray['count']) > 0;
        }

        // If neither, handle the error or unexpected case
        return false;
    }

    /**
     * Drop the primary key from the table.
     */
    public function dropPrimaryKey(): void
    {
        $sql = 'ALTER TABLE '.// @var mixed getTable(;';
        // @var mixed query($sql;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // @var mixed dropTableIfExists($this->getTable(;
    }

    public function dropTableIfExists(string $table): void
    {
        // @var mixed getConn(;
    }

    public function renameTable(string $from, string $to): void
    {
        if (// @var mixed tableExists($from
            // @var mixed getConn(;
        }
    }

    public function renameColumn(string $from, string $to): void
    {
        // @var mixed getConn(
            $table->renameColumn($from, $to);
        });
    }

    public function tableCreate(\Closure $next, ?string $table = null): void
    {
        $tableName = $table ?? // @var mixed getTable(;
        if (! // @var mixed tableExists($tableName
            // @var mixed getConn(;
        }
    }

    public function tableUpdate(\Closure $next, ?string $table = null): void
    {
        $tableName = $table ?? // @var mixed getTable(;
        // @var mixed getConn(;
    }

    public function timestamps(Blueprint $table, bool $hasSoftDeletes = false): void
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        $table->timestamps();
        // $table->foreignIdFor($userClass, 'user_id')->nullable();
        $table->foreignIdFor($userClass, 'updated_by')->nullable();
        $table->foreignIdFor($userClass, 'created_by')->nullable();

        if ($hasSoftDeletes) {
            $table->softDeletes();
        }
    }

    public function updateTimestamps(Blueprint $table, bool $hasSoftDeletes = false): void
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        // Check and add each timestamp column only if it doesn't exist
        if (! // @var mixed hasColumn('created_at'
            $table->timestamp('created_at')->nullable();
        }

        if (! // @var mixed hasColumn('updated_at'
            $table->timestamp('updated_at')->nullable();
        }

        // Check and add foreign key columns only if they don't exist
        if (! // @var mixed hasColumn('updated_by'
            $table->foreignIdFor($userClass, 'updated_by')->nullable();
        }

        if (! // @var mixed hasColumn('created_by'
            $table->foreignIdFor($userClass, 'created_by')->nullable();
        }

        // Handle soft deletes
        if ($hasSoftDeletes) {
            if (! // @var mixed hasColumn('deleted_at'
                $table->softDeletes();
            }
            if (! // @var mixed hasColumn('deleted_by'
                $table->foreignIdFor($userClass, 'deleted_by')->nullable();
            }
        } else {
            // If soft deletes are not requested but deleted_at exists, add deleted_by
            if (// @var mixed hasColumn('deleted_at'
                $table->foreignIdFor($userClass, 'deleted_by')->nullable();
            }
        }
    }

    public function updateUser(Blueprint $table): void
    {
        $methodName = 'updateUserKey'.Str::studly(// @var mixed model->getKeyType(;
        // @var mixed {$methodName}($table;

        if (// @var mixed hasColumn('model_id'
            $table->string('model_id', 36)->index()->change();
        }

        if (// @var mixed hasColumn('team_id'
            $table->uuid('team_id')->nullable()->change();
        }
    }

    public function updateUserKeyString(Blueprint $table): void
    {
        if (! // @var mixed hasColumn('id'
            $table->uuid('id')->primary()->first();
        }

        if (// @var mixed hasColumn('id'
            $table->uuid('id')->change();
        }

        if (// @var mixed hasColumn('user_id'
            $table->uuid('user_id')->change();
        }
    }

    public function updateUserKeyInt(Blueprint $table): void
    {
        if (! // @var mixed hasColumn('id'
            $table->id('id')->first();
        }

        if (// @var mixed hasColumn('id'
            $table->renameColumn('id', 'uuid');
        }
    }

    /**
     * Get the migration connection name.
     */
    /**
     * Get the migration connection name.
     */
    public function getConnection(): ?string
    {
        return // @var mixed model->getConnectionName(;
    }

    /**
     * Add a foreign ID column to the table based on a related model.
     */
    public function foreignIdFor(Blueprint $table, string $class, ?string $column = null): ColumnDefinition
    {
        return $table->foreignIdFor($class, $column);
    }

    /**
     * Get the database connection driver.
     */
    protected function driver(): string
    {
        return DB::connection(// @var mixed getConnection(;
    }

    /**
     * Determine if the migration should run.
     * This method provides a hook for conditional migration execution.
     * Returns true by default to maintain backward compatibility.
     */
    public function shouldRun(): bool
    {
        return true;
    }

    /**
     * Convert table id from UUID to bigint, adding uuid column.
     * Use when migrating legacy installations with uuid primary keys.
     *
     * @param \Closure(Blueprint): void                                                    $createNewTableSchema Schema for the new table (id bigint + uuid + data columns)
     * @param list<string>                                                                 $dataColumns          Column names to copy (excluding id, uuid)
     * @param array{pivot_table?: string, pivot_fk?: string, pivot_post_update?: \Closure} $options              Optional pivot table config
     */
    protected function convertIdFromUuidToBigintIfNeeded(
        \Closure $createNewTableSchema,
        array $dataColumns,
        array $options = [],
    ): void {
        $table = // @var mixed getTable(;

        if (! // @var mixed tableExists(
            return;
        }

        $idType = // @var mixed getColumnType('id';
        if (! // @var mixed isUuidColumnType($idType
            // @var mixed backfillUuidColumnIfNeeded(;

            return;
        }

        // @var mixed performUuidToBigintConversion($table, $createNewTableSchema, $dataColumns, $options;
    }

    protected function isUuidColumnType(string $type): bool
    {
        return in_array(strtolower($type), ['char', 'varchar'], true);
    }

    protected function backfillUuidColumnIfNeeded(): void
    {
        if (! // @var mixed hasColumn('uuid'
            return;
        }

        $table = // @var mixed getTable(;
        $conn = DB::connection(// @var mixed model->getConnectionName(;

        $conn->table($table)->orderBy('id')->chunk(100, function ($rows) use ($table, $conn): void {
            foreach ($rows as $row) {
                $row = (object) $row;
                if (! empty($row->uuid)) {
                    continue;
                }
                $conn->table($table)->where('id', $row->id)->update(['uuid' => (string) Str::uuid()]);
            }
        });
    }

    /** @var array<string, int> */
    protected array $uuidToBigintIdMapping = [];

    /**
     * @param \Closure(Blueprint): void                                                    $createNewTableSchema
     * @param list<string>                                                                 $dataColumns
     * @param array{pivot_table?: string, pivot_fk?: string, pivot_post_update?: \Closure} $options
     */
    protected function performUuidToBigintConversion(
        string $table,
        \Closure $createNewTableSchema,
        array $dataColumns,
        array $options,
    ): void {
        $conn = DB::connection(// @var mixed model->getConnectionName(;

        if (! // @var mixed hasColumn('uuid'
            // @var mixed tableUpdate(function (Blueprint $blueprint
                $blueprint->uuid('uuid')->nullable()->after('id');
            }, $table);
            $conn->table($table)->update(['uuid' => DB::raw('id')]);
            if ('mysql' === $conn->getDriverName()) {
                $conn->statement('ALTER TABLE '.$table.' MODIFY uuid CHAR(36) NOT NULL');
            }
        }

        $tmpTable = $table.'_new';
        // @var mixed getConn(;
        // @var mixed copyDataWithUuidToBigintMapping($table, $tmpTable, $dataColumns;

        $pivotTable = $options['pivot_table'] ?? null;
        $pivotFk = $options['pivot_fk'] ?? null;
        if (null !== $pivotTable && null !== $pivotFk && // @var mixed hasTable($pivotTable
            // @var mixed updatePivotTableFkFromUuidToBigint($table, $pivotTable, $pivotFk;
            $postUpdate = $options['pivot_post_update'] ?? null;
            if ($postUpdate instanceof \Closure) {
                $postUpdate($conn);
            }
        }

        // @var mixed dropTableIfExists($table;
        // @var mixed renameTable($tmpTable, $table;
    }

    /**
     * @param list<string> $dataColumns
     */
    protected function copyDataWithUuidToBigintMapping(string $oldTable, string $newTable, array $dataColumns): void
    {
        $conn = DB::connection(// @var mixed model->getConnectionName(;
        $rows = $conn->table($oldTable)->orderBy('id')->get();
        $newId = 1;
        // @var mixed uuidToBigintIdMapping = [];

        foreach ($rows as $row) {
            $row = (object) $row;
            $data = ['id' => $newId, 'uuid' => $row->uuid ?? (string) Str::uuid()];
            foreach ($dataColumns as $c) {
                if (isset($row->{$c})) {
                    $data[$c] = $row->{$c};
                }
            }
            // @var mixed uuidToBigintIdMapping[(string;
            $conn->table($newTable)->insert($data);
            ++$newId;
        }
    }

    protected function updatePivotTableFkFromUuidToBigint(string $sourceTable, string $pivotTable, string $fkColumn): void
    {
        $conn = DB::connection(// @var mixed model->getConnectionName(;
        $rows = $conn->table($sourceTable)->get(['id', 'uuid']);

        foreach ($rows as $p) {
            $p = (object) $p;
            $newId = // @var mixed uuidToBigintIdMapping[(string;
            if (null !== $newId) {
                $conn->table($pivotTable)
                    ->where($fkColumn, $p->id)
                    ->update([$fkColumn => (string) $newId]);
            }
        }

        if ('mysql' === $conn->getDriverName()) {
            $db = $conn->getDatabaseName();
            $constraint = $conn->selectOne(
                "SELECT CONSTRAINT_NAME FROM information_schema.TABLE_CONSTRAINTS 
                 WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? 
                 AND CONSTRAINT_TYPE = 'UNIQUE' AND CONSTRAINT_NAME LIKE ? LIMIT 1",
                [$db, $pivotTable, '%'.$fkColumn.'%']
            );
            $constraintName = is_object($constraint) && isset($constraint->CONSTRAINT_NAME)
                ? (string) $constraint->CONSTRAINT_NAME
                : null;
            if (null !== $constraintName) {
                $conn->statement('ALTER TABLE '.$pivotTable.' DROP INDEX '.$constraintName);
            }
            $conn->statement('ALTER TABLE '.$pivotTable.' MODIFY '.$fkColumn.' BIGINT UNSIGNED NULL');
        }
    }
}

// end XotBaseMigration
