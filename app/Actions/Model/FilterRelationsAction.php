<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Webmozart\Assert\Assert;

class FilterRelationsAction
{
    /**
     * @param  array<string, mixed>  $relations
     * @return array<string, Relation<Model, Model, mixed>>
     */
    public function execute(Model $_model, array $relations): array
    {
        $filtered = [];

<<<<<<< .merge_file_KR8Zfv
        foreach ($relations as $relation) {
=======
        foreach ($relations as $_name => $relation) {
>>>>>>> .merge_file_YClCLv
            Assert::isInstanceOf($relation, Relation::class);
            $related = $relation->getRelated();
            Assert::isInstanceOf($related, Model::class);

            $className = class_basename($related);
            $filtered[$className] = $relation;
        }

        return $filtered;
    }
}
