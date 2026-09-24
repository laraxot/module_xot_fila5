<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
=======

use Exception;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\Export\GetExportFileNameAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Exports\XlsFieldsExporter;
use Modules\Xot\Filament\Actions\XotBaseAction;
use RuntimeException;
>>>>>>> laraxot/dev
use Webmozart\Assert\Assert;

class ExportXlsAction extends XotBaseAction
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->label('')
<<<<<<< HEAD
=======
            ->iconButton()
            ->color('success')
            ->tooltip(function (): string {
                $livewire = $this->getLivewire();
                if (! $livewire instanceof ListRecords) {
                    return (string) __('xot::export_xls.tooltip');
                }
                $key = app(GetTransKeyAction::class)->execute($livewire::class).'.actions.export_xls.tooltip';
                $translated = __($key);

                if (\is_string($translated) && $translated !== $key && $translated !== 'export_xls') {
                    return $translated;
                }

                return (string) __('xot::export_xls.tooltip');
            })
            ->icon('xot-files.xls')
            ->action(static function (ListRecords $livewire, ExportXlsAction $action) {
                // Stesso nome file del canale nativo (XotBaseExportAction::fileName).
                $filename = app(GetExportFileNameAction::class)->execute($livewire).'.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';
                // Filtri + search + sort: stesse righe nello stesso ordine di
                // `getTableQueryForExport()` usato dal nativo (story Ptv/5.165).
                $query = $livewire->getFilteredSortedTableQuery();
                if ($query === null) {
                    throw new Exception('Query is null');
                }
                // Stesso eager del canale nativo (XotBaseExporter::modifyQuery).
                XlsFieldsExporter::modifyQuery($query);

                $fields = self::resolveXlsFields($livewire);

                if ($fields === []) {
                    // Stesso esito del nativo (CanExportRecords, columnMap vuoto):
                    // avviso e stop. Senza fields CollectionExport farebbe il dump
                    // di tutti gli attributi del model (story Xot/5.162).
                    self::notifyNoColumns();
                    $action->halt();

                    return null;
                }

                return app(ExportXlsByCollection::class)->execute($query->get(), $filename, $transKey, $fields);
>>>>>>> laraxot/dev
            ->tooltip(__('xot::actions.export_xls'))
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (ListRecords $livewire) {
                $filename =
                    class_basename($livewire).
                    '-'.
                    collect($livewire->tableFilters)->flatten()->implode('-').
                    '.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                if ($query === null) {
                    throw new \Exception('Query is null');
                }
                $rows = $query->get();

                $resource = $livewire->getResource();

                /** @var array<int, string> $fields */
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
                } else {
                    dddx('method xotFields does not exist in '.$resource);
                }

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, array_values($fields));
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
<<<<<<< HEAD
=======

    /**
     * Chiave stringa = percorso data_get, valore = intestazione esplicita
     * (title rating); chiave intera = percorso tradotto.
     *
     * @return array<int|string, string>
     */
    private static function resolveXlsFields(ListRecords $livewire): array
    {
        $resource = $livewire->getResource();

        if (! method_exists($resource, 'getXlsFields')) {
            // Errore di programmazione (Resource senza il contratto export), non
            // un caso da ispezionare con un dump: story 5.160, AC 3.
            throw new RuntimeException('method getXlsFields does not exist in '.$resource);
        }
        $rawFields = $resource::getXlsFields($livewire->tableFilters ?? []);
        Assert::isArray($rawFields);
        Assert::allString($rawFields);

        return $rawFields;
    }

    private static function notifyNoColumns(): void
    {
        Notification::make()
            ->title(SafeStringCastAction::cast(__('filament-actions::export.notifications.no_columns.title')))
            ->body(SafeStringCastAction::cast(__('filament-actions::export.notifications.no_columns.body')))
            ->danger()
            ->send();
    }
>>>>>>> laraxot/dev
}
