<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend\Adapters;

<<<<<<< .merge_file_8DgSY7
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ILgzJF
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_cMFhpk
use Error;
use Override;

class MySqlAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_8DgSY7
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
>>>>>>> .merge_file_Zqq18d
>>>>>>> laraxot/dev
=======
class MySqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_cMFhpk
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%i:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< .merge_file_8DgSY7
<<<<<<< HEAD
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< .merge_file_ILgzJF
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> .merge_file_Zqq18d
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> 8d801bbe (Check & fix styling)
=======
            default => throw new Error('Invalid interval.'),
>>>>>>> .merge_file_cMFhpk
        };

        return sprintf("date_format(%s, '%s')", $column, $format);
    }
}
