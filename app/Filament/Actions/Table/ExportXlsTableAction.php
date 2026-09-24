<?php

<<<<<<< .merge_file_ZfvPsI
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_t8NjOA
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< .merge_file_ZfvPsI
=======
<<<<<<< HEAD
>>>>>>> .merge_file_t8NjOA
namespace Modules\Xot\Filament\Actions\Table;

use Exception;
use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class ExportXlsTableAction extends XotBaseAction
=======
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Table;

use Filament\Actions\Action;
use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Support\Arr;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Webmozart\Assert\Assert;

class ExportXlsTableAction extends Action
>>>>>>> laraxot/dev
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip(__('xot::actions.export_xls'))
            // ->icon('fas-file-excel')
<<<<<<< .merge_file_ZfvPsI
            ->icon('xot-files.xls')
=======
<<<<<<< HEAD
            ->icon('xot-files.xls')
            ->action(static function (RelationManager $livewire) {
                $livewireClass = $livewire::class;
                $filterParts = array_map(
                    static fn (mixed $value): string => is_scalar($value) ? (string) $value : '',
=======
            ->icon('heroicon-o-arrow-down-tray')
>>>>>>> .merge_file_t8NjOA
            ->action(static function (RelationManager $livewire) {
                $livewireClass = $livewire::class;
                $filterParts = array_map(
                    static fn ($value): string => is_scalar($value) ? (string) $value : '',
>>>>>>> laraxot/dev
                    Arr::flatten($livewire->tableFilters ?? []),
                );
                $filename =
                    class_basename($livewire).
                    '-'.
                    implode('-', $filterParts).
                    '.xlsx';
<<<<<<< .merge_file_ZfvPsI
=======
<<<<<<< HEAD
>>>>>>> .merge_file_t8NjOA
                $transKey = app(GetTransKeyAction::class)->execute($livewireClass);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if ($query === null) {
                    throw new Exception('Query is null');
                }
                // ->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                /** @var Builder<Model> $eloquentQuery */
                $eloquentQuery = $query;
                $rows = $eloquentQuery->get();
                $fields = self::resolveXlsFields($livewireClass, $livewire->tableFilters);
<<<<<<< .merge_file_ZfvPsI
=======
=======
                $transKey = app(GetTransKeyAction::class)->execute($livewire_class);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if (null === $query) {
                    throw new \Exception('Query is null');
                }
                // ->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                /** @var \Illuminate\Database\Eloquent\Builder<\Illuminate\Database\Eloquent\Model> $eloquentQuery */
                $eloquentQuery = $query;
                $rows = $eloquentQuery->get();
                /** @var array<int, string> $fields */
                $fields = [];
                if (method_exists($livewire_class, 'getXlsFields')) {
                    $rawFields = $livewire_class::getXlsFields($livewire->tableFilters);
                    Assert::isArray($rawFields);

                    // Ensure fields are properly formatted as array<int, string>
                    $fields = [];
                    foreach ($rawFields as $key => $field) {
                        if (is_string($field)) {
                            $fields[] = $field;
                        } elseif (is_array($field) && isset($field['name']) && is_string($field['name'])) {
                            $fields[] = $field['name'];
                        }
                    }
                }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_t8NjOA

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
<<<<<<< .merge_file_ZfvPsI
=======
<<<<<<< HEAD
>>>>>>> .merge_file_t8NjOA

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
<<<<<<< .merge_file_ZfvPsI
=======
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_t8NjOA
}
