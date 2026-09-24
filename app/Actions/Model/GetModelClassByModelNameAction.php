<?php

<<<<<<< .merge_file_TIBcki
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

<<<<<<< HEAD
=======
>>>>>>> .merge_file_J1p5GE
declare(strict_types=1);

>>>>>>> laraxot/dev
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
<<<<<<< .merge_file_TIBcki
        if ($modelClass === null) {
=======
<<<<<<< HEAD
        if ($modelClass === null) {
=======
        if (null === $modelClass) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_J1p5GE
            return app(GetFirstModelClassByModelNameAction::class)->execute($modelName);
        }
        Assert::string($modelClass, __FILE__.':'.__LINE__.' - '.class_basename(self::class));

        return $modelClass;
    }
}
