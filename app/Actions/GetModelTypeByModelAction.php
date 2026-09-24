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
namespace Modules\Xot\Actions;

use Illuminate\Support\Str;
use Modules\Xot\Contracts\ModelContract;
use Spatie\QueueableAction\QueueableAction;

class GetModelTypeByModelAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(ModelContract $modelContract): string
    {
        return Str::snake(class_basename($modelContract));
    }
}
