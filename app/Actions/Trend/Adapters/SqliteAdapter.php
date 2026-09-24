<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend\Adapters;

<<<<<<< .merge_file_ylPQ18
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_54vAe8
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_fpN927
use Error;
use Override;

class SqliteAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_ylPQ18
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
>>>>>>> .merge_file_PZ0cg5
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_fpN927
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%M:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< .merge_file_ylPQ18
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< HEAD
<<<<<<< .merge_file_54vAe8
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> .merge_file_PZ0cg5
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            default => throw new Error('Invalid interval.'),
>>>>>>> .merge_file_fpN927
        };

        return sprintf("strftime('%s', %s)", $format, $column);
    }
}
