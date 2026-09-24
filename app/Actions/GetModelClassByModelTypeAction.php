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

<<<<<<< .merge_file_iEd7RU
<<<<<<< HEAD
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
=======
declare(strict_types=1);

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_NcPdX8
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
