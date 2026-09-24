<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend\Adapters;

<<<<<<< .merge_file_h0tesD
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_54vAe8
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_pIBHfr
use Error;
use Override;

class SqliteAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_h0tesD
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
>>>>>>> .merge_file_PZ0cg5
>>>>>>> laraxot/dev
>>>>>>> .merge_file_pIBHfr
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%M:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< .merge_file_h0tesD
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
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
>>>>>>> .merge_file_pIBHfr
        };

        return sprintf("strftime('%s', %s)", $format, $column);
    }
}
