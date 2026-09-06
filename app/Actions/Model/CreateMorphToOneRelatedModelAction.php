<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\MorphToOneRelationContract;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class CreateMorphToOneRelatedModelAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
>>>>>>> 7f6cf6be (.)
     */
    public function execute(object $relation, array $attributes): Model
    {
        $this->assertHasCreate($relation);

        $created = $relation->create($attributes);
        Assert::isInstanceOf($created, Model::class);

        return $created;
    }

    /**
     * @phpstan-assert MorphToOneRelationContract $relation
     */
    private function assertHasCreate(object $relation): void
    {
        Assert::methodExists($relation, 'create');
    }
}
