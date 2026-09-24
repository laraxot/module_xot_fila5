<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Data;

class HasManyUpdateData extends Data
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int|string>  $ids
=======
     * @param array<int|string> $ids
>>>>>>> laraxot/dev
=======
     * @param array<int|string> $ids
>>>>>>> 8d801bbe (Check & fix styling)
     */
    public function __construct(
        public string $foreignKey,
        public mixed $parentKey,
        #[ArrayType]
        public array $ids = [],
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
=======
    ) {
    }
>>>>>>> 8d801bbe (Check & fix styling)
}
