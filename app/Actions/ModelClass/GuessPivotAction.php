<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GuessPivotAction
{
    use QueueableAction;

    /**
     * Guess the pivot class for a many-to-many relationship.
     *
     * <<<<<<< .merge_file_2hH4PI
     *
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
     *                                            <<<<<<< HEAD
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
     *                                            <<<<<<< .merge_file_BlfdUz
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
     *                                            <<<<<<< HEAD
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
     *                                            <<<<<<< .merge_file_syiSyF
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
     *                                            <<<<<<< HEAD
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            >>>>>>> laraxot/dev
     *                                            >>>>>>> .merge_file_NzfLh9
     *                                            >>>>>>> laraxot/dev
     *                                            >>>>>>> .merge_file_yA4jnq
     *                                            >>>>>>> laraxot/dev
     *                                            >>>>>>> .merge_file_DjOj2I
     */
    public function execute(string $related, string $class): Pivot
    {
        $model_names = [
            class_basename($class),
            class_basename($related),
        ];
        sort($model_names);
        $pivot_name = implode('', $model_names);

        $pivot_class = app(GuessPivotFullClassAction::class)->execute($pivot_name, $related, $class);

        $pivot = app($pivot_class);
        Assert::isInstanceOf($pivot, Pivot::class);

        return $pivot;
    }
}
