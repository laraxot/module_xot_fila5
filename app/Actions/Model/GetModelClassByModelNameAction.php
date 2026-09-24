<?php

<<<<<<< HEAD
declare(strict_types=1);
<<<<<<< HEAD
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */
=======
>>>>>>> laraxot/dev
=======
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);
>>>>>>> 8d801bbe (Check & fix styling)

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
<<<<<<< HEAD
<<<<<<< HEAD
        if ($modelClass === null) {
=======
        if (null === $modelClass) {
>>>>>>> laraxot/dev
=======
        if (null === $modelClass) {
>>>>>>> 8d801bbe (Check & fix styling)
            return app(GetFirstModelClassByModelNameAction::class)->execute($modelName);
        }
        Assert::string($modelClass, __FILE__.':'.__LINE__.' - '.class_basename(self::class));

        return $modelClass;
    }
}
