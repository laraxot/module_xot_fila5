<?php

<<<<<<< HEAD
<<<<<<< .merge_file_7u6YYQ
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_D03j1Y
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> .merge_file_MVGGlS
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
declare(strict_types=1);
>>>>>>> .merge_file_PFz3l8
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
<<<<<<< .merge_file_7u6YYQ
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Filament\Actions\Table;

=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_D03j1Y
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Table;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_PFz3l8
namespace Modules\Xot\Filament\Actions\Table;

use Exception;
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
namespace Modules\Xot\Filament\Actions\Table;

>>>>>>> .merge_file_MVGGlS
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
use Filament\Actions\Action;
use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Support\Arr;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Webmozart\Assert\Assert;

class ExportXlsTableAction extends Action
>>>>>>> 3792da0d (Check & fix styling)
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip(__('xot::actions.export_xls'))
            // ->icon('fas-file-excel')
<<<<<<< HEAD
<<<<<<< .merge_file_7u6YYQ
<<<<<<< HEAD
<<<<<<< HEAD
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (RelationManager $livewire) {
                $livewire_class = $livewire::class;
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_D03j1Y
=======
>>>>>>> 930f8146 (Check & fix styling)
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
<<<<<<< HEAD
=======
            ->icon('xot-files.xls')
            ->action(static function (RelationManager $livewire) {
                $livewireClass = $livewire::class;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
=======
>>>>>>> .merge_file_PFz3l8
            ->icon('xot-files.xls')
            ->action(static function (RelationManager $livewire) {
                $livewireClass = $livewire::class;
<<<<<<< HEAD
=======
>>>>>>> .merge_file_MVGGlS
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                $filterParts = array_map(
                    static fn (mixed $value): string => is_scalar($value) ? (string) $value : '',
=======
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (RelationManager $livewire) {
                $livewire_class = $livewire::class;
                $filterParts = array_map(
                    static fn ($value): string => is_scalar($value) ? (string) $value : '',
>>>>>>> 3792da0d (Check & fix styling)
                    Arr::flatten($livewire->tableFilters ?? []),
                );
                $filename =
                    class_basename($livewire).
                    '-'.
                    implode('-', $filterParts).
                    '.xlsx';
<<<<<<< HEAD
<<<<<<< .merge_file_7u6YYQ
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_D03j1Y
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
                $transKey = app(GetTransKeyAction::class)->execute($livewire_class);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if ($query === null) {
                    throw new \Exception('Query is null');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_PFz3l8
                $transKey = app(GetTransKeyAction::class)->execute($livewireClass);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if ($query === null) {
                    throw new Exception('Query is null');
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                $transKey = app(GetTransKeyAction::class)->execute($livewireClass);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if (null === $query) {
                    throw new \Exception('Query is null');
>>>>>>> .merge_file_MVGGlS
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                }
                // ->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                /** @var Builder<Model> $eloquentQuery */
                $eloquentQuery = $query;
                $rows = $eloquentQuery->get();
<<<<<<< HEAD
<<<<<<< .merge_file_7u6YYQ
<<<<<<< HEAD
                /** @var array<int|string, string> $fields */
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_D03j1Y
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                /** @var array<int, string> $fields */
>>>>>>> laraxot/dev
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
>>>>>>> 3792da0d (Check & fix styling)
                $fields = [];
                if (method_exists($livewire_class, 'getXlsFields')) {
                    $rawFields = $livewire_class::getXlsFields($livewire->tableFilters);
                    Assert::isArray($rawFields);

<<<<<<< HEAD
<<<<<<< HEAD
                    // Chiave stringa = percorso data_get con intestazione esplicita
                    // (title rating); chiave intera = percorso tradotto via transKey.
                    foreach ($rawFields as $key => $field) {
                        if (is_string($key) && is_string($field)) {
                            $fields[$key] = $field;
                        } elseif (is_string($field)) {
=======
                    // Ensure fields are properly formatted as array
                    $fields = [];
                    foreach ($rawFields as $key => $field) {
                        if (is_string($field)) {
>>>>>>> laraxot/dev
=======
                    // Ensure fields are properly formatted as array<int, string>
                    $fields = [];
                    foreach ($rawFields as $key => $field) {
                        if (is_string($field)) {
>>>>>>> 3792da0d (Check & fix styling)
                            $fields[] = $field;
                        } elseif (is_array($field) && isset($field['name']) && is_string($field['name'])) {
                            $fields[] = $field['name'];
                        }
                    }
                }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
                $fields = self::resolveXlsFields($livewireClass, $livewire->tableFilters);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
                $fields = self::resolveXlsFields($livewireClass, $livewire->tableFilters);
>>>>>>> .merge_file_MVGGlS
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
                $fields = self::resolveXlsFields($livewireClass, $livewire->tableFilters);
>>>>>>> .merge_file_PFz3l8
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
<<<<<<< HEAD
<<<<<<< .merge_file_7u6YYQ
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_D03j1Y
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_MVGGlS
=======
<<<<<<< HEAD
>>>>>>> .merge_file_PFz3l8
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

    /**
     * Chiave stringa = percorso data_get con intestazione esplicita
     * (title rating); chiave intera = percorso tradotto via transKey.
     *
<<<<<<< HEAD
     * @param  class-string  $livewireClass
     * @param  array<string, mixed>|null  $tableFilters
=======
<<<<<<< HEAD
<<<<<<< .merge_file_D03j1Y
     * @param  class-string  $livewireClass
     * @param  array<string, mixed>|null  $tableFilters
=======
     * @param class-string              $livewireClass
     * @param array<string, mixed>|null $tableFilters
     *
>>>>>>> .merge_file_MVGGlS
=======
     * @param  class-string  $livewireClass
     * @param  array<string, mixed>|null  $tableFilters
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_7u6YYQ
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_D03j1Y
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_MVGGlS
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_PFz3l8
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
