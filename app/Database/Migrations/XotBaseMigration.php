<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Migrations;

use Doctrine\DBAL\Schema\Index;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration as LaravelMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeIntCastAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;

use function Safe\copy;

use Webmozart\Assert\Assert;

/**
 * Class XotBaseMigration.
 */
abstract class XotBaseMigration extends LaravelMigration
{
    use Concerns\XotBaseMigrationUuidConversion;
    protected Model $model;

    /** @var class-string<Model>|null */
    protected ?string $model_class = null;

    public function __construct()
    {
        $this->model_class ??= $this->getModelClass();
        Assert::isInstanceOf($model = app($this->model_class), Model::class);
        $this->model = $model;
    }

    /**
     * Get the model class based on the migration class name.
     *
     * @return class-string<Model>
     */
    public function getModelClass(): string
    {
        if (null !== $this->model_class) {
            return $this->model_class;
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

        $modelClass = Str::of('\Modules\\'.$mod_name.'\Models\\'.$name)
            ->replace('/', \DIRECTORY_SEPARATOR)
            ->toString();

        Assert::stringNotEmpty($modelClass);
        Assert::classExists($modelClass);
        Assert::subclassOf($modelClass, Model::class);

        /* @var class-string<Model> $modelClass */
        $this->model_class = $modelClass;

        return $modelClass;
    }

    public function getTable(): string
    {
        return $this->model->getTable();
    }

    public function getConn(): Builder
    {
        $connectionName = $this->model->getConnectionName();
        // 如果连接名是 'user' 但数据库不存在，使用默认连接
        if ('user' === $connectionName && ! DB::connection($connectionName)->getDatabaseName()) {
            $default = config('database.default');
            $connectionName = is_string($default) ? $default : 'mariadb';
        }

        return Schema::connection($connectionName);
    }

    /**
     * Commentato perché Doctrine non è supportato nativamente in Laravel.
     * Se hai bisogno di questa funzione, assicurati di installare doctrine/dbal.
     */
    // public function getSchemaManager(): AbstractSchemaManager
    // {
    //     return $this->getConn()->getConnection()->getDoctrineSchemaManager();
    // }

    /**
     * Get table details using Doctrine's schema manager.
     *
     * @throws \Doctrine\DBAL\Exception
     */
    // public function getTableDetails(): Table
    // {
    //     return $this->getSchemaManager()->listTableDetails($this->getTable());
    // }

    /**
     * Get the table indexes using Doctrine's schema manager.
     *
     * @throws \Doctrine\DBAL\Exception
     *
     * @return array<Index>
     */
    // public function getTableIndexes(): array
    // {
    //     return $this->getSchemaManager()->listTableIndexes($this->getTable());
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
        return $this->getConn()->hasTable($table ?? $this->getTable());
    }

    public function hasColumn(string $column): bool
    {
        return $this->getConn()->hasColumn($this->getTable(), $column);
    }

    public function hasTable(string $table): bool
    {
        return $this->getConn()->hasTable($table);
    }

    public function getColumnType(string $column): string
    {
        try {
            return $this->getConn()->getColumnType($this->getTable(), $column);
        } catch (\Exception $e) {
            return 'not-exists';
        }
    }

    public function isColumnType(string $column, string $type): bool
    {
        return $this->hasColumn($column) && $this->getColumnType($column) === $type;
    }

    public function query(string $sql): void
    {
        $this->getConn()->getConnection()->statement($sql);
    }

    public function hasIndex(string $column): bool
    {
        $conn = $this->getConn();
        $table = $this->getTable();

        if ($conn->hasIndex($table, $column)) {
            return true;
        }

        $defaultIndexName = $table.'_'.$column.'_index';
        if ($conn->hasIndex($table, $defaultIndexName)) {
            return true;
        }

        return false;
    }

    /**
     * Check if the table has a primary key.
     */
    public function hasPrimaryKey(): bool
    {
        // Commentato perché dipende da Doctrine DBAL
        // return $this->getTableDetails()->hasPrimaryKey();
        $connection = $this->getConn()->getConnection();
        $table = $this->getTable();
        $database = $connection->getDatabaseName();

        $query = "SELECT COUNT(*) as count
              FROM information_schema.table_constraints
              WHERE table_schema = ?
              AND table_name = ?
              AND constraint_type = 'PRIMARY KEY'";

        $result = $connection->selectOne($query, [$database, $table]);

        return $this->extractPrimaryKeyCount($result) > 0;
    }

