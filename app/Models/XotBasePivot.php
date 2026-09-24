<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\Factory;
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Relations\Pivot as EloquentPivot;
use Illuminate\Support\Carbon;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Traits\Updater;

use function Safe\preg_match;

/**
 * Base Pivot class for all modules.
 *
 * Centralizes common Pivot configurations and behaviors.
 * The $connection is automatically set based on the child class namespace.
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
 * @property string|int      $id
 * @property Carbon|null     $created_at
 * @property Carbon|null     $updated_at
 * @property Carbon|null     $deleted_at
<<<<<<< HEAD
=======
 * @property string|int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
 * @property string|int|null $created_by
 * @property string|int|null $updated_by
 * @property string|int|null $deleted_by
 */
abstract class XotBasePivot extends EloquentPivot
{
    use HasXotFactory;
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
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

    /**
     * Get the database connection for the model.
     *
     * Automatically determines connection from child class namespace.
     * Example: Modules\User\Models\MyPivot → 'user'
     */
    public function getConnectionName(): ?string
    {
        if (isset($this->connection)) {
            return $this->normalizeConnectionName($this->connection);
        }

        // Extract module name from namespace: Modules\User\... → user
        $namespace = static::class;
        $matches = [];
<<<<<<< HEAD
<<<<<<< HEAD
        if (1 === preg_match('/Modules\\\\(\w+)\\\\/', $namespace, $matches) && isset($matches[1])) {
=======
        if (preg_match('/Modules\\\\(\w+)\\\\/', $namespace, $matches) === 1 && isset($matches[1])) {
>>>>>>> laraxot/dev
=======
        if (1 === preg_match('/Modules\\\\(\w+)\\\\/', $namespace, $matches) && isset($matches[1])) {
>>>>>>> laraxot/dev
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

    /**
     * @return array<string, string>
     */
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
