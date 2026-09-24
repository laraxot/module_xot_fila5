<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Trend\Adapters;

<<<<<<< HEAD
=======
<<<<<<< .merge_file_3st47M
<<<<<<< HEAD
>>>>>>> laraxot/dev
use Error;
use Override;

class MySqlAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< HEAD
=======
=======
class MySqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> laraxot/dev
=======
class MySqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> .merge_file_e1JeQk
>>>>>>> laraxot/dev
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%i:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< .merge_file_3st47M
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> .merge_file_e1JeQk
>>>>>>> laraxot/dev
        };

        return sprintf("date_format(%s, '%s')", $column, $format);
    }
}
