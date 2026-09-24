<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Webmozart\Assert\Assert;

class FilterRelationsAction
{
    /**
<<<<<<< .merge_file_tUHPNr
<<<<<<< HEAD
     * @param  array<string, mixed>  $relations
=======
     * @param array<string, mixed> $relations
     *
>>>>>>> laraxot/dev
=======
     * <<<<<<< HEAD.
     *
     * @param array<string, mixed> $relations
     *                                        =======
     * @param array<string, mixed> $relations
     *
     * >>>>>>> laraxot/dev
     *
>>>>>>> .merge_file_BmOCKH
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
