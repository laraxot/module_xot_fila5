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
<<<<<<< .merge_file_Cz6JY1
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_e4HVgT
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $attributes
>>>>>>> .merge_file_FVCl3t
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $attributes
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $attributes
>>>>>>> .merge_file_sp9MWj
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function execute(object $relation, array $attributes): Model
    {
        $this->assertHasCreate($relation);

        $created = $relation->create($attributes);
<<<<<<< HEAD
<<<<<<< .merge_file_Cz6JY1
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::isInstanceOf($created, Model::class);
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_e4HVgT
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        Assert::isInstanceOf($created, Model::class);
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        Assert::isInstanceOf($created, Model::class);
>>>>>>> .merge_file_FVCl3t
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        Assert::isInstanceOf($created, Model::class);
>>>>>>> 3792da0d (Check & fix styling)
=======
        Assert::isInstanceOf($created, Model::class);
>>>>>>> .merge_file_sp9MWj
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

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
