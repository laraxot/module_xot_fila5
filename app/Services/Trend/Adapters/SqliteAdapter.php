<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Trend\Adapters;

<<<<<<< .merge_file_HjJM9Z
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_kLlSi7
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_w8ipGF
use Error;
use Override;

class SqliteAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_HjJM9Z
=======
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
>>>>>>> .merge_file_w8ipGF
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%M:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< .merge_file_HjJM9Z
            default => throw new Error('Invalid interval.'),
=======
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
>>>>>>> .merge_file_w8ipGF
        };

        return sprintf("strftime('%s', %s)", $format, $column);
    }
}
