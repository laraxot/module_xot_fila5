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
<<<<<<< .merge_file_1flKKr
        for ($curr = $from; $curr <= $to; $curr++) {
=======
<<<<<<< HEAD
        for ($curr = $from; $curr <= $to; $curr++) {
=======
        for ($curr = $from; $curr <= $to; ++$curr) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ZlxKgb
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
        }

        return SelectFilter::make($fieldName)->options($opts);
    }
}
