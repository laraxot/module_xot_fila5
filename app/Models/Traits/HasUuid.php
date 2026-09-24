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
 *
 * @phpstan-ignore trait.unused
=======
>>>>>>> 8d801bbe (Check & fix styling)
 */
trait HasUuid
{
    /**
<<<<<<< HEAD
     * Boot the trait.
     */
    protected static function bootHasUuid(): void
    {
        static::creating(static function (self $model): void {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    /**
=======
>>>>>>> 8d801bbe (Check & fix styling)
     * Initialize the trait.
     */
    public function initializeHasUuid(): void
    {
        $this->mergeCasts(['uuid' => 'string']);
    }
<<<<<<< HEAD
=======

    /**
     * Boot the trait.
     */
    protected static function bootHasUuid(): void
    {
        static::creating(static function ($model): void {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
>>>>>>> 8d801bbe (Check & fix styling)
}
