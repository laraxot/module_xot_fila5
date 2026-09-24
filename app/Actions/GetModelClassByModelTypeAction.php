<?php

<<<<<<< .merge_file_aGlgB4
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ok48PX
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

<<<<<<< .merge_file_aGlgB4
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_ok48PX
namespace Modules\Xot\Actions;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetModelClassByModelTypeAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $model_type): string
    {
        $morph_map = config('morph_map');
        if (! is_array($morph_map)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        Assert::string($res = collect($morph_map)->get($model_type));

        return $res;
    }
}
