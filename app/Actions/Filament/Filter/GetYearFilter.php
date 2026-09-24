<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Filter;

use Filament\Tables\Filters\SelectFilter;
use Spatie\QueueableAction\QueueableAction;

class GetYearFilter
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(string $fieldName, int $from, int $to): SelectFilter
    {
        $opts = [];
<<<<<<< .merge_file_4DToE9
<<<<<<< HEAD
<<<<<<< HEAD
        for ($curr = $from; $curr <= $to; $curr++) {
=======
        for ($curr = $from; $curr <= $to; ++$curr) {
>>>>>>> laraxot/dev
=======
        for ($curr = $from; $curr <= $to; ++$curr) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        for ($curr = $from; $curr <= $to; $curr++) {
>>>>>>> .merge_file_607nDW
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
        }

        return SelectFilter::make($fieldName)->options($opts);
    }
}
