<?php

<<<<<<< .merge_file_GHbvLo
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_J6mMlD
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

<<<<<<< .merge_file_GHbvLo
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_J6mMlD
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
