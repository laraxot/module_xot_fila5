<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Data;

class HasManyUpdateData extends Data
{
    /**
<<<<<<< .merge_file_TF9RNm
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int|string>  $ids
=======
     * @param array<int|string> $ids
>>>>>>> laraxot/dev
=======
     * @param array<int|string> $ids
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int|string>  $ids
>>>>>>> .merge_file_vCF4kD
     */
    public function __construct(
        public string $foreignKey,
        public mixed $parentKey,
        #[ArrayType]
        public array $ids = [],
<<<<<<< .merge_file_TF9RNm
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
>>>>>>> 3792da0d (Check & fix styling)
=======
    ) {}
>>>>>>> .merge_file_vCF4kD
}
