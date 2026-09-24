<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://stackoverflow.com/questions/39213022/custom-laravel-relations
 * @see https://github.com/johnnyfreeman/laravel-custom-relation
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
namespace Modules\Xot\Traits;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Relations\CustomRelation;
use Webmozart\Assert\Assert;

// use Illuminate\Database\Eloquent\Builder;

/**
 * Trait HasCustomRelations.
<<<<<<< HEAD
 */
<<<<<<< HEAD
// @phpstan-ignore trait.unused
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
 *
 * @phpstan-ignore trait.unused
 */
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
trait HasCustomRelations
{
    public function customRelation(
        string $related,
        \Closure $baseConstraints,
        ?\Closure $eagerConstraints = null,
        ?\Closure $eagerMatcher = null,
    ): CustomRelation {
<<<<<<< .merge_file_6rgRPC
<<<<<<< HEAD
<<<<<<< HEAD
        $instance = new $related;
=======
        $instance = new $related();
>>>>>>> laraxot/dev
=======
        $instance = new $related();
>>>>>>> 3792da0d (Check & fix styling)
=======
        $instance = new $related;
>>>>>>> .merge_file_qGVZY9
        // Call to an undefined method object::newQuery()
        Assert::isInstanceOf($instance, Model::class, '['.__LINE__.']['.class_basename($this).']');
        $query = $instance->newQuery();

        return new CustomRelation($query, $this, $baseConstraints, $eagerConstraints, $eagerMatcher);
    }
}
