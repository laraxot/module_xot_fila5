<?php

<<<<<<< HEAD
<<<<<<< .merge_file_1JSdb1
declare(strict_types=1);
=======
<<<<<<< .merge_file_WSznZn
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
>>>>>>> .merge_file_LefUBw
=======
<<<<<<< .merge_file_D03j1Y
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
>>>>>>> .merge_file_MVGGlS
>>>>>>> laraxot/dev
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> .merge_file_LefUBw
namespace Modules\Xot\Filament\Actions\Table;

=======
<<<<<<< .merge_file_D03j1Y
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Table;

<<<<<<< .merge_file_1JSdb1
<<<<<<< HEAD
=======
=======
namespace Modules\Xot\Filament\Actions\Table;

use Exception;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
namespace Modules\Xot\Filament\Actions\Table;

>>>>>>> .merge_file_MVGGlS
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_WSznZn
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_SJBVEj
=======
namespace Modules\Xot\Filament\Actions\Table;

use Exception;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> laraxot/dev
=======
namespace Modules\Xot\Filament\Actions\Table;

>>>>>>> .merge_file_MVGGlS
>>>>>>> laraxot/dev
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
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
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
            ->icon('xot-files.xls')
            ->action(static function (RelationManager $livewire) {
                $livewireClass = $livewire::class;
=======
>>>>>>> .merge_file_LefUBw
<<<<<<< .merge_file_D03j1Y
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
=======
            ->icon('xot-files.xls')
            ->action(static function (RelationManager $livewire) {
                $livewireClass = $livewire::class;
>>>>>>> .merge_file_MVGGlS
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
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
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> .merge_file_LefUBw
=======
<<<<<<< .merge_file_D03j1Y
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
                $transKey = app(GetTransKeyAction::class)->execute($livewire_class);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if ($query === null) {
                    throw new \Exception('Query is null');
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> .merge_file_LefUBw
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
=======
                $transKey = app(GetTransKeyAction::class)->execute($livewireClass);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if ($query === null) {
                    throw new Exception('Query is null');
>>>>>>> laraxot/dev
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> .merge_file_LefUBw
>>>>>>> laraxot/dev
=======
                $transKey = app(GetTransKeyAction::class)->execute($livewireClass);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if (null === $query) {
                    throw new \Exception('Query is null');
>>>>>>> .merge_file_MVGGlS
>>>>>>> laraxot/dev
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
                }
                // ->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                /** @var Builder<Model> $eloquentQuery */
                $eloquentQuery = $query;
                $rows = $eloquentQuery->get();
<<<<<<< HEAD
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
                /** @var array<int, string> $fields */
=======
>>>>>>> .merge_file_LefUBw
                /** @var array<int|string, string> $fields */
=======
<<<<<<< .merge_file_D03j1Y
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                /** @var array<int, string> $fields */
>>>>>>> laraxot/dev
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
                $fields = [];
                if (method_exists($livewire_class, 'getXlsFields')) {
                    $rawFields = $livewire_class::getXlsFields($livewire->tableFilters);
                    Assert::isArray($rawFields);

<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> .merge_file_LefUBw
<<<<<<< HEAD
                    // Chiave stringa = percorso data_get con intestazione esplicita
                    // (title rating); chiave intera = percorso tradotto via transKey.
                    foreach ($rawFields as $key => $field) {
                        if (is_string($key) && is_string($field)) {
                            $fields[$key] = $field;
                        } elseif (is_string($field)) {
=======
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
                    // Ensure fields are properly formatted as array
                    $fields = [];
                    foreach ($rawFields as $key => $field) {
                        if (is_string($field)) {
<<<<<<< .merge_file_1JSdb1
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
                            $fields[] = $field;
                        } elseif (is_array($field) && isset($field['name']) && is_string($field['name'])) {
                            $fields[] = $field['name'];
                        }
                    }
                }
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
=======
                $fields = self::resolveXlsFields($livewireClass, $livewire->tableFilters);
=======
>>>>>>> .merge_file_LefUBw
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
                $fields = self::resolveXlsFields($livewireClass, $livewire->tableFilters);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
                $fields = self::resolveXlsFields($livewireClass, $livewire->tableFilters);
>>>>>>> .merge_file_MVGGlS
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
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
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> .merge_file_LefUBw
<<<<<<< .merge_file_D03j1Y
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_MVGGlS
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw

    /**
     * Chiave stringa = percorso data_get con intestazione esplicita
     * (title rating); chiave intera = percorso tradotto via transKey.
     *
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
     * @param  class-string  $livewireClass
     * @param  array<string, mixed>|null  $tableFilters
=======
>>>>>>> .merge_file_LefUBw
<<<<<<< .merge_file_D03j1Y
     * @param  class-string  $livewireClass
     * @param  array<string, mixed>|null  $tableFilters
=======
     * @param class-string              $livewireClass
     * @param array<string, mixed>|null $tableFilters
     *
>>>>>>> .merge_file_MVGGlS
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
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
<<<<<<< .merge_file_1JSdb1
=======
<<<<<<< .merge_file_WSznZn
=======
>>>>>>> .merge_file_LefUBw
<<<<<<< .merge_file_D03j1Y
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_MVGGlS
<<<<<<< .merge_file_1JSdb1
=======
>>>>>>> .merge_file_SJBVEj
>>>>>>> .merge_file_LefUBw
>>>>>>> laraxot/dev
}
