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
