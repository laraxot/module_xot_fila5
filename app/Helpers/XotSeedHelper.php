<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< .merge_file_nvHytc
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> .merge_file_07UzYu
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
/**
 * Xot Seeder Helper — canonical seed-once logic (coverage perimeter under app/).
 */

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_nvHytc
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_07UzYu
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
     * @param  class-string  $modelClass
=======
<<<<<<< .merge_file_nvHytc
     * @param  class-string  $modelClass
=======
     * @param class-string $modelClass
>>>>>>> .merge_file_07UzYu
>>>>>>> laraxot/dev
=======
     * @param  class-string  $modelClass
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
                $seeder = new $seederClass;
=======
<<<<<<< .merge_file_nvHytc
                $seeder = new $seederClass;
=======
                $seeder = new $seederClass();
>>>>>>> .merge_file_07UzYu
>>>>>>> laraxot/dev
=======
                $seeder = new $seederClass;
>>>>>>> 3792da0d (Check & fix styling)

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
