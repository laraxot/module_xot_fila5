<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< .merge_file_nvHytc
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
declare(strict_types=1);

>>>>>>> .merge_file_07UzYu
>>>>>>> laraxot/dev
/**
 * Xot Seeder Helper — canonical seed-once logic (coverage perimeter under app/).
 */

<<<<<<< HEAD
=======
<<<<<<< .merge_file_nvHytc
<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_07UzYu
>>>>>>> laraxot/dev
namespace Modules\Xot\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

final class XotSeedHelper
{
    /**
     * Seed a model once per application lifetime.
     *
<<<<<<< HEAD
     * @param  class-string  $modelClass
=======
<<<<<<< .merge_file_nvHytc
     * @param  class-string  $modelClass
=======
     * @param class-string $modelClass
>>>>>>> .merge_file_07UzYu
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
                $seeder = new $seederClass;
=======
<<<<<<< .merge_file_nvHytc
                $seeder = new $seederClass;
=======
                $seeder = new $seederClass();
>>>>>>> .merge_file_07UzYu
>>>>>>> laraxot/dev

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
