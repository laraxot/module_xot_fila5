<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Migrations\Concerns;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

use function Safe\copy;

trait XotBaseMigrationUuidConversion
{
    /**
     * @param \Closure(Blueprint): void                                                    $createNewTableSchema
     * @param list<string>                                                                 $dataColumns
     * @param array{pivot_table?: string, pivot_fk?: string, pivot_post_update?: \Closure} $options
     */
    protected function convertIdFromUuidToBigintIfNeeded(
        \Closure $createNewTableSchema,
        array $dataColumns,
        array $options = [],
    ): void {
        $table = $this->getTable();

        if (! $this->tableExists()) {
            return;
        }

        $idType = $this->getColumnType('id');
        if (! $this->isUuidColumnType($idType)) {
            $this->backfillUuidColumnIfNeeded();

            return;
        }

        /** @var list<string> $typedDataColumns */
        $typedDataColumns = array_values($dataColumns);
        /** @var array<string, mixed> $typedOptions */
        $typedOptions = $options;

        $this->performUuidToBigintConversion($table, $createNewTableSchema, $typedDataColumns, $typedOptions);
    }

    protected function isUuidColumnType(string $type): bool
    {
        return in_array(strtolower($type), ['char', 'varchar'], true);
    }

    protected function backfillUuidColumnIfNeeded(): void
    {
        if (! $this->hasColumn('uuid')) {
            return;
        }

        $table = $this->getTable();
        $conn = DB::connection($this->model->getConnectionName());

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
        $conn = DB::connection($this->model->getConnectionName());

        if (! $this->hasColumn('uuid')) {
            $this->tableUpdate(function (Blueprint $blueprint): void {
                $blueprint->uuid('uuid')->nullable()->after('id');
            }, $table);
            $conn->table($table)->update(['uuid' => DB::raw('id')]);
            if ($this->isMysqlFamilyDriver($conn->getDriverName())) {
                $conn->statement('ALTER TABLE '.$table.' MODIFY uuid CHAR(36) NOT NULL');
            }
        }

        $tmpTable = $table.'_new';
        $this->getConn()->create($tmpTable, $createNewTableSchema);
        $this->copyDataWithUuidToBigintMapping($table, $tmpTable, $dataColumns);

        $pivotTable = $options['pivot_table'] ?? null;
        $pivotFk = $options['pivot_fk'] ?? null;
        if (null !== $pivotTable && null !== $pivotFk && $this->hasTable($pivotTable)) {
            $this->updatePivotTableFkFromUuidToBigint($table, $pivotTable, $pivotFk);
            $postUpdate = $options['pivot_post_update'] ?? null;
            if ($postUpdate instanceof \Closure) {
                $postUpdate($conn);
            }
        }

        $this->dropTableIfExists($table);
        $this->renameTable($tmpTable, $table);
    }

    /**
     * @param list<string> $dataColumns
     */
    protected function copyDataWithUuidToBigintMapping(string $oldTable, string $newTable, array $dataColumns): void
    {
        $conn = DB::connection($this->model->getConnectionName());
        $rows = $conn->table($oldTable)->orderBy('id')->get();
        $newId = 1;
        $this->uuidToBigintIdMapping = [];

        foreach ($rows as $row) {
            $row = (object) $row;
            $data = ['id' => $newId, 'uuid' => $row->uuid ?? (string) Str::uuid()];
            foreach ($dataColumns as $c) {
                if (isset($row->{$c})) {
                    $data[$c] = $row->{$c};
                }
            }
            $this->uuidToBigintIdMapping[SafeStringCastAction::cast($row->id)] = $newId;
            $conn->table($newTable)->insert($data);
            ++$newId;
        }
    }

    protected function updatePivotTableFkFromUuidToBigint(string $sourceTable, string $pivotTable, string $fkColumn): void
    {
        $conn = DB::connection($this->model->getConnectionName());
        $rows = $conn->table($sourceTable)->get(['id', 'uuid']);

        foreach ($rows as $p) {
            $p = (object) $p;
            $newId = $this->uuidToBigintIdMapping[SafeStringCastAction::cast($p->id)] ?? null;
            if (null !== $newId) {
                $conn->table($pivotTable)
                    ->where($fkColumn, $p->id)
                    ->update([$fkColumn => SafeStringCastAction::cast($newId)]);
            }
        }

        if ($this->isMysqlFamilyDriver($conn->getDriverName())) {
            $db = $conn->getDatabaseName();
            $constraint = $conn->selectOne(
                "SELECT CONSTRAINT_NAME FROM information_schema.TABLE_CONSTRAINTS 
                 WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? 
                 AND CONSTRAINT_TYPE = 'UNIQUE' AND CONSTRAINT_NAME LIKE ? LIMIT 1",
                [$db, $pivotTable, '%'.$fkColumn.'%']
            );
            $constraintName = is_object($constraint) && isset($constraint->CONSTRAINT_NAME)
                ? SafeStringCastAction::cast($constraint->CONSTRAINT_NAME)
                : null;
            if (null !== $constraintName) {
                $conn->statement('ALTER TABLE '.$pivotTable.' DROP INDEX '.$constraintName);
            }
            $conn->statement('ALTER TABLE '.$pivotTable.' MODIFY '.$fkColumn.' BIGINT UNSIGNED NULL');
        }
    }
}
