<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Data;

class HasManyUpdateData extends Data
{
    /**
<<<<<<< HEAD
     * @param  array<int|string>  $ids
     */
    public function __construct(
        public string $foreignKey,
        public int|string $parentKey,
        #[ArrayType]
        public array $ids = [],
    ) {}
=======
     * @param array<int|string> $ids
     */
    public function __construct(
        public string $foreignKey,
        public mixed $parentKey,
        #[ArrayType]
        public array $ids = [],
    ) {
    }
>>>>>>> 7f6cf6be (.)
}
