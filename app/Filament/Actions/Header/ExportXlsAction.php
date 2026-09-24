<?php

<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< .merge_file_nmngVd
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
declare(strict_types=1);
>>>>>>> .merge_file_GC1Ny2
>>>>>>> laraxot/dev
=======
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
declare(strict_types=1);
>>>>>>> .merge_file_HOhC6M
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_nmngVd
<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_GC1Ny2
=======
declare(strict_types=1);

=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HOhC6M
namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_nmngVd
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
use Exception;
=======
>>>>>>> .merge_file_GC1Ny2
=======
=======
use Exception;
>>>>>>> 8d801bbe (Check & fix styling)
=======
use Exception;
>>>>>>> .merge_file_HOhC6M
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\Export\GetExportFileNameAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Exports\XlsFieldsExporter;
use Modules\Xot\Filament\Actions\XotBaseAction;
<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
use RuntimeException;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_GC1Ny2
>>>>>>> laraxot/dev
=======
use RuntimeException;
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
use RuntimeException;
>>>>>>> .merge_file_HOhC6M
use Webmozart\Assert\Assert;

class ExportXlsAction extends XotBaseAction
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->label('')
<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< HEAD
            //->tooltip(__('xot::actions.export_xls'))
=======
<<<<<<< .merge_file_nmngVd
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
            ->tooltip(__('xot::actions.export_xls'))
>>>>>>> laraxot/dev
=======
            ->tooltip(__('xot::actions.export_xls'))
>>>>>>> 8d801bbe (Check & fix styling)
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

<<<<<<< HEAD
<<<<<<< HEAD
                /** @var array<int|string, string> $fields */
                $fields = [];

                if (method_exists($resource, 'getXlsFields')) {
                    $rawFields = $resource::getXlsFields($livewire->tableFilters);
                    // Chiave stringa = percorso data_get, valore = intestazione
                    // esplicita (title rating); chiave intera = percorso tradotto.
                    Assert::isArray($rawFields);
                    Assert::allString($rawFields);
                    $fields = $rawFields;
=======
=======
>>>>>>> 8d801bbe (Check & fix styling)
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
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
                } else {
                    dddx('method xotFields does not exist in '.$resource);
                }

<<<<<<< HEAD
<<<<<<< HEAD
                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
=======
                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, array_values($fields));
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_GC1Ny2
=======
                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, array_values($fields));
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_HOhC6M
            ->iconButton()
            ->color('success')
            ->tooltip(function (): string {
                $livewire = $this->getLivewire();
                if (! $livewire instanceof ListRecords) {
                    return (string) __('xot::export_xls.tooltip');
                }
                $key = app(GetTransKeyAction::class)->execute($livewire::class).'.actions.export_xls.tooltip';
                $translated = __($key);

<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
                if (\is_string($translated) && $translated !== $key && $translated !== 'export_xls') {
=======
                if (\is_string($translated) && $translated !== $key && 'export_xls' !== $translated) {
>>>>>>> .merge_file_GC1Ny2
=======
                if (\is_string($translated) && $translated !== $key && $translated !== 'export_xls') {
>>>>>>> 8d801bbe (Check & fix styling)
=======
                if (\is_string($translated) && $translated !== $key && $translated !== 'export_xls') {
>>>>>>> .merge_file_HOhC6M
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
<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
                if ($query === null) {
                    throw new Exception('Query is null');
=======
                if (null === $query) {
                    throw new \Exception('Query is null');
>>>>>>> .merge_file_GC1Ny2
=======
                if ($query === null) {
                    throw new Exception('Query is null');
>>>>>>> 8d801bbe (Check & fix styling)
=======
                if ($query === null) {
                    throw new Exception('Query is null');
>>>>>>> .merge_file_HOhC6M
                }
                // Stesso eager del canale nativo (XotBaseExporter::modifyQuery).
                XlsFieldsExporter::modifyQuery($query);

                $fields = self::resolveXlsFields($livewire);

<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
                if ($fields === []) {
=======
                if ([] === $fields) {
>>>>>>> .merge_file_GC1Ny2
=======
                if ($fields === []) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
                if ($fields === []) {
>>>>>>> .merge_file_HOhC6M
                    // Stesso esito del nativo (CanExportRecords, columnMap vuoto):
                    // avviso e stop. Senza fields CollectionExport farebbe il dump
                    // di tutti gli attributi del model (story Xot/5.162).
                    self::notifyNoColumns();
                    $action->halt();

                    return null;
                }

                return app(ExportXlsByCollection::class)->execute($query->get(), $filename, $transKey, $fields);
<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_GC1Ny2
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HOhC6M
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_GC1Ny2
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_HOhC6M

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
<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
            throw new RuntimeException('method getXlsFields does not exist in '.$resource);
=======
            throw new \RuntimeException('method getXlsFields does not exist in '.$resource);
>>>>>>> .merge_file_GC1Ny2
=======
            throw new RuntimeException('method getXlsFields does not exist in '.$resource);
>>>>>>> 8d801bbe (Check & fix styling)
=======
            throw new RuntimeException('method getXlsFields does not exist in '.$resource);
>>>>>>> .merge_file_HOhC6M
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
<<<<<<< .merge_file_LGDQyX
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_GC1Ny2
=======
>>>>>>> 8d801bbe (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HOhC6M
}
