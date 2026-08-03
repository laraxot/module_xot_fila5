<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Relations\Pivot as EloquentPivot;
use Modules\Xot\Database\Factories\XotBasePivotFactory;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Traits\Updater;

use function Safe\preg_match;

abstract class XotBasePivot extends EloquentPivot
{
    /**
     * @phpstan-use HasXotFactory<XotBasePivotFactory, XotBasePivot>
     */
    use HasXotFactory;

    use Updater;

    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = true;

    /** @var int */
    protected $perPage = 30;

    /** @var list<string> */
    protected $appends = [];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    public function getConnectionName(): ?string
    {
        if (isset($this->connection)) {
            return $this->normalizeConnectionName($this->connection);
        }

        // Extract module name from namespace: Modules\User\... → user
        $namespace = static::class;
        $matches = [];
        if (preg_match('/Modules\\\\(\w+)\\\\/', $namespace, $matches) === 1 && isset($matches[1])) {
            return strtolower($matches[1]);
        }

        return $this->normalizeConnectionName(parent::getConnectionName());
    }

    protected function normalizeConnectionName(string|\UnitEnum|null $connection): ?string
    {
        if ($connection instanceof \BackedEnum) {
            return (string) $connection->value;
        }

        if ($connection instanceof \UnitEnum) {
            return $connection->name;
        }

        return $connection;
    }

    protected function casts(): array
    {
        return [
            'id' => 'string', // must be string else primary key will be typed as int
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
}
