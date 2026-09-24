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
<<<<<<< HEAD
<<<<<<< .merge_file_gMSYTJ
=======
<<<<<<< HEAD
<<<<<<< .merge_file_BlfdUz
     * @param  string|class-string<Model>  $related  The related model class name
     * @param  string|class-string<Model>  $class  The class
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     * <<<<<<< HEAD
     *
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
<<<<<<< HEAD
<<<<<<< HEAD
     *                                            <<<<<<< .merge_file_BlfdUz
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
     *                                            <<<<<<< HEAD
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            =======
=======
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
     *                                            >>>>>>> .merge_file_yA4jnq
=======
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
>>>>>>> 3792da0d (Check & fix styling)
     *                                            >>>>>>> laraxot/dev
=======
     * @param  string|class-string<Model>  $related  The related model class name
     * @param  string|class-string<Model>  $class  The class
>>>>>>> .merge_file_AADGG7
=======
>>>>>>> .merge_file_yA4jnq
=======
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
     *                                            >>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
