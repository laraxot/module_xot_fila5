<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class HasManyRelationData extends Data
{
    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $updateData
     * @param  array<int|string>|null  $from
     * @param  array<int|string>|null  $to
     */
    public function __construct(
        public string $foreignKey,
        public int|string $parentKey,
=======
     * @param array<string, mixed>   $updateData
     * @param array<int|string>|null $from
     * @param array<int|string>|null $to
     */
    public function __construct(
        public string $foreignKey,
        public mixed $parentKey,
>>>>>>> 7f6cf6be (.)
        public array $updateData,
        #[MapInputName('from')]
        public ?array $from = null,
        #[MapInputName('to')]
        public ?array $to = null,
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> 7f6cf6be (.)
}
