<?php

<<<<<<< .merge_file_0hrBv9
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_O9A9WU
/**
 * @see https://stackoverflow.com/questions/39213022/custom-laravel-relations
 * @see https://github.com/johnnyfreeman/laravel-custom-relation
 */

<<<<<<< .merge_file_0hrBv9
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_O9A9WU
namespace Modules\Xot\Traits;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Relations\CustomRelation;
use Webmozart\Assert\Assert;

// use Illuminate\Database\Eloquent\Builder;

/**
 * Trait HasCustomRelations.
 */
<<<<<<< HEAD
// @phpstan-ignore trait.unused
=======
>>>>>>> laraxot/dev
trait HasCustomRelations
{
    public function customRelation(
        string $related,
        \Closure $baseConstraints,
        ?\Closure $eagerConstraints = null,
        ?\Closure $eagerMatcher = null,
    ): CustomRelation {
<<<<<<< HEAD
        $instance = new $related;
=======
        $instance = new $related();
>>>>>>> laraxot/dev
        // Call to an undefined method object::newQuery()
        Assert::isInstanceOf($instance, Model::class, '['.__LINE__.']['.class_basename($this).']');
        $query = $instance->newQuery();

        return new CustomRelation($query, $this, $baseConstraints, $eagerConstraints, $eagerMatcher);
    }
}
