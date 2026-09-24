<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trend\Adapters;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
use Error;
use Override;

class SqliteAdapter extends AbstractAdapter
{
    #[Override]
<<<<<<< HEAD
=======
=======
class SqliteAdapter extends AbstractAdapter
{
    #[\Override]
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
            default => throw new Error('Invalid interval.'),
=======
            default => throw new \Error('Invalid interval.'),
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        };

        return sprintf("strftime('%s', %s)", $format, $column);
    }
}
