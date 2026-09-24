<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Table;

<<<<<<< HEAD
=======
=======
namespace Modules\Xot\Filament\Actions\Table;

use Exception;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class ExportXlsTableAction extends XotBaseAction
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip(__('xot::actions.export_xls'))
            // ->icon('fas-file-excel')
<<<<<<< HEAD
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (RelationManager $livewire) {
                $livewire_class = $livewire::class;
=======
<<<<<<< HEAD
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (RelationManager $livewire) {
                $livewire_class = $livewire::class;
=======
            ->icon('xot-files.xls')
            ->action(static function (RelationManager $livewire) {
                $livewireClass = $livewire::class;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                $filterParts = array_map(
                    static fn (mixed $value): string => is_scalar($value) ? (string) $value : '',
                    Arr::flatten($livewire->tableFilters ?? []),
                );
                $filename =
                    class_basename($livewire).
                    '-'.
                    implode('-', $filterParts).
                    '.xlsx';
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                $transKey = app(GetTransKeyAction::class)->execute($livewire_class);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if ($query === null) {
                    throw new \Exception('Query is null');
<<<<<<< HEAD
=======
=======
                $transKey = app(GetTransKeyAction::class)->execute($livewireClass);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if ($query === null) {
                    throw new Exception('Query is null');
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                }
                // ->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                /** @var Builder<Model> $eloquentQuery */
                $eloquentQuery = $query;
                $rows = $eloquentQuery->get();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                /** @var array<int, string> $fields */
                $fields = [];
                if (method_exists($livewire_class, 'getXlsFields')) {
                    $rawFields = $livewire_class::getXlsFields($livewire->tableFilters);
                    Assert::isArray($rawFields);

                    // Ensure fields are properly formatted as array
                    $fields = [];
                    foreach ($rawFields as $key => $field) {
                        if (is_string($field)) {
                            $fields[] = $field;
                        } elseif (is_array($field) && isset($field['name']) && is_string($field['name'])) {
                            $fields[] = $field['name'];
                        }
                    }
                }
<<<<<<< HEAD
=======
=======
                $fields = self::resolveXlsFields($livewireClass, $livewire->tableFilters);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

    /**
     * Chiave stringa = percorso data_get con intestazione esplicita
     * (title rating); chiave intera = percorso tradotto via transKey.
     *
     * @param  class-string  $livewireClass
     * @param  array<string, mixed>|null  $tableFilters
     * @return array<int|string, string>
     */
    private static function resolveXlsFields(string $livewireClass, ?array $tableFilters): array
    {
        $fields = [];
        if (! method_exists($livewireClass, 'getXlsFields')) {
            return $fields;
        }
        $rawFields = $livewireClass::getXlsFields($tableFilters);
        Assert::isArray($rawFields);

        foreach ($rawFields as $key => $field) {
            if (is_string($key) && is_string($field)) {
                $fields[$key] = $field;
            } elseif (is_string($field)) {
                $fields[] = $field;
            } elseif (is_array($field) && isset($field['name']) && is_string($field['name'])) {
                $fields[] = $field['name'];
            }
        }

        return $fields;
    }
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
}
