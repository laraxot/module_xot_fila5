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
    public string $name;
    public string $class;
    public null|string $module = null;
    public null|string $path = null;
    public null|string $ns = null;

=======
    public string $name = '';

    public string $class = '';

    public ?string $module = null;

    public ?string $path = null;

    public ?string $ns = null;

    /**
     * @param EloquentCollection<int, object>|Collection<int, object>|array<int, array<array-key, mixed>> $data
     *
     * @return DataCollection<int, static>
     */
>>>>>>> c7fd73eb (.)
    public static function collection(EloquentCollection|Collection|array $data): DataCollection
    {
        return self::collect($data, DataCollection::class);
    }
}
