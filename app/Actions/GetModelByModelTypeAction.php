<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Xot\Actions;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetModelByModelTypeAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
<<<<<<< HEAD
    public function execute(string $model_type, null|string $model_id): Model
    {
        $model_class = app(GetModelClassByModelTypeAction::class)->execute($model_type);
        Assert::isInstanceOf($model = app($model_class), Model::class);
        if (null !== $model_id) {
            $model = $model->find($model_id);
        }

        if (null === $model) {
            throw new Exception('[' . __LINE__ . '][' . class_basename($this) . ']');
=======
    public function execute(string $model_type, ?string $model_id): Model
    {
        $model_class = app(GetModelClassByModelTypeAction::class)->execute($model_type);
        Assert::stringNotEmpty($model_class);
        Assert::classExists($model_class);
        Assert::isAOf($model_class, Model::class);

        /** @var class-string<Model> $model_class */
        $model = null !== $model_id
            ? $model_class::query()->find($model_id)
            : new $model_class();

        if (! $model instanceof Model) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
>>>>>>> c7fd73eb (.)
        }

        return $model;
    }
}
