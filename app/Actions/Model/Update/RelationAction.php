<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Model\FilterRelationsAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class RelationAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
<<<<<<< HEAD
<<<<<<< .merge_file_ANCUlH
<<<<<<< HEAD
     * <<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_uscBsq
>>>>>>> da9ae01a0 (.)
     *
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< .merge_file_uscBsq
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< HEAD
     *                                   <<<<<<< .merge_file_t0NMtp
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< .merge_file_J16tDc
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< HEAD
     * @param array<string, mixed> $data
     *                                   =======
     * @param array<string, mixed> $data
     *                                   >>>>>>> laraxot/dev
     *                                   >>>>>>> .merge_file_540y8u
     *                                   >>>>>>> .merge_file_qy9tGS
     *                                   =======
     * @param array<string, mixed> $data
     *                                   >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
<<<<<<< HEAD
     *                                   >>>>>>> .merge_file_LFPE4B
     *                                   >>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $data
>>>>>>> .merge_file_4ww6AO
=======
>>>>>>> .merge_file_LFPE4B
=======
     * @param array<string, mixed> $data
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function execute(Model $model, array $data): void
    {
        $relations = app(FilterRelationsAction::class)->execute($model, $data);
        /*
         * if ('Operation' === class_basename($model)) {
         * dddx([
         * 'basename' => class_basename($model),
         * 'model' => $model,
         * 'data' => $data,
         * 'relations' => $relations,
         * ]);
         * }
         * // */
        foreach ($relations as $relation) {
            // Ottieni il tipo di relazione dal nome della classe
            $relationClass = $relation::class;
            $relationshipType = class_basename($relationClass);

            $actionClass = __NAMESPACE__.'\\'.$relationshipType.'Action';
            Assert::object($action = app($actionClass));

            if (method_exists($action, 'execute')) {
                $action->execute($model, $relation);
            }
        }
    }
}
