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
>>>>>>> 8d801bbe (Check & fix styling)

    public ?string $module = null;

    public ?string $path = null;

    public ?string $ns = null;

    /**
<<<<<<< .merge_file_aE7V0n
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>> $data
     *                                                                                                          =======
     * @param EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>> $data
     *
     * >>>>>>> laraxot/dev
=======
     * @param EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>> $data
>>>>>>> 8d801bbe (Check & fix styling)
     *
=======
     * @param  EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>>  $data
>>>>>>> .merge_file_uvswOi
     * @return DataCollection<int, static>
     */
    public static function collection(EloquentCollection|Collection|array $data): DataCollection
    {
        return self::collect($data, DataCollection::class);
    }
}
