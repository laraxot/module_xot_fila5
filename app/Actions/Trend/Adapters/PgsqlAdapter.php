<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend\Adapters;

<<<<<<< .merge_file_pmlK9Q
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_rto8cQ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_BXf3Il
use Error;
use Override;

class PgsqlAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_pmlK9Q
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
class PgsqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
class PgsqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> .merge_file_VGD9wX
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_BXf3Il
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => 'YYYY-MM-DD HH24:MI:00',
            'hour' => 'YYYY-MM-DD HH24:00:00',
            'day' => 'YYYY-MM-DD',
            'month' => 'YYYY-MM',
            'year' => 'YYYY',
<<<<<<< .merge_file_pmlK9Q
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
<<<<<<< HEAD
<<<<<<< .merge_file_rto8cQ
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> .merge_file_VGD9wX
>>>>>>> laraxot/dev
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
            default => throw new Error('Invalid interval.'),
>>>>>>> .merge_file_BXf3Il
        };

        return sprintf("to_char(%s, '%s')", $column, $format);
    }
}
