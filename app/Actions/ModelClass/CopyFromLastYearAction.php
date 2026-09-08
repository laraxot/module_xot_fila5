<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class CopyFromLastYearAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(string $modelClass, string $fieldName, null|string $year): void
    {
        if (!class_exists($modelClass) || !is_subclass_of($modelClass, Model::class)) {
=======
    public function execute(string $modelClass, string $fieldName, ?string $year): void
    {
        if (! class_exists($modelClass) || ! is_subclass_of($modelClass, Model::class)) {
>>>>>>> c7fd73eb (.)
            return;
        }

        $currentYear = (int) $year;
        $lastYear = $currentYear - 1;

<<<<<<< HEAD
        /** @var Collection $rows_year */
        $rows_year = $modelClass::where($fieldName, $currentYear)->get();

        /** @var Collection $rows_last_year */
=======
        /** @var Collection<int, Model> $rows_year */
        $rows_year = $modelClass::where($fieldName, $currentYear)->get();

        /** @var Collection<int, Model> $rows_last_year */
>>>>>>> c7fd73eb (.)
        $rows_last_year = $modelClass::where($fieldName, $lastYear)->get();

        if ($rows_year->count() > 0) {
            return;
        }

        foreach ($rows_last_year as $row) {
            /** @var Model $row */
            $up = $row->replicate()->fill([
                $fieldName => $currentYear,
            ]);
            $up->save();
        }
    }
}
