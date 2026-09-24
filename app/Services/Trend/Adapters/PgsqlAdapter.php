<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Trend\Adapters;

<<<<<<< .merge_file_UT5HSl
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_zjCaEy
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_aRl5tx
use Error;
use Override;

class PgsqlAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_UT5HSl
=======
<<<<<<< HEAD
=======
=======
class PgsqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> laraxot/dev
=======
class PgsqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> .merge_file_1JdeD1
>>>>>>> laraxot/dev
>>>>>>> .merge_file_aRl5tx
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => 'YYYY-MM-DD HH24:MI:00',
            'hour' => 'YYYY-MM-DD HH24:00:00',
            'day' => 'YYYY-MM-DD',
            'month' => 'YYYY-MM',
            'year' => 'YYYY',
<<<<<<< .merge_file_UT5HSl
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< .merge_file_zjCaEy
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> .merge_file_1JdeD1
>>>>>>> laraxot/dev
>>>>>>> .merge_file_aRl5tx
        };

        return sprintf("to_char(%s, '%s')", $column, $format);
    }
}
