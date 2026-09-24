<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend\Adapters;

<<<<<<< HEAD
=======
<<<<<<< .merge_file_rto8cQ
<<<<<<< HEAD
>>>>>>> laraxot/dev
use Error;
use Override;

class PgsqlAdapter extends AbstractAdapter
{
    #[Override]
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
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => 'YYYY-MM-DD HH24:MI:00',
            'hour' => 'YYYY-MM-DD HH24:00:00',
            'day' => 'YYYY-MM-DD',
            'month' => 'YYYY-MM',
            'year' => 'YYYY',
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
        };

        return sprintf("to_char(%s, '%s')", $column, $format);
    }
}
