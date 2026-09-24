<?php

<<<<<<< .merge_file_6qiC8n
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_pkaSZd
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

<<<<<<< .merge_file_6qiC8n
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
>>>>>>> .merge_file_pkaSZd
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
<<<<<<< .merge_file_6qiC8n
        $model = $model_id !== null
            ? $model_class::query()->find($model_id)
            : new $model_class;
=======
<<<<<<< HEAD
        $model = $model_id !== null
            ? $model_class::query()->find($model_id)
            : new $model_class;
=======
        $model = null !== $model_id
            ? $model_class::query()->find($model_id)
            : new $model_class();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_pkaSZd

        if (! $model instanceof Model) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return $model;
    }
}
