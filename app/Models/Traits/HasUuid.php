<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Support\Str;

/**
 * Trait HasUuid.
 *
 * Adds a separate 'uuid' column that is automatically generated on creation.
 * This is NOT for using UUID as the primary key.
<<<<<<< HEAD
=======
 *
 * @phpstan-ignore trait.unused
>>>>>>> c7fd73eb (.)
 */
trait HasUuid
{
    /**
     * Boot the trait.
     */
    protected static function bootHasUuid(): void
    {
<<<<<<< HEAD
        static::creating(static function ($model): void {
=======
        static::creating(static function (self $model): void {
>>>>>>> c7fd73eb (.)
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
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
