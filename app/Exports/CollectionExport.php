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
>>>>>>> laraxot/dev
 */
class CollectionExport implements FromCollection, ShouldQueue, WithHeadings, WithMapping
{
    use Exportable;

<<<<<<< HEAD
    /** @var SupportCollection<int|string, mixed>|EloquentCollection<int, Model> */
=======
    /** @var SupportCollection<int, mixed>|EloquentCollection<int, Model> */
>>>>>>> laraxot/dev
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
=======
    /** @var array<int, string>|null */
    public ?array $fields = null;

    /**
     * @param SupportCollection<int, mixed>|EloquentCollection<int, Model> $collection
     * @param array<int, string>                                           $fields
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
            return array_values($this->fields);
=======
            return $this->fields;
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
>>>>>>> laraxot/dev
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
=======
        if (null === $this->fields || empty($this->fields)) {
            Assert::isInstanceOf($row, Model::class);
            $res = app(SafeArrayByModelCastAction::class)->execute($row);

            return array_values(Arr::map($res, function ($value, $_key): string {
                if ($value instanceof \BackedEnum) {
                    if (method_exists($value, 'getLabel')) {
                        return SafeStringCastAction::cast($value->getLabel());
                    }

                    return SafeStringCastAction::cast($value->value);
                }

                return SafeStringCastAction::cast($value);
            }));
>>>>>>> laraxot/dev
        }

        $data = [];

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
        }

        return $data;
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
