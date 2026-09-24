<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GuessPivotFullClassAction
{
    use QueueableAction;

    /**
     * Guess the pivot class for a many-to-many relationship.
     *
<<<<<<< .merge_file_XFApU9
     * @param  string|class-string<Model>  $related  The related model class name
     * @param  string|class-string<Model>  $class  The class
=======
<<<<<<< HEAD
     * @param  string|class-string<Model>  $related  The related model class name
     * @param  string|class-string<Model>  $class  The class
=======
<<<<<<< .merge_file_1HK41N
<<<<<<< HEAD
     * @param  string|class-string<Model>  $related  The related model class name
     * @param  string|class-string<Model>  $class  The class
=======
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
>>>>>>> laraxot/dev
=======
     * @param string|class-string<Model> $related The related model class name
     * @param string|class-string<Model> $class   The class
>>>>>>> .merge_file_UGRXoE
>>>>>>> laraxot/dev
>>>>>>> .merge_file_CqSF1v
     */
    public function execute(string $pivot_name, string $related, string $class): string
    {
        // Try class-based pivot first
        $pivot_class = $this->buildPivotClassName($class, $pivot_name);
        if (class_exists($pivot_class)) {
            return $pivot_class;
        }

        // Try related model-based pivot
        $pivot_class = $this->buildPivotClassName($related, $pivot_name);
        if (class_exists($pivot_class)) {
            return $pivot_class;
        }

        // Try parent class if available
        return $this->tryParentClassPivot($pivot_name, $related, $class);
    }

    private function buildPivotClassName(string $context, string $pivotName): string
    {
        return Str::of($context)
            ->beforeLast('\\')
            ->append('\\'.$pivotName)
            ->toString();
    }

    private function tryParentClassPivot(string $pivot_name, string $related, string $class): string
    {
        $parent_class = get_parent_class($class);
<<<<<<< .merge_file_XFApU9
        if ($parent_class === false) {
=======
<<<<<<< HEAD
        if ($parent_class === false) {
=======
<<<<<<< .merge_file_1HK41N
<<<<<<< HEAD
        if ($parent_class === false) {
=======
        if (false === $parent_class) {
>>>>>>> laraxot/dev
=======
        if (false === $parent_class) {
>>>>>>> .merge_file_UGRXoE
>>>>>>> laraxot/dev
>>>>>>> .merge_file_CqSF1v
            return $this->buildPivotClassName($class, $pivot_name);
        }

        // If parent class ends with 'Morph', use it directly
        if (Str::endsWith($parent_class, 'Morph')) {
            return $this->buildPivotClassName($class, $pivot_name);
        }

        // Otherwise, use parent class to build new pivot name
        $model_names = [
            class_basename($parent_class),
            class_basename($related),
        ];
        sort($model_names);
        $new_pivot_name = implode('', $model_names);

        return app(GuessPivotFullClassAction::class)->execute($new_pivot_name, $related, $parent_class);
    }
}
