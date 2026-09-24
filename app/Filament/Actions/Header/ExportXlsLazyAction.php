<?php

<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
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
>>>>>>> .merge_file_3PihIp
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
declare(strict_types=1);
>>>>>>> .merge_file_flDjQL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Filament\Actions\Header;

=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
namespace Modules\Xot\Filament\Actions\Header;

use Exception;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
namespace Modules\Xot\Filament\Actions\Header;

>>>>>>> .merge_file_3PihIp
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
use Filament\Actions\Action;
>>>>>>> 3792da0d (Check & fix styling)
=======
namespace Modules\Xot\Filament\Actions\Header;

use Exception;
>>>>>>> .merge_file_flDjQL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\LazyCollection;
use Modules\Xot\Actions\Export\ExportXlsByLazyCollection;
use Modules\Xot\Actions\Export\ExportXlsByQuery;
use Modules\Xot\Actions\Export\ExportXlsStreamByLazyCollection;
use Modules\Xot\Actions\GetTransKeyAction;
<<<<<<< HEAD
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class ExportXlsLazyAction extends XotBaseAction
=======
use Webmozart\Assert\Assert;

class ExportXlsLazyAction extends Action
>>>>>>> 3792da0d (Check & fix styling)
{
    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
        $this->label((string) __('xot::actions.export_xls.label'))
            ->tooltip((string) __('xot::actions.export_xls.tooltip'))
            ->icon((string) __('xot::actions.export_xls.icon'))
            ->modalHeading((string) __('xot::actions.export_xls.modal.heading'))
            ->modalDescription((string) __('xot::actions.export_xls.modal.description'))
            ->modalSubmitActionLabel((string) __('xot::actions.export_xls.modal.confirm'))
            ->modalCancelActionLabel((string) __('xot::actions.export_xls.modal.cancel'))
            ->successNotificationTitle((string) __('xot::actions.export_xls.success'))
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_3PihIp
=======
<<<<<<< HEAD
>>>>>>> .merge_file_flDjQL
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        $this->label('')
            ->iconButton()
            ->color('success')
            ->tooltip((string) __('xot::export_xls.tooltip'))
            ->icon('xot-files.xls')
            ->modalHeading((string) __('xot::export_xls.actions.export_xls.modal.heading'))
            ->modalDescription((string) __('xot::export_xls.actions.export_xls.modal.description'))
            ->modalSubmitActionLabel((string) __('xot::export_xls.actions.export_xls.modal.confirm'))
            ->modalCancelActionLabel((string) __('xot::export_xls.actions.export_xls.modal.cancel'))
            ->successNotificationTitle((string) __('xot::export_xls.actions.export_xls.success'))
<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_3PihIp
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_flDjQL
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            ->requiresConfirmation()
            ->action(static function (ListRecords $livewire) {
                $filename =
                    class_basename($livewire).
                    '-'.
                    collect($livewire->tableFilters)->flatten()->implode('-').
                    '.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';

<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
<<<<<<< HEAD
<<<<<<< HEAD
                $resource = $livewire->getResource();
                /** @var array<int|string, string> $fields */
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                $resource = $livewire->getResource();
                /** @var array<int, string> $fields */
>>>>>>> laraxot/dev
=======
                $resource = $livewire->getResource();
                /** @var array<int, string> $fields */
>>>>>>> 3792da0d (Check & fix styling)
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
                    $rawFields = $resource::getXlsFields($livewire->tableFilters);
                    if (is_array($rawFields)) {
                        $fields = array_map(
<<<<<<< HEAD
                            static function (mixed $field): string {
=======
                            static function ($field): string {
>>>>>>> 3792da0d (Check & fix styling)
                                // Handle objects with __toString method
                                if (is_object($field) && method_exists($field, '__toString')) {
                                    $stringValue = $field->__toString();

                                    // Type narrowing for PHPStan Level 10
                                    return is_string($stringValue) ? $stringValue : '';
                                }

                                // Handle scalar values
                                if (is_scalar($field)) {
                                    return (string) $field;
                                }

                                return '';
                            },
                            $rawFields
                        );
                    }
                    Assert::isArray($fields);
                }

<<<<<<< HEAD
<<<<<<< HEAD
                // Il canale lazy lavora sui soli percorsi data_get: le intestazioni
                // esplicite (chiave stringa => label) non sono supportate da
                // ExportXlsByQuery/ExportXlsByLazyCollection e degradano al path.
                /** @var array<int, string> $pathFields */
                $pathFields = [];
                foreach ($fields as $key => $field) {
                    $pathFields[] = \is_string($key) ? $key : $field;
                }

=======
>>>>>>> laraxot/dev
                $lazy = $livewire->getFilteredTableQuery();
                if ($lazy === null) {
=======
                $lazy = $livewire->getFilteredTableQuery();
                if (null === $lazy) {
>>>>>>> 3792da0d (Check & fix styling)
                    throw new \Exception('Query is null');
                }

                if ($lazy->count() < 7) {
<<<<<<< HEAD
<<<<<<< HEAD
                    // PHPStan knows $lazy is Builder|Relation here, no need for Assert
                    return app(ExportXlsByQuery::class)->execute($lazy, $filename, $pathFields, null);
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
                    /** @var array<int, string> $stringFields */
                    $stringFields = array_values($fields);

                    // PHPStan knows $lazy is Builder|Relation here, no need for Assert
                    return app(ExportXlsByQuery::class)->execute($lazy, $filename, $stringFields, null);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_flDjQL
                $pathFields = self::resolvePathFields($livewire);

                $lazy = $livewire->getFilteredTableQuery();
                if ($lazy === null) {
                    throw new Exception('Query is null');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
                $pathFields = self::resolvePathFields($livewire);

                $lazy = $livewire->getFilteredTableQuery();
                if (null === $lazy) {
                    throw new \Exception('Query is null');
>>>>>>> .merge_file_3PihIp
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                }

                if ($lazy->count() < 7) {
                    // PHPStan knows $lazy is Builder|Relation here, no need for Assert
                    return app(ExportXlsByQuery::class)->execute($lazy, $filename, $pathFields, null);
<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_3PihIp
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_flDjQL
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                }

                $lazyCursor = $lazy->cursor();
                /** @var LazyCollection<int, mixed> $exportCollection */
                $exportCollection = $lazyCursor->map(static fn (mixed $row): mixed => $row);

                if ($lazyCursor->count() > 3000) {
                    return app(ExportXlsStreamByLazyCollection::class)
<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
                        ->execute($exportCollection, $filename, $transKey, array_values($fields));
                }

                return app(ExportXlsByLazyCollection::class)->execute($exportCollection, $filename, array_values($fields));
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_3PihIp
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_flDjQL
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                        ->execute($exportCollection, $filename, $transKey, $pathFields);
                }

                return app(ExportXlsByLazyCollection::class)->execute($exportCollection, $filename, $pathFields);
<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_3PihIp
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_flDjQL
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_3PihIp
=======
<<<<<<< HEAD
>>>>>>> .merge_file_flDjQL
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

    /**
     * Il canale lazy lavora sui soli percorsi data_get: le intestazioni
     * esplicite (chiave stringa => label) non sono supportate da
     * ExportXlsByQuery/ExportXlsByLazyCollection e degradano al path.
     *
     * @return array<int, string>
     */
    private static function resolvePathFields(ListRecords $livewire): array
    {
        $resource = $livewire->getResource();
        if (! method_exists($resource, 'getXlsFields')) {
            return [];
        }

        $rawFields = $resource::getXlsFields($livewire->tableFilters);
        Assert::isArray($rawFields);

        $pathFields = [];
        foreach ($rawFields as $key => $field) {
            if (\is_string($key)) {
                $pathFields[] = $key;

                continue;
            }
            $pathFields[] = self::normalizeField($field);
        }

        return $pathFields;
    }

    private static function normalizeField(mixed $field): string
    {
        if (is_object($field) && method_exists($field, '__toString')) {
            $stringValue = $field->__toString();

            return is_string($stringValue) ? $stringValue : '';
        }

        if (is_scalar($field)) {
            return (string) $field;
        }

        return '';
    }
<<<<<<< HEAD
<<<<<<< .merge_file_uux3Fc
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zArYCl
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_3PihIp
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_flDjQL
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
