<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class HasManyRelationData extends Data
{
    /**
<<<<<<< .merge_file_Mw3ZrL
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $updateData
     * @param  array<int|string>|null  $from
     * @param  array<int|string>|null  $to
=======
     * @param array<string, mixed>   $updateData
     * @param array<int|string>|null $from
     * @param array<int|string>|null $to
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed>   $updateData
     * @param array<int|string>|null $from
     * @param array<int|string>|null $to
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $updateData
     * @param  array<int|string>|null  $from
     * @param  array<int|string>|null  $to
>>>>>>> .merge_file_kJ2r2Z
     */
    public function __construct(
        public string $foreignKey,
        public mixed $parentKey,
        public array $updateData,
        #[MapInputName('from')]
        public ?array $from = null,
        #[MapInputName('to')]
        public ?array $to = null,
<<<<<<< .merge_file_Mw3ZrL
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
>>>>>>> .merge_file_kJ2r2Z
}
