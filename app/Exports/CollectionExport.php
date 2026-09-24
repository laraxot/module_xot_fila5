<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
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
 * Excel chiama `map()` su ogni riga della collection: Model **o** array
 * (export da `collect([[...]])` / ratings_by_id path). WithMapping non e'
 * ristretto a Model.
 *
 * @implements WithMapping<mixed>
=======
 * @implements WithMapping<Model>
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
 */
class CollectionExport implements FromCollection, ShouldQueue, WithHeadings, WithMapping
{
    use Exportable;

<<<<<<< HEAD
    /** @var SupportCollection<int|string, mixed>|EloquentCollection<int, Model> */
=======
    /** @var SupportCollection<int, mixed>|EloquentCollection<int, Model> */
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
    public SupportCollection|EloquentCollection $collection;

    /** @var array<int, string> */
    public array $headings;

    public ?string $transKey;

<<<<<<< HEAD
    /**
     * Formato misto: chiave intera => percorso `data_get` (intestazione = percorso,
     * tradotto via `$transKey`); chiave stringa => percorso, valore => intestazione
     * esplicita che bypassa la traduzione (es. il `title` di un rating).
     *
     * @var array<int|string, string>|null
     */
    public ?array $fields = null;

    /**
     * @param  SupportCollection<int|string, mixed>|EloquentCollection<int, Model>  $collection
     * @param  array<int|string, string>  $fields
<<<<<<< .merge_file_ub26NL
=======
     * @param SupportCollection<int|string, mixed>|EloquentCollection<int, Model> $collection
     * @param array<int|string, string>                                           $fields
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
=======
    /** @var array<int, string>|null */
    public ?array $fields = null;

    /**
     * @param SupportCollection<int, mixed>|EloquentCollection<int, Model> $collection
     * @param array<int, string>                                           $fields
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_IeUYGe
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
            return array_values($this->fields);
=======
            return $this->fields;
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
        $fields = $this->fields;
        if ($fields === null || $fields === []) {
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
=======
        $headings = $this->getHead();
        $transKey = $this->transKey;

        return app(TransArrayAction::class)->execute($headings, $transKey);
    }

    /**
     * @return SupportCollection<int, mixed>|EloquentCollection<int, Model>
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function collection(): SupportCollection|EloquentCollection
    {
        return $this->collection;
    }

    /**
<<<<<<< HEAD
<<<<<<< .merge_file_ub26NL
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_IeUYGe
     * @return array<int|string, mixed>
     */
    public function map(mixed $row): array
    {
<<<<<<< HEAD
        if ($this->fields === null || empty($this->fields)) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

<<<<<<< .merge_file_ub26NL
            return array_values(Arr::map($res, function (mixed $value, string $_key): string {
=======
        if (null === $this->fields || empty($this->fields)) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

            return array_values(Arr::map($res, function ($value, $_key): string {
>>>>>>> 3792da0d (Check & fix styling)
                if ($value instanceof \BackedEnum) {
                    if (method_exists($value, 'getLabel')) {
                        return SafeStringCastAction::cast($value->getLabel());
                    }

                    return SafeStringCastAction::cast($value->value);
                }

                return SafeStringCastAction::cast($value);
            }));
=======
            return array_values(Arr::map($res, fn (mixed $value): string => self::castCell($value)));
>>>>>>> .merge_file_IeUYGe
        }

        $data = [];

<<<<<<< HEAD
        foreach ($this->fields as $key => $field) {
            $path = \is_string($key) ? $key : $field;
<<<<<<< .merge_file_ub26NL
            $value = data_get($row, $path);
=======
        foreach ($this->fields as $field) {
            $value = data_get($row, $field);
>>>>>>> 3792da0d (Check & fix styling)
            if (\is_object($value)) {
                if (enum_exists($value::class) && method_exists($value, 'getLabel')) {
                    $value = $value->getLabel();
                }
            }
            $data[] = SafeStringCastAction::cast($value);
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
     * @return list<string>
     */
    public function map(mixed $row): array
    {
        if (null === $this->fields || [] === $this->fields) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

            return array_values(Arr::map($res, fn (mixed $value): string => self::castCell($value)));
        }

        $data = [];
        foreach ($this->fields as $key => $value) {
            $path = \is_string($key) ? $key : $value;
            $data[] = self::castCell(data_get($row, $path));
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
            $data[] = self::castCell(data_get($row, $path));
>>>>>>> .merge_file_IeUYGe
=======
=======
     * @return array<int|string, mixed>
     */
    public function map(mixed $row): array
    {
        if (null === $this->fields || empty($this->fields)) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

            return array_values(Arr::map($res, fn (mixed $value, mixed $_key): string => self::stringifyExportValue($value)));
        }

        $data = [];

        foreach ($this->fields as $field) {
            $value = data_get($row, $field);
            $data[] = SafeStringCastAction::cast(self::normalizeExportFieldValue($value));
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        }

        return $data;
    }
<<<<<<< .merge_file_ub26NL
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_IeUYGe

<<<<<<< HEAD
    /**
     * Stessa cella per CollectionExport e XotBaseExporter (export_xls = export_xlsx).
     */
    public static function castCell(mixed $value): string
=======
    private static function stringifyExportValue(mixed $value): string
>>>>>>> 930f8146 (Check & fix styling)
    {
        if ($value instanceof \BackedEnum) {
            if (method_exists($value, 'getLabel')) {
                return SafeStringCastAction::cast($value->getLabel());
            }

            return SafeStringCastAction::cast($value->value);
        }

<<<<<<< HEAD
        if (\is_object($value) && enum_exists($value::class) && method_exists($value, 'getLabel')) {
            $value = $value->getLabel();
        }

        return SafeStringCastAction::cast($value);
    }
<<<<<<< HEAD
<<<<<<< .merge_file_ub26NL
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_IeUYGe
=======
=======
        return SafeStringCastAction::cast($value);
    }

    private static function normalizeExportFieldValue(mixed $value): mixed
    {
        if (! \is_object($value)) {
            return $value;
        }

        if (enum_exists($value::class) && method_exists($value, 'getLabel')) {
            return $value->getLabel();
        }

        return $value;
    }
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
