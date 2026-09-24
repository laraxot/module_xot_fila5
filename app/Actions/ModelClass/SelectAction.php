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
     * <<<<<<< .merge_file_3M00Bo
     *
     * @param class-string<Model> $modelClass
     *                                        =======
     *                                        <<<<<<< .merge_file_NGxl9P
     * @param class-string<Model> $modelClass
     *                                        =======
     *                                        <<<<<<< HEAD
     * @param class-string<Model> $modelClass
     *                                        =======
     * @param class-string<Model> $modelClass
     *
     * >>>>>>> laraxot/dev
     *
     * >>>>>>> .merge_file_5oNhQo
     *
     * >>>>>>> .merge_file_vbvucT
     *
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
