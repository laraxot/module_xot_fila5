<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Arr;
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
use Illuminate\Support\Collection as SupportCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Lang\Actions\TransArrayAction;
use Modules\Xot\Actions\Cast\SafeArrayByModelCastAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
 * Excel chiama `map()` su ogni riga della collection: Model **o** array
 * (export da `collect([[...]])` / ratings_by_id path). WithMapping non e'
 * ristretto a Model.
 *
 * @implements WithMapping<mixed>
<<<<<<< HEAD
=======
 * @implements WithMapping<Model>
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
 */
class CollectionExport implements FromCollection, ShouldQueue, WithHeadings, WithMapping
{
    use Exportable;

<<<<<<< HEAD
<<<<<<< HEAD
    /** @var SupportCollection<int|string, mixed>|EloquentCollection<int, Model> */
=======
    /** @var SupportCollection<int, mixed>|EloquentCollection<int, Model> */
>>>>>>> laraxot/dev
=======
    /** @var SupportCollection<int|string, mixed>|EloquentCollection<int, Model> */
>>>>>>> laraxot/dev
    public SupportCollection|EloquentCollection $collection;

    /** @var array<int, string> */
    public array $headings;

    public ?string $transKey;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * Formato misto: chiave intera => percorso `data_get` (intestazione = percorso,
     * tradotto via `$transKey`); chiave stringa => percorso, valore => intestazione
     * esplicita che bypassa la traduzione (es. il `title` di un rating).
     *
     * @var array<int|string, string>|null
     */
    public ?array $fields = null;

    /**
     * @param SupportCollection<int|string, mixed>|EloquentCollection<int, Model> $collection
     * @param array<int|string, string>                                           $fields
<<<<<<< HEAD
=======
    /** @var array<int, string>|null */
    public ?array $fields = null;

    /**
     * @param  SupportCollection<int, mixed>|EloquentCollection<int, Model>  $collection
     * @param  array<int, string>  $fields
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
     */
    public function __construct(SupportCollection|EloquentCollection $collection, ?string $transKey = null, array $fields = [])
    {
        $this->collection = $collection;
        $this->transKey = $transKey;
        $this->fields = $fields;
        $this->headings = [];
    }

    /**
     * @return array<int, string>
     */
    public function getHead(): array
    {
        if (\is_array($this->fields) && ! empty($this->fields)) {
<<<<<<< HEAD
<<<<<<< HEAD
            return array_values($this->fields);
=======
            return $this->fields;
>>>>>>> laraxot/dev
=======
            return array_values($this->fields);
>>>>>>> laraxot/dev
        }

        $head = $this->collection->first();
        Assert::isInstanceOf($head, Model::class);

        return array_keys($head->getAttributes());
    }

    /**
     * @return array<int|string, string>
     */
    public function headings(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        $fields = $this->fields;
        if (null === $fields || [] === $fields) {
            return app(TransArrayAction::class)->execute($this->getHead(), $this->transKey);
        }

        $labels = [];
        $implicitIndexes = [];
        $implicitPaths = [];
        foreach ($fields as $key => $value) {
            if (\is_string($key)) {
                $labels[] = $value;

                continue;
            }
            $implicitIndexes[] = \count($labels);
            $implicitPaths[] = $value;
            $labels[] = '';
        }

        $translated = app(TransArrayAction::class)->execute($implicitPaths, $this->transKey);
        foreach (array_values($translated) as $i => $label) {
            $labels[$implicitIndexes[$i]] = $label;
        }

        return $labels;
    }

    /**
     * @return SupportCollection<int|string, mixed>|EloquentCollection<int, Model>
<<<<<<< HEAD
=======
        $headings = $this->getHead();
        $transKey = $this->transKey;

        return app(TransArrayAction::class)->execute($headings, $transKey);
    }

    /**
     * @return SupportCollection<int, mixed>|EloquentCollection<int, Model>
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
     */
    public function collection(): SupportCollection|EloquentCollection
    {
        return $this->collection;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @return list<string>
     */
    public function map(mixed $row): array
    {
        if (null === $this->fields || [] === $this->fields) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

            return array_values(array_map(
                static fn (mixed $value): string => self::castCell($value),
                $res,
            ));
        }

        $data = [];
        foreach ($this->fields as $key => $value) {
            $path = \is_string($key) ? $key : $value;
            Assert::string($path);
            $data[] = self::castCell(data_get($row, $path));
<<<<<<< HEAD
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
            if (\is_object($value)) {
                if (enum_exists($value::class) && method_exists($value, 'getLabel')) {
                    $value = $value->getLabel();
                }
            }
            $data[] = SafeStringCastAction::cast($value);
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        }

        return $data;
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev

    /**
     * Stessa cella per CollectionExport e XotBaseExporter (export_xls = export_xlsx).
     */
    public static function castCell(mixed $value): string
    {
        if ($value instanceof \BackedEnum) {
            if (method_exists($value, 'getLabel')) {
                return SafeStringCastAction::cast($value->getLabel());
            }

            return SafeStringCastAction::cast($value->value);
        }

        if (\is_object($value) && enum_exists($value::class) && method_exists($value, 'getLabel')) {
            $value = $value->getLabel();
        }

        return SafeStringCastAction::cast($value);
    }
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
}
