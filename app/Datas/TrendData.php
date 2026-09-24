<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class TrendData extends Data
{
    public string $date;

<<<<<<< HEAD
    /** @var int|float|string|null Vendor TrendValue::$aggregate is mixed; DB aggregates resolve to scalar|null */
=======
>>>>>>> 3792da0d (Check & fix styling)
    public mixed $aggregate;
}
