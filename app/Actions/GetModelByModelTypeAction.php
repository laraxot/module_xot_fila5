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

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetModelByModelTypeAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $model_type, ?string $model_id): Model
    {
        $model_class = app(GetModelClassByModelTypeAction::class)->execute($model_type);
        Assert::stringNotEmpty($model_class);
        Assert::classExists($model_class);
        Assert::isAOf($model_class, Model::class);

        /** @var class-string<Model> $model_class */
<<<<<<< .merge_file_wPuGZt
<<<<<<< HEAD
<<<<<<< HEAD
        $model = $model_id !== null
            ? $model_class::query()->find($model_id)
            : new $model_class;
=======
        $model = null !== $model_id
            ? $model_class::query()->find($model_id)
            : new $model_class();
>>>>>>> laraxot/dev
=======
        $model = null !== $model_id
            ? $model_class::query()->find($model_id)
            : new $model_class();
>>>>>>> 3792da0d (Check & fix styling)
=======
        $model = $model_id !== null
            ? $model_class::query()->find($model_id)
            : new $model_class;
>>>>>>> .merge_file_JSa5kd

        if (! $model instanceof Model) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return $model;
    }
}
