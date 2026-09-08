<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
=======
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
>>>>>>> c7fd73eb (.)
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Lang\Actions\TransCollectionAction;

<<<<<<< HEAD
// use Staudenmeir\LaravelCte\Query\Builder as CteBuilder;

=======
/**
 * @implements WithMapping<mixed>
 */
>>>>>>> c7fd73eb (.)
class QueryExport implements FromQuery, ShouldQueue, WithChunkReading, WithHeadings, WithMapping
{
    use Exportable;

<<<<<<< HEAD
    public array $headings = [];

    /** @var array<int, string> */
    public array $fields = [];

    public null|string $transKey = null;

    public QueryBuilder|EloquentBuilder $query;

    /**
     * @param array<int, string> $fields
     */
    public function __construct(QueryBuilder|EloquentBuilder $query, null|string $transKey = null, array $fields = [])
=======
    /** @var array<int, string> */
    public array $headings = [];

    /** @var array<int, int|string> */
    public array $fields = [];

    public ?string $transKey = null;

    /** @var QueryBuilder|EloquentBuilder<Model> */
    /** @var QueryBuilder|EloquentBuilder<Model> */
    public QueryBuilder|EloquentBuilder $query;

    /**
     * @param  QueryBuilder|EloquentBuilder<Model>  $query
     * @param  array<int, int|string>  $fields
     */
    public function __construct(QueryBuilder|EloquentBuilder $query, ?string $transKey = null, array $fields = [])
>>>>>>> c7fd73eb (.)
    {
        $this->query = $query;
        $this->transKey = $transKey;
        $this->fields = $fields;
<<<<<<< HEAD

        /*
         * $this->headings = collect($query->first())
         * ->keys()
         * ->map(
         * function ($item) use ($transKey) {
         * $t = $transKey.'.'.$item;
         * $trans = trans($t);
         * if ($trans != $t) {
         * return $trans;
         * }
         *
         * return $item;
         * }
         * )
         * ->toArray();
         */
    }

    public function getHead(): Collection
    {
        if (!empty($this->fields)) {
            return collect($this->fields);
        }
        /**
         * @var Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null
         */
        $first = $this->query->first();
        if (null === $first) {
            return collect([]);
        }

        // Parameter #1 $value of function collect expects Illuminate\Contracts\Support\Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null, object given.
        return collect($first)->keys();
    }

    public function headings(): array
    {
        $headings = $this->getHead();
        $transKey = $this->transKey;
        $headings = app(TransCollectionAction::class)->execute($headings, $transKey);

        return $headings->toArray();
    }

    /**
     * se si usa scout aggiungere |ScoutBuilder.
=======
    }

    /**
     * @return Collection<int, int|string>
     */
    public function getHead(): Collection
    {
        if (! empty($this->fields)) {
            return collect(array_values($this->fields))
                ->map(
                    static fn (mixed $heading): int|string => \is_int($heading) ? $heading : (string) $heading
                );
        }

        $first = $this->query->first();
        if ($first === null) {
            /** @var Collection<int, int|string> $emptyCollection */
            $emptyCollection = collect([]);

            return $emptyCollection;
        }

        /** @var Collection<int, int|string> $result */
        $result = collect(array_keys($this->normalizeRow($first)))
            ->map(
                static fn (mixed $heading): int|string => \is_int($heading) ? $heading : (string) $heading
            );

        return $result;
    }

    /**
     * @return array<int|string, string>
     */
    public function headings(): array
    {
        /** @var Collection<int|string, mixed> $headingsWithKeys */
        $headingsWithKeys = $this->getHead()
            ->values()
            ->mapWithKeys(
                static function (int|string $value, int $key): array {
                    $stringKey = (string) $value;

                    return [$stringKey => $value];
                },
            );

        $translated = app(TransCollectionAction::class)->execute($headingsWithKeys, $this->transKey);

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
     * @return QueryBuilder|Relation<Model, Model, mixed>|EloquentBuilder<Model>
>>>>>>> c7fd73eb (.)
     */
    public function query(): QueryBuilder|EloquentBuilder|Relation
    {
        return $this->query;
<<<<<<< HEAD

        // ->orderBy('id');
=======
>>>>>>> c7fd73eb (.)
    }

    public function chunkSize(): int
    {
        return 200;
    }

    /**
<<<<<<< HEAD
     * @param Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null $item
     */
    public function map($item): array
    {
        if (!empty($this->fields)) {
            return collect($item)->toArray();
        }

        // rameter #1 $value of function collect expects Illuminate\Contracts\Support\Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null, object given.
        return collect($item)->only($this->fields)->toArray();
=======
     * @return array<int|string, mixed>
     */
    public function map(mixed $row): array
    {
        $rowArray = $this->normalizeRow($row);

        if (empty($this->fields)) {
            return $rowArray;
        }

        return collect($this->fields)
            ->mapWithKeys(static function (mixed $field, int|string $_key) use ($rowArray): array {
                $keyString = \is_string($field) ? $field : (string) $field;

                return [$keyString => $rowArray[$keyString] ?? null];
            })
            ->toArray();
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

        if (\is_array($row)) {
            return $row;
        }

        if ($row instanceof \Traversable) {
            return iterator_to_array($row);
        }

        return (array) $row;
>>>>>>> c7fd73eb (.)
    }
}
