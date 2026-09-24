<?php

<<<<<<< .merge_file_tGswcs
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eU3lxQ
/**
 * Xot Seeder Helper — canonical seed-once logic (coverage perimeter under app/).
 */

<<<<<<< .merge_file_tGswcs
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_eU3lxQ
namespace Modules\Xot\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

final class XotSeedHelper
{
    /**
     * Seed a model once per application lifetime.
     *
     * @param  class-string  $modelClass
     */
    public static function seedModelOnce(string $modelClass): void
    {
        $cacheKey = "xot_seeder:{$modelClass}";
        if (Cache::has($cacheKey)) {
            return;
        }

        $modelInstance = app($modelClass);
        if (! $modelInstance instanceof Model) {
            return;
        }

        if ($modelInstance->newQuery()->count() > 0) {
            Cache::put($cacheKey, true, 24 * 60 * 60);

            return;
        }

        $seederClass = $modelClass.'Seeder';

        try {
            if (class_exists($seederClass)) {
                $seeder = new $seederClass;

                if ($seeder instanceof Seeder && is_callable([$seeder, 'run'])) {
                    $seeder->{'run'}();
                    Cache::put($cacheKey, true, 24 * 60 * 60);
                }
            }
        } catch (\Exception $e) {
            // Log error but don't crash
        }
    }
}
