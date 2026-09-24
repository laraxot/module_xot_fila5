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
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
