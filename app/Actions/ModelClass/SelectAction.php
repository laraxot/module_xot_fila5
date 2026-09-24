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
<<<<<<< HEAD
<<<<<<< .merge_file_rD371p
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_4PMnzD
=======
>>>>>>> da9ae01a0 (.)
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
     *
     * <<<<<<< .merge_file_4PMnzD
     * =======
     * =======
     * @param class-string<Model> $modelClass
     *                                        >>>>>>> 9e11d472 (Fix merge conflicts in PHPDoc comments across multiple action classes and contracts, ensuring consistent parameter annotations and removing redundant lines.)
     *
<<<<<<< HEAD
     * >>>>>>> .merge_file_4eMRLe
     *
     * >>>>>>> laraxot/dev
=======
     * @param class-string<Model> $modelClass
>>>>>>> 3792da0d (Check & fix styling)
     *
=======
     * @param  class-string<Model>  $modelClass
>>>>>>> .merge_file_Ifwca2
=======
>>>>>>> .merge_file_4eMRLe
=======
     * @param class-string<Model> $modelClass
     *
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
