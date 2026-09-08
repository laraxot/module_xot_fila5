<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Class MorphToManyAction.
 *
 * Handles morphToMany relationship updates for models
 */
class MorphToManyAction
{
    use QueueableAction;

<<<<<<< HEAD
=======
    /** @var Collection<int, mixed> */
>>>>>>> c7fd73eb (.)
    public Collection $res;

    /**
     * Execute the action to update morphToMany relationships.
     *
     * @param Model       $row         The model instance to update
     * @param RelationDTO $relationDTO Data transfer object containing relation information
     *
<<<<<<< HEAD
     * @throws Exception When data is not in correct format or relation is invalid
=======
     * @throws \Exception When data is not in correct format or relation is invalid
>>>>>>> c7fd73eb (.)
     */
    public function execute(Model $row, RelationDTO $relationDTO): void
    {
        Assert::isInstanceOf($relation = $relationDTO->rows, MorphToMany::class);
        $data = $relationDTO->data;
        $name = $relationDTO->name;
        $model = $row;

        if (\in_array('to', array_keys($data), false) || \in_array('from', array_keys($data), false)) {
<<<<<<< HEAD
            if (!isset($data['to'])) {
=======
            if (! isset($data['to'])) {
>>>>>>> c7fd73eb (.)
                $data['to'] = [];
            }
            $data = $data['to'];
        }

<<<<<<< HEAD
        if (!\is_array($data)) {
            throw new Exception('[' . __LINE__ . '][' . class_basename($this) . ']');
        }

        if (!Arr::isAssoc($data)) {
=======
        if (! \is_array($data)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        if (! Arr::isAssoc($data)) {
>>>>>>> c7fd73eb (.)
            $relation->sync($data);

            return;
        }

        foreach ($data as $k => $v) {
            if (\is_array($v)) {
<<<<<<< HEAD
                if (!isset($v['pivot'])) {
=======
                if (! isset($v['pivot'])) {
>>>>>>> c7fd73eb (.)
                    $v['pivot'] = [];
                }

                $relation->syncWithoutDetaching([$k => $v['pivot']]);
            }
        }
    }
}
