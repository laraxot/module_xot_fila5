<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Undocumented class.
 */
class ComponentFileData extends Data
{
<<<<<<< HEAD
    public string $name = '';

    public string $class = '';
=======
    public string $name;

    public string $class;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

    public ?string $module = null;

    public ?string $path = null;

    public ?string $ns = null;

    /**
<<<<<<< .merge_file_oBGx0T
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>> $data
     *                                                                                                          =======
     * @param EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>> $data
     *
     * >>>>>>> laraxot/dev
=======
     * @param EloquentCollection<int, mixed>|Collection<int, mixed>|array<int, mixed> $data
>>>>>>> 3792da0d (Check & fix styling)
     *
=======
     * @param  EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>>  $data
>>>>>>> .merge_file_RCWS7S
     * @return DataCollection<int, static>
     */
    public static function collection(EloquentCollection|Collection|array $data): DataCollection
    {
        return self::collect($data, DataCollection::class);
    }
}
