<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
<<<<<<< HEAD
use Modules\Xot\Actions\Model\CreateMorphToOneRelatedModelAction;
use Modules\Xot\Datas\RelationData as RelationDTO;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use Modules\Xot\Datas\RelationData as RelationDTO;
use Modules\Xot\Support\MorphToOneRelationSupport;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Spatie\QueueableAction\QueueableAction;
=======
>>>>>>> 3792da0d (Check & fix styling)

/**
 * Class MorphToOneAction.
 *
 * Handles the creation of MorphToOne relationship records.
 *
 * @template TModel of Model
 */
class MorphToOneAction
{
<<<<<<< HEAD
    use QueueableAction;
=======
    use \Spatie\QueueableAction\QueueableAction;
>>>>>>> 3792da0d (Check & fix styling)

    /**
     * Execute the action to create a MorphToOne relationship.
     *
<<<<<<< .merge_file_ZhG5qz
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Model  $model  The parent model
     * @param  RelationDTO  $relationDTO  Data transfer object containing relationship information
=======
     * @param Model       $model       The parent model
     * @param RelationDTO $relationDTO Data transfer object containing relationship information
>>>>>>> laraxot/dev
=======
     * @param Model       $model       The parent model
     * @param RelationDTO $relationDTO Data transfer object containing relationship information
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Model  $model  The parent model
     * @param  RelationDTO  $relationDTO  Data transfer object containing relationship information
>>>>>>> .merge_file_WlzXe7
     *
     * @throws \InvalidArgumentException When relation type is invalid
     */
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
        $relation = $model->{$relationDTO->name}();
        if (! is_object($relation)) {
            throw new \InvalidArgumentException('Relation must be an object.');
        }

        $data = $this->prepareData($relationDTO->data);

<<<<<<< HEAD
        app(CreateMorphToOneRelatedModelAction::class)->execute($relation, $data);
=======
        MorphToOneRelationSupport::create($relation, $data);
>>>>>>> 930f8146 (Check & fix styling)
    }

    /**
     * Prepare the data array for creation.
     *
<<<<<<< .merge_file_ZhG5qz
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data  The input data array
=======
     * @param array<string, mixed> $data The input data array
     *
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data The input data array
     *
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $data  The input data array
>>>>>>> .merge_file_WlzXe7
     * @return array<string, mixed> The prepared data array
     */
    private function prepareData(array $data): array
    {
        // Ensure the 'lang' key is set to the current locale if not provided
        if (! isset($data['lang'])) {
            $data['lang'] = App::getLocale();
        }

        // Return the prepared data
<<<<<<< HEAD
<<<<<<< .merge_file_ZhG5qz
<<<<<<< HEAD
<<<<<<< HEAD
        return array_filter($data, static fn (mixed $value) => $value !== null);
=======
        return array_filter($data, static fn (mixed $value) => null !== $value);
>>>>>>> laraxot/dev
=======
        return array_filter($data, static fn ($value) => null !== $value);
>>>>>>> 3792da0d (Check & fix styling)
=======
        return array_filter($data, static fn (mixed $value) => $value !== null);
>>>>>>> .merge_file_WlzXe7
=======
<<<<<<< HEAD
        return array_filter($data, static fn (mixed $value) => null !== $value);
=======
        return array_filter($data, static fn ($value) => null !== $value);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    }
}
