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
<<<<<<< .merge_file_EgmqDc
=======
<<<<<<< HEAD
>>>>>>> .merge_file_xLTHne
 * Excel chiama `map()` su ogni riga della collection: Model **o** array
 * (export da `collect([[...]])` / ratings_by_id path). WithMapping non e'
 * ristretto a Model.
 *
 * @implements WithMapping<mixed>
<<<<<<< .merge_file_EgmqDc
=======
=======
 * @implements WithMapping<Model>
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xLTHne
 */
class CollectionExport implements FromCollection, ShouldQueue, WithHeadings, WithMapping
{
    use Exportable;

<<<<<<< .merge_file_EgmqDc
    /** @var SupportCollection<int|string, mixed>|EloquentCollection<int, Model> */
=======
<<<<<<< HEAD
    /** @var SupportCollection<int|string, mixed>|EloquentCollection<int, Model> */
=======
    /** @var SupportCollection<int, mixed>|EloquentCollection<int, Model> */
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xLTHne
    public SupportCollection|EloquentCollection $collection;

    /** @var array<int, string> */
    public array $headings;

    public ?string $transKey;

<<<<<<< .merge_file_EgmqDc
=======
<<<<<<< HEAD
>>>>>>> .merge_file_xLTHne
    /**
     * Formato misto: chiave intera => percorso `data_get` (intestazione = percorso,
     * tradotto via `$transKey`); chiave stringa => percorso, valore => intestazione
     * esplicita che bypassa la traduzione (es. il `title` di un rating).
     *
     * @var array<int|string, string>|null
     */
<<<<<<< .merge_file_EgmqDc
    public ?array $fields = null;

    /**
     * @param  SupportCollection<int|string, mixed>|EloquentCollection<int, Model>  $collection
     * @param  array<int|string, string>  $fields
=======
    public ?array $fields = null;

    /**
     * @param  SupportCollection<int|string, mixed>|EloquentCollection<int, Model>  $collection
     * @param  array<int|string, string>  $fields
=======
    /** @var array<int, string>|null */
    public ?array $fields = null;

    /**
     * @param SupportCollection<int, mixed>|EloquentCollection<int, Model> $collection
     * @param array<int, string>                                           $fields
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xLTHne
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
<<<<<<< .merge_file_EgmqDc
            return array_values($this->fields);
=======
<<<<<<< HEAD
            return array_values($this->fields);
=======
            return $this->fields;
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xLTHne
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
<<<<<<< .merge_file_EgmqDc
=======
<<<<<<< HEAD
>>>>>>> .merge_file_xLTHne
        $fields = $this->fields;
        if ($fields === null || $fields === []) {
            return app(TransArrayAction::class)->execute($this->getHead(), $this->transKey);
        }
<<<<<<< .merge_file_EgmqDc
=======

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
>>>>>>> .merge_file_xLTHne

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
<<<<<<< .merge_file_EgmqDc
     * @return SupportCollection<int|string, mixed>|EloquentCollection<int, Model>
=======
     * @return SupportCollection<int, mixed>|EloquentCollection<int, Model>
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xLTHne
     */
    public function collection(): SupportCollection|EloquentCollection
    {
        return $this->collection;
    }

    /**
     * @return array<int|string, mixed>
     */
    public function map(mixed $row): array
    {
<<<<<<< HEAD
        if ($this->fields === null || empty($this->fields)) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

            return array_values(Arr::map($res, fn (mixed $value): string => self::castCell($value)));
<<<<<<< .merge_file_EgmqDc
        }
=======
=======
        if (null === $this->fields || empty($this->fields)) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

            return array_values(Arr::map($res, function ($value, $_key): string {
                if ($value instanceof \BackedEnum) {
                    if (method_exists($value, 'getLabel')) {
                        return SafeStringCastAction::cast($value->getLabel());
                    }
>>>>>>> .merge_file_xLTHne

        $data = [];

<<<<<<< .merge_file_EgmqDc
        foreach ($this->fields as $key => $field) {
            $path = \is_string($key) ? $key : $field;
            $data[] = self::castCell(data_get($row, $path));
=======
                return SafeStringCastAction::cast($value);
            }));
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xLTHne
        }

        return $data;
    }

<<<<<<< .merge_file_EgmqDc
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
=======
<<<<<<< HEAD
        foreach ($this->fields as $key => $field) {
            $path = \is_string($key) ? $key : $field;
            $data[] = self::castCell(data_get($row, $path));
=======
        foreach ($this->fields as $field) {
            $value = data_get($row, $field);
            if (\is_object($value)) {
                if (enum_exists($value::class) && method_exists($value, 'getLabel')) {
                    $value = $value->getLabel();
                }
            }
            $data[] = SafeStringCastAction::cast($value);
>>>>>>> laraxot/dev
>>>>>>> .merge_file_xLTHne
        }

        if (\is_object($value) && enum_exists($value::class) && method_exists($value, 'getLabel')) {
            $value = $value->getLabel();
        }

        return SafeStringCastAction::cast($value);
    }
<<<<<<< HEAD

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
=======
>>>>>>> laraxot/dev
}
