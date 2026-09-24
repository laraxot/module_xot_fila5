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
<<<<<<< .merge_file_Cz6JY1
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
<<<<<<< .merge_file_e4HVgT
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $attributes
>>>>>>> .merge_file_FVCl3t
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $attributes
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $attributes
>>>>>>> .merge_file_sp9MWj
     */
    public function execute(object $relation, array $attributes): Model
    {
        $this->assertHasCreate($relation);

        $created = $relation->create($attributes);
<<<<<<< .merge_file_Cz6JY1
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::isInstanceOf($created, Model::class);
=======
<<<<<<< .merge_file_e4HVgT
<<<<<<< HEAD
        Assert::isInstanceOf($created, Model::class);
=======
>>>>>>> laraxot/dev
=======
        Assert::isInstanceOf($created, Model::class);
>>>>>>> .merge_file_FVCl3t
>>>>>>> laraxot/dev
=======
        Assert::isInstanceOf($created, Model::class);
>>>>>>> 3792da0d (Check & fix styling)
=======
        Assert::isInstanceOf($created, Model::class);
>>>>>>> .merge_file_sp9MWj

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
