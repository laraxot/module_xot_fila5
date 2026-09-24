<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Lang\Actions\TransCollectionAction;

/**
 * @implements WithMapping<mixed>
 */
class QueryExport implements FromQuery, ShouldQueue, WithChunkReading, WithHeadings, WithMapping
{
    use Exportable;

    /** @var array<int, string> */
    public array $headings = [];

    /** @var array<int, int|string> */
    public array $fields = [];

    public ?string $transKey = null;

    /** @var QueryBuilder|EloquentBuilder<Model> */
<<<<<<< .merge_file_kBF3N7
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_Q9TP0g
    /** @var QueryBuilder|EloquentBuilder<Model> */
    public QueryBuilder|EloquentBuilder $query;

    /**
<<<<<<< HEAD
     * @param  QueryBuilder|EloquentBuilder<Model>  $query
     * @param  array<int, int|string>  $fields
<<<<<<< .merge_file_kBF3N7
=======
    public QueryBuilder|EloquentBuilder $query;

    /**
     * @param QueryBuilder|EloquentBuilder<Model> $query
     * @param array<int, int|string>              $fields
>>>>>>> laraxot/dev
=======
     * @param QueryBuilder|EloquentBuilder<Model> $query
     * @param array<int, int|string>              $fields
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_Q9TP0g
     */
    public function __construct(QueryBuilder|EloquentBuilder $query, ?string $transKey = null, array $fields = [])
    {
        $this->query = $query;
        $this->transKey = $transKey;
        $this->fields = $fields;
    }

    /**
     * @return Collection<int, int|string>
     */
    public function getHead(): Collection
    {
        if (! empty($this->fields)) {
            return collect(array_values($this->fields))
                ->map(
<<<<<<< HEAD
                    static fn (int|string $heading): int|string => \is_int($heading) ? $heading : (string) $heading
=======
                    static fn (mixed $heading): int|string => \is_int($heading) ? $heading : (string) $heading
>>>>>>> 8d801bbe (Check & fix styling)
                );
        }

        $first = $this->query->first();
<<<<<<< .merge_file_kBF3N7
<<<<<<< HEAD
<<<<<<< HEAD
        if ($first === null) {
=======
        if (null === $first) {
>>>>>>> laraxot/dev
=======
        if (null === $first) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if ($first === null) {
>>>>>>> .merge_file_Q9TP0g
            /** @var Collection<int, int|string> $emptyCollection */
            $emptyCollection = collect([]);

            return $emptyCollection;
        }

        /** @var Collection<int, int|string> $result */
        $result = collect(array_keys($this->normalizeRow($first)))
            ->map(
<<<<<<< HEAD
                static fn (int|string $heading): int|string => \is_int($heading) ? $heading : (string) $heading
=======
                static fn (mixed $heading): int|string => \is_int($heading) ? $heading : (string) $heading
>>>>>>> 8d801bbe (Check & fix styling)
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
     */
    public function query(): QueryBuilder|EloquentBuilder|Relation
    {
        return $this->query;
    }

    public function chunkSize(): int
    {
        return 200;
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
<<<<<<< HEAD
            ->mapWithKeys(static function (int|string $field, int|string $_key) use ($rowArray): array {
=======
            ->mapWithKeys(static function (mixed $field, int|string $_key) use ($rowArray): array {
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< .merge_file_kBF3N7
<<<<<<< HEAD
<<<<<<< HEAD
        if ($row === null) {
=======
        if (null === $row) {
>>>>>>> laraxot/dev
=======
        if (null === $row) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
        if ($row === null) {
>>>>>>> .merge_file_Q9TP0g
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
    }
}
