<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
<<<<<<< HEAD
use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\LazyCollection;
use Iterator;
=======
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
>>>>>>> c7fd73eb (.)
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromIterator;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Lang\Actions\TransCollectionAction;

<<<<<<< HEAD
=======
/**
 * @implements WithMapping<mixed>
 */
>>>>>>> c7fd73eb (.)
class LazyCollectionExport implements FromIterator, ShouldQueue, WithHeadings, WithMapping
{
    use Exportable;

<<<<<<< HEAD
    public array $headings;

    public null|string $transKey;
=======
    /** @var array<int, string> */
    public array $headings = [];

    public ?string $transKey;
>>>>>>> c7fd73eb (.)

    /** @var array<int, string> */
    public array $fields = [];

    /**
<<<<<<< HEAD
     * @param array<int, string> $fields
     */
    public function __construct(
        public LazyCollection $collection,
        null|string $transKey = null,
        array $fields = [],
    ) {
        // $this->headings = count($headings) > 0 ? $headings : collect($collection->first())->keys()->toArray();

        $this->transKey = $transKey;
        $this->fields = $fields;

        // $this->headings = $headings->toArray();
    }

    /**
     * Undocumented function.
     *
     * @param Collection $item
     */
    public function map($item): array
    {
        $data = $item->only($this->fields);

        return $data->toArray();

        /*
         * return [
         * $item->,
         * ];
         */
    }

    public function getHead(): Collection
    {
        if (!empty($this->fields)) {
            return collect($this->fields);
        }

        /**
         * @var array
         */
        $head = $this->collection->first();

        return collect($head)->keys();
    }

=======
     * @param  LazyCollection<int, mixed>  $collection
     * @param  array<int, string>  $fields
     */
    public function __construct(
        public LazyCollection $collection,
        ?string $transKey = null,
        array $fields = [],
    ) {
        $this->transKey = $transKey;
        $this->fields = $fields;
    }

    /**
     * @return array<int|string, mixed>
     */
    public function map(mixed $row): array
    {
        $rowArray = $this->normalizeRow($row);

        if (empty($this->fields)) {
            return $rowArray;
        }

        return collect($this->fields)
            ->mapWithKeys(function (string $key) use ($rowArray): array {
                return [$key => $rowArray[$key] ?? null];
            })
            ->toArray();
    }

    /**
     * @return Collection<int, string>
     */
    public function getHead(): Collection
    {
        if (! empty($this->fields)) {
            return collect($this->fields)->values();
        }

        $head = $this->collection->first();
        $headArray = $this->normalizeRow($head);

        return collect(array_keys($headArray))
            ->map(static fn (int|string $key): string => (string) $key)
            ->values();
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
        $headings = app(TransCollectionAction::class)->execute($headings, $transKey);

        return $headings->toArray();
    }

=======
        $headingCollection = collect();

        foreach ($headings as $heading) {
            $headingCollection->put((string) $heading, $heading);
        }

        $translated = app(TransCollectionAction::class)->execute($headingCollection, $transKey);

        $result = [];
        foreach ($translated->all() as $key => $value) {
            if (! is_string($value)) {
                continue;
            }
            $result[is_int($key) ? $key : (string) $key] = $value;
        }

        return $result;
    }

    /**
     * @return LazyCollection<int, mixed>
     */
>>>>>>> c7fd73eb (.)
    public function collection(): LazyCollection
    {
        return $this->collection;
    }

    /**
<<<<<<< HEAD
     * Returns an iterator for the current collection.
     */
    public function iterator(): Iterator
    {
        /* @phpstan-ignore return.type */
        return $this->collection->getIterator();
=======
     * @return \Iterator<int, mixed>
     */
    public function iterator(): \Iterator
    {
        return new \ArrayIterator(iterator_to_array($this->collection->getIterator(), false));
    }

    /**
     * @return array<int|string, mixed>
     */
    private function normalizeRow(mixed $row): array
    {
        if ($row === null) {
            return [];
        }

        if ($row instanceof Arrayable) {
            return $row->toArray();
        }

        if (is_array($row)) {
            return $row;
        }

        if ($row instanceof \Traversable) {
            return iterator_to_array($row);
        }

        return (array) $row;
>>>>>>> c7fd73eb (.)
    }
}
