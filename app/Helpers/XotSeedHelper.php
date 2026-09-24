<?php

<<<<<<< .merge_file_cbpc2d
<<<<<<< HEAD
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
=======
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
declare(strict_types=1);
>>>>>>> .merge_file_aoNXeL
/**
 * Xot Seeder Helper — canonical seed-once logic (coverage perimeter under app/).
 */

<<<<<<< .merge_file_cbpc2d
<<<<<<< HEAD
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
=======
declare(strict_types=1);

=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_aoNXeL
namespace Modules\Xot\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

final class XotSeedHelper
{
    /**
     * Seed a model once per application lifetime.
     *
<<<<<<< .merge_file_cbpc2d
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  class-string  $modelClass
>>>>>>> .merge_file_aoNXeL
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
<<<<<<< .merge_file_cbpc2d
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
                $seeder = new $seederClass;
>>>>>>> .merge_file_aoNXeL

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
