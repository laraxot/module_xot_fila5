<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend\Adapters;

<<<<<<< .merge_file_owNd1T
=======
<<<<<<< .merge_file_UYGQIK
=======
>>>>>>> .merge_file_A2GGmF
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ILgzJF
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_owNd1T
=======
>>>>>>> .merge_file_IDTTvz
>>>>>>> .merge_file_A2GGmF
use Error;
use Override;

class MySqlAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_owNd1T
=======
<<<<<<< .merge_file_UYGQIK
=======
>>>>>>> .merge_file_A2GGmF
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
<<<<<<< .merge_file_owNd1T
=======
>>>>>>> .merge_file_IDTTvz
>>>>>>> .merge_file_A2GGmF
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%i:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
<<<<<<< .merge_file_owNd1T
=======
<<<<<<< .merge_file_UYGQIK
            default => throw new Error('Invalid interval.'),
=======
>>>>>>> .merge_file_A2GGmF
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
<<<<<<< .merge_file_owNd1T
=======
>>>>>>> .merge_file_IDTTvz
>>>>>>> .merge_file_A2GGmF
        };

        return sprintf("date_format(%s, '%s')", $column, $format);
    }
}
