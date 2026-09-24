<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class SelectAction
{
    use QueueableAction;

    /**
     * Execute a select query.
     *
<<<<<<< .merge_file_b65CVG
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
=======
     * <<<<<<< .merge_file_4PMnzD
     * =======
     * <<<<<<< HEAD
     * <<<<<<< .merge_file_3M00Bo
     * >>>>>>> .merge_file_4eMRLe
     *
     * @param class-string<Model> $modelClass
=======
     * <<<<<<< HEAD
     *
     * @param class-string<Model> $modelClass
     *                                        =======
     *                                        <<<<<<< .merge_file_4PMnzD
     *                                        =======
     *                                        <<<<<<< HEAD
     *                                        <<<<<<< .merge_file_3M00Bo
     *                                        >>>>>>> .merge_file_4eMRLe
     * @param class-string<Model> $modelClass
>>>>>>> .merge_file_2P97LM
     *
     * <<<<<<< .merge_file_4PMnzD
     * =======
     * =======
     * @param class-string<Model> $modelClass
     *                                        >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
     * >>>>>>> .merge_file_4eMRLe
     *
<<<<<<< .merge_file_b65CVG
>>>>>>> laraxot/dev
=======
     * >>>>>>> laraxot/dev
     *
>>>>>>> .merge_file_2P97LM
     * @return array<mixed>
     */
    public function execute(string $modelClass, string $sql): array
    {
        /** @var Model $model */
        $model = app($modelClass);

        /** @var ConnectionInterface $connection */
        $connection = $model->getConnection();

        return $connection->select($sql);
    }
}
