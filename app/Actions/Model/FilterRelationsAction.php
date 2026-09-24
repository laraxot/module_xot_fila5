<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
<<<<<<< HEAD
=======
use Spatie\QueueableAction\QueueableAction;
>>>>>>> 8d801bbe (Check & fix styling)
use Webmozart\Assert\Assert;

class FilterRelationsAction
{
<<<<<<< HEAD
    /**
<<<<<<< .merge_file_zPPeQD
     * <<<<<<< HEAD.
     *
     * @param array<string, mixed> $relations
     *                                        =======
     * @param array<string, mixed> $relations
     *
     * >>>>>>> laraxot/dev
=======
    use QueueableAction;

    /**
     * @param array<string, mixed> $relations
>>>>>>> 8d801bbe (Check & fix styling)
     *
=======
     * @param  array<string, mixed>  $relations
>>>>>>> .merge_file_DVyiK3
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
