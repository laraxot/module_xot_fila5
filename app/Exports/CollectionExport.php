<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

<<<<<<< HEAD
use BackedEnum;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
=======
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as SupportCollection;
>>>>>>> c7fd73eb (.)
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Lang\Actions\TransArrayAction;
<<<<<<< HEAD
use Modules\Lang\Actions\TransCollectionAction;
=======
>>>>>>> c7fd73eb (.)
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
=======
/**
 * @implements WithMapping<Model>
 */
>>>>>>> c7fd73eb (.)
class CollectionExport implements FromCollection, ShouldQueue, WithHeadings, WithMapping
{
    use Exportable;

<<<<<<< HEAD
    public Collection $collection;
    public array $headings;
    public null|string $transKey;

    /** @var array<int, string> */
    public null|array $fields = null;

    /**
     * @param Collection $collection
     * @param string|null $transKey
     * @param array<int, string> $fields
     */
    public function __construct(Collection $collection, null|string $transKey = null, array $fields = [])
=======
    /** @var SupportCollection<int, mixed>|EloquentCollection<int, Model> */
    public SupportCollection|EloquentCollection $collection;

    /** @var array<int, string> */
    public array $headings;

    public ?string $transKey;

    /** @var array<int, string>|null */
    public ?array $fields = null;

    /**
     * @param  SupportCollection<int, mixed>|EloquentCollection<int, Model>  $collection
     * @param  array<int, string>  $fields
     */
    public function __construct(SupportCollection|EloquentCollection $collection, ?string $transKey = null, array $fields = [])
>>>>>>> c7fd73eb (.)
    {
        $this->collection = $collection;
        $this->transKey = $transKey;
        $this->fields = $fields;
<<<<<<< HEAD
    }

    public function getHead(): array
    {
        if (\is_array($this->fields) && !empty($this->fields)) {
=======
        $this->headings = [];
    }

    /**
     * @return array<int, string>
     */
    public function getHead(): array
    {
        if (\is_array($this->fields) && ! empty($this->fields)) {
>>>>>>> c7fd73eb (.)
            return $this->fields;
        }

        $head = $this->collection->first();
        Assert::isInstanceOf($head, Model::class);
<<<<<<< HEAD
        $head = array_keys($head->getAttributes());
        return $head;
    }

=======

        return array_keys($head->getAttributes());
    }

    /**
     * @return array<int|string, string>
     */
>>>>>>> c7fd73eb (.)
    public function headings(): array
    {
        $headings = $this->getHead();
        $transKey = $this->transKey;

<<<<<<< HEAD
        $headings = app(TransArrayAction::class)->execute($headings, $transKey);

        return $headings;
    }

    public function collection(): Collection
=======
        return app(TransArrayAction::class)->execute($headings, $transKey);
    }

    /**
     * @return SupportCollection<int, mixed>|EloquentCollection<int, Model>
     */
    public function collection(): SupportCollection|EloquentCollection
>>>>>>> c7fd73eb (.)
    {
        return $this->collection;
    }

    /**
<<<<<<< HEAD
     * @param Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null $item
     */
    public function map($item): array
    {
        if (null === $this->fields || empty($this->fields)) {
            Assert::isInstanceOf($item, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($item);
            $res = Arr::map($res, function ($value, $_key) {
                if ($value instanceof BackedEnum) {
                    if (method_exists($value, 'getLabel')) {
                        return $value->getLabel();
                    }
                    return $value->value;
                }

                return SafeStringCastAction::cast($value);
            });

            return $res;
        }

        // return collect($item)->only($this->fields)->toArray();
        $data = [];

        foreach ($this->fields as $field) {
            $value = data_get($item, $field);
=======
     * @return array<int|string, mixed>
     */
    public function map(mixed $row): array
    {
        if ($this->fields === null || empty($this->fields)) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

            return array_values(Arr::map($res, function (mixed $value, string $_key): string {
                if ($value instanceof \BackedEnum) {
                    if (method_exists($value, 'getLabel')) {
                        return SafeStringCastAction::cast($value->getLabel());
                    }

                    return SafeStringCastAction::cast($value->value);
                }

                return SafeStringCastAction::cast($value);
            }));
        }

        $data = [];

        foreach ($this->fields as $field) {
            $value = data_get($row, $field);
>>>>>>> c7fd73eb (.)
            if (\is_object($value)) {
                if (enum_exists($value::class) && method_exists($value, 'getLabel')) {
                    $value = $value->getLabel();
                }
            }
<<<<<<< HEAD
            $data[$field] = $value;
=======
            $data[] = SafeStringCastAction::cast($value);
>>>>>>> c7fd73eb (.)
        }

        return $data;
    }
}
