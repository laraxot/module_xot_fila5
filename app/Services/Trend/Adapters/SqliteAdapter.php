<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Trend\Adapters;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_kLlSi7
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
use Error;
use Override;

class SqliteAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
class SqliteAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
class SqliteAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> .merge_file_MHXKF6
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%M:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< HEAD
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
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
        };

        return sprintf("strftime('%s', %s)", $format, $column);
    }
}
