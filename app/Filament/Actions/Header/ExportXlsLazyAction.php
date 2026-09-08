<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

<<<<<<< HEAD
use Exception;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
=======
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\LazyCollection;
>>>>>>> c7fd73eb (.)
use Modules\Xot\Actions\Export\ExportXlsByLazyCollection;
use Modules\Xot\Actions\Export\ExportXlsByQuery;
use Modules\Xot\Actions\Export\ExportXlsStreamByLazyCollection;
use Modules\Xot\Actions\GetTransKeyAction;
<<<<<<< HEAD
use Webmozart\Assert\Assert;

class ExportXlsLazyAction extends Action
=======
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class ExportXlsLazyAction extends XotBaseAction
>>>>>>> c7fd73eb (.)
{
    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
        $this->label(__('xot::actions.export_xls.label'))
            ->tooltip(__('xot::actions.export_xls.tooltip'))
            ->icon(__('xot::actions.export_xls.icon'))
            ->modalHeading(__('xot::actions.export_xls.modal.heading'))
            ->modalDescription(__('xot::actions.export_xls.modal.description'))
            ->modalSubmitActionLabel(__('xot::actions.export_xls.modal.confirm'))
            ->modalCancelActionLabel(__('xot::actions.export_xls.modal.cancel'))
            ->successNotificationTitle(__('xot::actions.export_xls.success'))
            ->requiresConfirmation()
            ->action(static function (ListRecords $livewire) {
                $filename =
                    class_basename($livewire) .
                    '-' .
                    collect($livewire->tableFilters)->flatten()->implode('-') .
=======
        $this->label((string) __('xot::actions.export_xls.label'))
            ->tooltip((string) __('xot::actions.export_xls.tooltip'))
            ->icon((string) __('xot::actions.export_xls.icon'))
            ->modalHeading((string) __('xot::actions.export_xls.modal.heading'))
            ->modalDescription((string) __('xot::actions.export_xls.modal.description'))
            ->modalSubmitActionLabel((string) __('xot::actions.export_xls.modal.confirm'))
            ->modalCancelActionLabel((string) __('xot::actions.export_xls.modal.cancel'))
            ->successNotificationTitle((string) __('xot::actions.export_xls.success'))
            ->requiresConfirmation()
            ->action(static function (ListRecords $livewire) {
                $filename =
                    class_basename($livewire).
                    '-'.
                    collect($livewire->tableFilters)->flatten()->implode('-').
>>>>>>> c7fd73eb (.)
                    '.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';

                $resource = $livewire->getResource();
                /** @var array<int, string> $fields */
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
                    $rawFields = $resource::getXlsFields($livewire->tableFilters);
                    if (is_array($rawFields)) {
<<<<<<< HEAD
                        $fields = array_map(static function ($field): string {
                            if (is_object($field) && method_exists($field, '__toString')) {
                                return $field->__toString();
                            }
                            if (is_scalar($field)) {
                                return (string) $field;
                            }
                            return '';
                        }, $rawFields);
=======
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
>>>>>>> c7fd73eb (.)
                    }
                    Assert::isArray($fields);
                }

                $lazy = $livewire->getFilteredTableQuery();
                if ($lazy === null) {
<<<<<<< HEAD
                    throw new Exception('Query is null');
                }

                if ($lazy->count() < 7) {
                    Assert::isInstanceOf($lazy, Builder::class);

                    /** @var array<int, string> $stringFields */
                    $stringFields = array_values($fields);

=======
                    throw new \Exception('Query is null');
                }

                if ($lazy->count() < 7) {
                    /** @var array<int, string> $stringFields */
                    $stringFields = array_values($fields);

                    // PHPStan knows $lazy is Builder|Relation here, no need for Assert
>>>>>>> c7fd73eb (.)
                    return app(ExportXlsByQuery::class)->execute($lazy, $filename, $stringFields, null);
                }

                $lazyCursor = $lazy->cursor();
<<<<<<< HEAD

                if ($lazyCursor->count() > 3000) {
                    return app(ExportXlsStreamByLazyCollection::class)
                        ->execute($lazyCursor, $filename, $transKey, array_values($fields));
                }

                return app(ExportXlsByLazyCollection::class)->execute($lazyCursor, $filename, array_values($fields));
            });
    }

    public static function getDefaultName(): null|string
=======
                /** @var LazyCollection<int, mixed> $exportCollection */
                $exportCollection = $lazyCursor->map(static fn (mixed $row): mixed => $row);

                if ($lazyCursor->count() > 3000) {
                    return app(ExportXlsStreamByLazyCollection::class)
                        ->execute($exportCollection, $filename, $transKey, array_values($fields));
                }

                return app(ExportXlsByLazyCollection::class)->execute($exportCollection, $filename, array_values($fields));
            });
    }

    public static function getDefaultName(): ?string
>>>>>>> c7fd73eb (.)
    {
        return 'export_xls';
    }
}
