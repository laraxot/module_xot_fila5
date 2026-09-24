<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 8d801bbe (Check & fix styling)
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 8d801bbe (Check & fix styling)
namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class GetModelFieldsByModelAction
{
    use QueueableAction;

    /**
     * @return list<string>
     */
    public function execute(Model $model): array
    {
        return $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());
    }
}
