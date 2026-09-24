<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

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

    /** @var Collection<int, mixed> */
    public Collection $res;

    /**
     * Execute the action to update morphToMany relationships.
     *
<<<<<<< HEAD
     * <<<<<<< .merge_file_dzY4dg
     *
     * @param Model       $row         The model instance to update
     * @param RelationDTO $relationDTO Data transfer object containing relation information
     *                                 =======
     *                                 <<<<<<< .merge_file_1igvWF
     * @param Model       $row         The model instance to update
     * @param RelationDTO $relationDTO Data transfer object containing relation information
     *                                 =======
     *                                 <<<<<<< HEAD
     * @param Model       $row         The model instance to update
     * @param RelationDTO $relationDTO Data transfer object containing relation information
     *                                 =======
     * @param Model       $row         The model instance to update
     * @param RelationDTO $relationDTO Data transfer object containing relation information
     *                                 >>>>>>> laraxot/dev
     *                                 >>>>>>> .merge_file_P67EmK
     *                                 >>>>>>> .merge_file_gZmuQG
=======
     * @param  Model  $row  The model instance to update
     * @param  RelationDTO  $relationDTO  Data transfer object containing relation information
>>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
     * @throws \Exception When data is not in correct format or relation is invalid
     */
    public function execute(Model $row, RelationDTO $relationDTO): void
    {
        Assert::isInstanceOf($relation = $relationDTO->rows, MorphToMany::class);
        $data = $relationDTO->data;
        $name = $relationDTO->name;
        $model = $row;

        if (\in_array('to', array_keys($data), false) || \in_array('from', array_keys($data), false)) {
            if (! isset($data['to'])) {
                $data['to'] = [];
            }
            $data = $data['to'];
        }

        if (! \is_array($data)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        if (! Arr::isAssoc($data)) {
            $relation->sync($data);

            return;
        }

        foreach ($data as $k => $v) {
            if (\is_array($v)) {
                if (! isset($v['pivot'])) {
                    $v['pivot'] = [];
                }

                $relation->syncWithoutDetaching([$k => $v['pivot']]);
            }
        }
    }
}
