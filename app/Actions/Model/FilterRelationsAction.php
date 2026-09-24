<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Webmozart\Assert\Assert;

class FilterRelationsAction
{
    /**
<<<<<<< HEAD
<<<<<<< .merge_file_J5ANY7
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param array<string, mixed> $relations
     *                                        =======
     * @param array<string, mixed> $relations
     *
     * >>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $relations
>>>>>>> 3792da0d (Check & fix styling)
     *
=======
     * @param  array<string, mixed>  $relations
>>>>>>> .merge_file_kG8hID
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $relations
=======
     * @param array<string, mixed> $relations
     *
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * @return array<string, Relation<Model, Model, mixed>>
     */
    public function execute(Model $_model, array $relations): array
    {
        $filtered = [];

        foreach ($relations as $name => $relation) {
            Assert::isInstanceOf($relation, Relation::class);
            $related = $relation->getRelated();
            Assert::isInstanceOf($related, Model::class);

            $className = class_basename($related);
            $filtered[$className] = $relation;
        }

        return $filtered;
    }
}
