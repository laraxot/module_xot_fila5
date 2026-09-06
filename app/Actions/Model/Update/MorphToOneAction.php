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
<<<<<<< HEAD
     * @param  Model  $model  The parent model
     * @param  RelationDTO  $relationDTO  Data transfer object containing relationship information
=======
     * @param Model       $model       The parent model
     * @param RelationDTO $relationDTO Data transfer object containing relationship information
>>>>>>> 7f6cf6be (.)
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
<<<<<<< HEAD
     * @param  array<string, mixed>  $data  The input data array
=======
     * @param array<string, mixed> $data The input data array
     *
>>>>>>> 7f6cf6be (.)
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
        return array_filter($data, static fn (mixed $value) => $value !== null);
=======
        return array_filter($data, static fn ($value) => null !== $value);
>>>>>>> 7f6cf6be (.)
    }
}