    /**
     * Drop the primary key from the table.
     */
    public function dropPrimaryKey(): void
    {
        if ('sqlite' === $this->driver()) {
            return;
        }
        $sql = 'ALTER TABLE '.$this->getTable().' DROP PRIMARY KEY;';
        $this->query($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->dropTableIfExists($this->getTable());
    }

    public function dropTableIfExists(string $table): void
    {
        $this->getConn()->dropIfExists($table);
    }

    public function renameTable(string $from, string $to): void
    {
        if ($this->tableExists($from)) {
            $this->getConn()->rename($from, $to);
        }
    }

    public function renameColumn(string $from, string $to): void
    {
        $this->getConn()->table($this->getTable(), function (Blueprint $table) use ($from, $to): void {
            $table->renameColumn($from, $to);
        });
    }

    public function tableCreate(\Closure $next, ?string $table = null): void
    {
        $tableName = $table ?? $this->getTable();
        if (! $this->tableExists($tableName)) {
            $this->getConn()->create($tableName, $next);
        }
    }

    public function tableUpdate(\Closure $next, ?string $table = null): void
    {
        $tableName = $table ?? $this->getTable();

        if (! $this->getConn()->hasTable($tableName)) {
            $this->getConn()->create($tableName, $next);

            return;
        }

        $this->getConn()->table($tableName, $next);
    }

    protected function extractPrimaryKeyCount(mixed $result): int
    {
        if (is_array($result)) {
            return isset($result['count']) ? SafeIntCastAction::cast($result['count']) : 0;
        }

        if (is_object($result)) {
            $resultAsArray = (array) $result;

            return isset($resultAsArray['count']) ? SafeIntCastAction::cast($resultAsArray['count']) : 0;
        }

        return 0;
    }

    public function updateTimestamps(Blueprint $table, bool $hasSoftDeletes = false): void
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        // Check and add each timestamp column only if it doesn't exist
        if (! $this->hasColumn('created_at')) {
            $table->timestamp('created_at')->nullable();
        }

        if (! $this->hasColumn('updated_at')) {
            $table->timestamp('updated_at')->nullable();
        }

        // Check and add foreign key columns only if they don't exist
        if (! $this->hasColumn('updated_by')) {
            $table->foreignIdFor($userClass, 'updated_by')->nullable();
        }

        if (! $this->hasColumn('created_by')) {
            $table->foreignIdFor($userClass, 'created_by')->nullable();
        }

        // Handle soft deletes
        if ($hasSoftDeletes) {
            if (! $this->hasColumn('deleted_at')) {
                $table->softDeletes();
            }
            if (! $this->hasColumn('deleted_by')) {
                $table->foreignIdFor($userClass, 'deleted_by')->nullable();
            }
        } else {
            // If soft deletes are not requested but deleted_at exists, add deleted_by
            if ($this->hasColumn('deleted_at') && ! $this->hasColumn('deleted_by')) {
                $table->foreignIdFor($userClass, 'deleted_by')->nullable();
            }
        }
    }

    public function updateUser(Blueprint $table): void
    {
        $methodName = 'updateUserKey'.Str::studly($this->model->getKeyType());
        $this->{$methodName}($table);

        if ($this->hasColumn('model_id') && 'bigint' === $this->getColumnType('model_id')) {
            $table->string('model_id', 36)->index()->change();
        }

        if ($this->hasColumn('team_id') && 'bigint' === $this->getColumnType('team_id')) {
            $table->uuid('team_id')->nullable()->change();
        }
    }

    public function updateUserKeyString(Blueprint $table): void
    {
        if (! $this->hasColumn('id')) {
            $table->uuid('id')->primary()->first();
        }

        if ($this->hasColumn('id') && 'bigint' === $this->getColumnType('id')) {
            $table->uuid('id')->change();
        }

        if ($this->hasColumn('user_id') && 'bigint' === $this->getColumnType('user_id')) {
            $table->uuid('user_id')->change();
        }
    }

    public function updateUserKeyInt(Blueprint $table): void
    {
        if (! $this->hasColumn('id')) {
            $table->id('id')->first();
        }

        if ($this->hasColumn('id') && in_array($this->getColumnType('id'), ['string', 'guid'], true)) {
            $table->renameColumn('id', 'uuid');
        }
    }

    /**
     * Get the migration connection name.
     */
    public function getConnection(): ?string
    {
        return $this->model->getConnectionName();
    }

    /**
     * Add a foreign ID column to the table based on a related model.
     */
    public function foreignIdFor(Blueprint $table, string $class, ?string $column = null): ForeignIdColumnDefinition
    {
        return $table->foreignIdFor($class, $column);
    }

    /**
     * Get the database connection driver.
     */
    protected function driver(): string
    {
        return DB::connection($this->getConnection())->getDriverName();
    }

    protected function isMysqlFamilyDriver(?string $driver = null): bool
    {
        $driver ??= $this->driver();

        return in_array($driver, ['mysql', 'mariadb'], true);
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
}
