<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Trend\Adapters;

<<<<<<< .merge_file_l9AIiF
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_3st47M
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_fTqpCJ
use Error;
use Override;

class MySqlAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_l9AIiF
=======
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
>>>>>>> .merge_file_fTqpCJ
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%i:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< .merge_file_l9AIiF
            default => throw new Error('Invalid interval.'),
=======
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
>>>>>>> .merge_file_fTqpCJ
        };

        return sprintf("date_format(%s, '%s')", $column, $format);
    }
}
