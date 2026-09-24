<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
declare(strict_types=1);
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */
<<<<<<< .merge_file_cXZ24O
=======
>>>>>>> laraxot/dev
=======
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_YGkIQ1

namespace Modules\Xot\Actions\Model;

use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetModelClassByModelNameAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $modelName): string
    {
        Assert::isArray($morph_map = config('morph_map'));
        $modelClass = collect($morph_map)->get($modelName);
<<<<<<< .merge_file_cXZ24O
<<<<<<< HEAD
<<<<<<< HEAD
        if ($modelClass === null) {
=======
        if (null === $modelClass) {
>>>>>>> laraxot/dev
=======
        if (null === $modelClass) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($modelClass === null) {
>>>>>>> .merge_file_YGkIQ1
            return app(GetFirstModelClassByModelNameAction::class)->execute($modelName);
        }
        Assert::string($modelClass, __FILE__.':'.__LINE__.' - '.class_basename(self::class));

        return $modelClass;
    }
}
