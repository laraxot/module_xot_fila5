<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\MorphPivot as EloquentMorphPivot;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Traits\Updater;

use function Safe\preg_match;

abstract class XotBaseMorphPivot extends EloquentMorphPivot
{
    use HasXotFactory;

    use Updater;

    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

    public static $snakeAttributes = true;

    protected $perPage = 30;

    /** @var list<string> */
    protected $appends = [];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'post_id',
        'post_type',
        'related_type',
        'user_id',
        'note',
    ];

    public function getConnectionName(): ?string
    {
        if (isset($this->connection)) {
            return $this->normalizeConnectionName($this->connection);
        }

        // Extract module name from namespace: Modules\Rating\... → rating
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
