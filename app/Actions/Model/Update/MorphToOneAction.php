<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Xot\Actions\Model\CreateMorphToOneRelatedModelAction;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;

/**
 * Class MorphToOneAction.
 *
 * Handles the creation of MorphToOne relationship records.
 *
 * @template TModel of Model
 */
class MorphToOneAction
{
    use QueueableAction;

    /**
     * Execute the action to create a MorphToOne relationship.
     *
<<<<<<< .merge_file_6IPKJp
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  Model  $model  The parent model
     * @param  RelationDTO  $relationDTO  Data transfer object containing relationship information
>>>>>>> .merge_file_w13XYu
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

        app(CreateMorphToOneRelatedModelAction::class)->execute($relation, $data);
    }

    /**
     * Prepare the data array for creation.
     *
<<<<<<< .merge_file_6IPKJp
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  array<string, mixed>  $data  The input data array
>>>>>>> .merge_file_w13XYu
     * @return array<string, mixed> The prepared data array
     */
    private function prepareData(array $data): array
    {
        // Ensure the 'lang' key is set to the current locale if not provided
        if (! isset($data['lang'])) {
            $data['lang'] = App::getLocale();
        }

        // Return the prepared data
<<<<<<< .merge_file_6IPKJp
<<<<<<< HEAD
<<<<<<< HEAD
        return array_filter($data, static fn (mixed $value) => $value !== null);
=======
        return array_filter($data, static fn (mixed $value) => null !== $value);
>>>>>>> laraxot/dev
=======
        return array_filter($data, static fn ($value) => null !== $value);
>>>>>>> 8d801bbe (Check & fix styling)
=======
        return array_filter($data, static fn (mixed $value) => $value !== null);
>>>>>>> .merge_file_w13XYu
    }
}
