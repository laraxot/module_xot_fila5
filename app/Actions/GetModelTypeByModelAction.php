<?php

<<<<<<< .merge_file_HsqBhm
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_rTaOCe
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

<<<<<<< .merge_file_HsqBhm
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_rTaOCe
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
