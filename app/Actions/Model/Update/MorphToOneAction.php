<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Xot\Actions\Model\CreateMorphToOneRelatedModelAction;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Modules\Xot\Actions\Model\CreateMorphToOneRelatedModelAction;
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
     * @param Model       $model       The parent model
     * @param RelationDTO $relationDTO Data transfer object containing relationship information
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
<<<<<<< HEAD
        app(CreateMorphToOneRelatedModelAction::class)->execute($relation, $data);
=======
        MorphToOneRelationSupport::create($relation, $data);
>>>>>>> 64619e34 (.)
=======
        app(CreateMorphToOneRelatedModelAction::class)->execute($relation, $data);
>>>>>>> 61938ca4 (delete .claude-audit/)
    }

    /**
     * Prepare the data array for creation.
     *
     * @param array<string, mixed> $data The input data array
     *
     * @return array<string, mixed> The prepared data array
     */
    private function prepareData(array $data): array
    {
        // Ensure the 'lang' key is set to the current locale if not provided
        if (! isset($data['lang'])) {
            $data['lang'] = App::getLocale();
        }

        // Return the prepared data
        return array_filter($data, static fn ($value) => null !== $value);
    }
}
