<?php

<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
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
