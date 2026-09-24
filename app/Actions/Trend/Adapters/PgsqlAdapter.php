<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend\Adapters;

<<<<<<< .merge_file_cLOxRc
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_rto8cQ
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Vidk9s
use Error;
use Override;

class PgsqlAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< .merge_file_cLOxRc
<<<<<<< HEAD
=======
=======
class PgsqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> laraxot/dev
=======
class PgsqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> .merge_file_VGD9wX
>>>>>>> laraxot/dev
=======
class PgsqlAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_Vidk9s
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => 'YYYY-MM-DD HH24:MI:00',
            'hour' => 'YYYY-MM-DD HH24:00:00',
            'day' => 'YYYY-MM-DD',
            'month' => 'YYYY-MM',
            'year' => 'YYYY',
<<<<<<< .merge_file_cLOxRc
<<<<<<< HEAD
<<<<<<< HEAD
            default => throw new Error('Invalid interval.'),
=======
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
>>>>>>> 8d801bbe (Check & fix styling)
=======
            default => throw new Error('Invalid interval.'),
>>>>>>> .merge_file_Vidk9s
        };

        return sprintf("to_char(%s, '%s')", $column, $format);
    }
}
