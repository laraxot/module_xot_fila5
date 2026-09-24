<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
