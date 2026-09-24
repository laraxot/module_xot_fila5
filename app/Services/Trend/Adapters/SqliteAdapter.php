<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Trend\Adapters;

<<<<<<< .merge_file_lChfaJ
=======
<<<<<<< .merge_file_HjJM9Z
=======
>>>>>>> .merge_file_oqSyZ3
<<<<<<< HEAD
=======
<<<<<<< .merge_file_kLlSi7
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_lChfaJ
=======
>>>>>>> .merge_file_w8ipGF
>>>>>>> .merge_file_oqSyZ3
use Error;
use Override;

class SqliteAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_lChfaJ
=======
<<<<<<< .merge_file_HjJM9Z
=======
>>>>>>> .merge_file_oqSyZ3
<<<<<<< HEAD
=======
=======
class SqliteAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> laraxot/dev
=======
class SqliteAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> .merge_file_MHXKF6
>>>>>>> laraxot/dev
<<<<<<< .merge_file_lChfaJ
=======
>>>>>>> .merge_file_w8ipGF
>>>>>>> .merge_file_oqSyZ3
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%M:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< .merge_file_lChfaJ
=======
<<<<<<< .merge_file_HjJM9Z
            default => throw new Error('Invalid interval.'),
=======
>>>>>>> .merge_file_oqSyZ3
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< .merge_file_kLlSi7
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> .merge_file_MHXKF6
>>>>>>> laraxot/dev
<<<<<<< .merge_file_lChfaJ
=======
>>>>>>> .merge_file_w8ipGF
>>>>>>> .merge_file_oqSyZ3
        };

        return sprintf("strftime('%s', %s)", $format, $column);
    }
}
