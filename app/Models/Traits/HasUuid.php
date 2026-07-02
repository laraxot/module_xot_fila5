<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Trait HasUuid.
 *
 * Adds a separate 'uuid' column that is automatically generated on creation.
 * This is NOT for using UUID as the primary key.
 */
trait HasUuid
{
    /**
     * Boot the trait.
     */
    protected static function bootHasUuid(): void
    {
        static::creating(static function (Model $model): void {
            $uuid = $model->getAttribute('uuid');
            if (null === $uuid || '' === $uuid) {
                $model->setAttribute('uuid', (string) Str::uuid());
            }
        });
    }

    /**
     * Initialize the trait.
     */
    public function initializeHasUuid(): void
    {
        $this->mergeCasts(['uuid' => 'string']);
    }
}
