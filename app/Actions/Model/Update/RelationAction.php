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
     * <<<<<<< .merge_file_2CHWvK
     * <<<<<<< HEAD
     *
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< .merge_file_uscBsq
     * @param array<string, mixed> $data
     *                                   =======
     *                                   =======
     *                                   <<<<<<< HEAD
     * @param array<string, mixed> $data
     *                                   =======
     *                                   <<<<<<< .merge_file_uscBsq
     * @param array<string, mixed> $data
     *                                   =======
     *                                   >>>>>>> .merge_file_pxfsNF
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
     *                                   >>>>>>> .merge_file_LFPE4B
     *                                   <<<<<<< .merge_file_2CHWvK
     *                                   >>>>>>> laraxot/dev
     *                                   =======
     *                                   >>>>>>> laraxot/dev
     *                                   >>>>>>> .merge_file_pxfsNF
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
