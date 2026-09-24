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
>>>>>>> laraxot/dev

    public ?string $module = null;

    public ?string $path = null;

    public ?string $ns = null;

    /**
<<<<<<< .merge_file_q33JQS
     * @param  EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>>  $data
=======
<<<<<<< HEAD
     * @param  EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>>  $data
=======
     * @param EloquentCollection<int, mixed>|Collection<int, mixed>|array<int, mixed> $data
     *
>>>>>>> laraxot/dev
>>>>>>> .merge_file_5H2ldd
     * @return DataCollection<int, static>
     */
    public static function collection(EloquentCollection|Collection|array $data): DataCollection
    {
        return self::collect($data, DataCollection::class);
    }
}
