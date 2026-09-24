<?php

<<<<<<< HEAD
<<<<<<< .merge_file_KQkpn4
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
=======
<<<<<<< .merge_file_zArYCl
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
>>>>>>> .merge_file_3PihIp
>>>>>>> laraxot/dev
>>>>>>> .merge_file_lQLZTx
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
<<<<<<< .merge_file_KQkpn4
=======
namespace Modules\Xot\Filament\Actions\Header;

=======
<<<<<<< .merge_file_zArYCl
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_lQLZTx
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

<<<<<<< .merge_file_KQkpn4
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_lQLZTx
=======
namespace Modules\Xot\Filament\Actions\Header;

use Exception;
>>>>>>> laraxot/dev
<<<<<<< .merge_file_KQkpn4
=======
>>>>>>> laraxot/dev
=======
namespace Modules\Xot\Filament\Actions\Header;

>>>>>>> .merge_file_3PihIp
>>>>>>> laraxot/dev
>>>>>>> .merge_file_lQLZTx
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\LazyCollection;
use Modules\Xot\Actions\Export\ExportXlsByLazyCollection;
use Modules\Xot\Actions\Export\ExportXlsByQuery;
use Modules\Xot\Actions\Export\ExportXlsStreamByLazyCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class ExportXlsLazyAction extends XotBaseAction
{
    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
<<<<<<< .merge_file_KQkpn4
=======
=======
<<<<<<< .merge_file_zArYCl
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_lQLZTx
        $this->label((string) __('xot::actions.export_xls.label'))
            ->tooltip((string) __('xot::actions.export_xls.tooltip'))
            ->icon((string) __('xot::actions.export_xls.icon'))
            ->modalHeading((string) __('xot::actions.export_xls.modal.heading'))
            ->modalDescription((string) __('xot::actions.export_xls.modal.description'))
            ->modalSubmitActionLabel((string) __('xot::actions.export_xls.modal.confirm'))
            ->modalCancelActionLabel((string) __('xot::actions.export_xls.modal.cancel'))
            ->successNotificationTitle((string) __('xot::actions.export_xls.success'))
<<<<<<< .merge_file_KQkpn4
=======
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_3PihIp
>>>>>>> .merge_file_lQLZTx
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
<<<<<<< .merge_file_KQkpn4
=======
<<<<<<< .merge_file_zArYCl
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_3PihIp
>>>>>>> .merge_file_lQLZTx
>>>>>>> laraxot/dev
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
                $resource = $livewire->getResource();
<<<<<<< .merge_file_KQkpn4
                /** @var array<int, string> $fields */
=======
                /** @var array<int|string, string> $fields */
=======
<<<<<<< .merge_file_zArYCl
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
                $resource = $livewire->getResource();
                /** @var array<int, string> $fields */
>>>>>>> laraxot/dev
>>>>>>> .merge_file_lQLZTx
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
                    $rawFields = $resource::getXlsFields($livewire->tableFilters);
                    if (is_array($rawFields)) {
                        $fields = array_map(
                            static function (mixed $field): string {
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

<<<<<<< .merge_file_KQkpn4
=======
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
>>>>>>> .merge_file_lQLZTx
                $lazy = $livewire->getFilteredTableQuery();
                if ($lazy === null) {
                    throw new \Exception('Query is null');
                }

                if ($lazy->count() < 7) {
<<<<<<< .merge_file_KQkpn4
=======
<<<<<<< HEAD
                    // PHPStan knows $lazy is Builder|Relation here, no need for Assert
                    return app(ExportXlsByQuery::class)->execute($lazy, $filename, $pathFields, null);
=======
>>>>>>> .merge_file_lQLZTx
                    /** @var array<int, string> $stringFields */
                    $stringFields = array_values($fields);

                    // PHPStan knows $lazy is Builder|Relation here, no need for Assert
                    return app(ExportXlsByQuery::class)->execute($lazy, $filename, $stringFields, null);
<<<<<<< .merge_file_KQkpn4
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_lQLZTx
=======
                $pathFields = self::resolvePathFields($livewire);

                $lazy = $livewire->getFilteredTableQuery();
                if ($lazy === null) {
                    throw new Exception('Query is null');
<<<<<<< .merge_file_KQkpn4
=======
=======
                $pathFields = self::resolvePathFields($livewire);

                $lazy = $livewire->getFilteredTableQuery();
                if (null === $lazy) {
                    throw new \Exception('Query is null');
>>>>>>> .merge_file_3PihIp
>>>>>>> .merge_file_lQLZTx
                }

                if ($lazy->count() < 7) {
                    // PHPStan knows $lazy is Builder|Relation here, no need for Assert
                    return app(ExportXlsByQuery::class)->execute($lazy, $filename, $pathFields, null);
<<<<<<< .merge_file_KQkpn4
=======
<<<<<<< .merge_file_zArYCl
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_3PihIp
>>>>>>> .merge_file_lQLZTx
>>>>>>> laraxot/dev
                }

                $lazyCursor = $lazy->cursor();
                /** @var LazyCollection<int, mixed> $exportCollection */
                $exportCollection = $lazyCursor->map(static fn (mixed $row): mixed => $row);

                if ($lazyCursor->count() > 3000) {
                    return app(ExportXlsStreamByLazyCollection::class)
<<<<<<< HEAD
<<<<<<< .merge_file_KQkpn4
=======
=======
<<<<<<< .merge_file_zArYCl
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_lQLZTx
                        ->execute($exportCollection, $filename, $transKey, array_values($fields));
                }

                return app(ExportXlsByLazyCollection::class)->execute($exportCollection, $filename, array_values($fields));
<<<<<<< .merge_file_KQkpn4
=======
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_3PihIp
>>>>>>> laraxot/dev
>>>>>>> .merge_file_lQLZTx
                        ->execute($exportCollection, $filename, $transKey, $pathFields);
                }

                return app(ExportXlsByLazyCollection::class)->execute($exportCollection, $filename, $pathFields);
<<<<<<< .merge_file_KQkpn4
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_zArYCl
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_3PihIp
>>>>>>> .merge_file_lQLZTx
>>>>>>> laraxot/dev
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
<<<<<<< HEAD
=======
<<<<<<< .merge_file_KQkpn4
=======
<<<<<<< .merge_file_zArYCl
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_3PihIp
>>>>>>> .merge_file_lQLZTx

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
<<<<<<< .merge_file_KQkpn4
=======
<<<<<<< .merge_file_zArYCl
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_3PihIp
>>>>>>> .merge_file_lQLZTx
>>>>>>> laraxot/dev
}
