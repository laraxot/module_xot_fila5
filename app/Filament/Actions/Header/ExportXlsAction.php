<?php

<<<<<<< HEAD
<<<<<<< .merge_file_x387bc
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_nmngVd
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
>>>>>>> .merge_file_GC1Ny2
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
declare(strict_types=1);
>>>>>>> .merge_file_W5RutX
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
<<<<<<< .merge_file_x387bc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_nmngVd
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
declare(strict_types=1);

=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
>>>>>>> .merge_file_GC1Ny2
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
declare(strict_types=1);

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_W5RutX
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
<<<<<<< HEAD
<<<<<<< .merge_file_x387bc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_nmngVd
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_W5RutX
use Exception;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_GC1Ny2
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\Export\GetExportFileNameAction;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Exports\XlsFieldsExporter;
use Modules\Xot\Filament\Actions\XotBaseAction;
<<<<<<< HEAD
use RuntimeException;
=======
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
use RuntimeException;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_GC1Ny2
=======
use RuntimeException;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
use Webmozart\Assert\Assert;

class ExportXlsAction extends XotBaseAction
=======
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Webmozart\Assert\Assert;

class ExportXlsAction extends Action
>>>>>>> 3792da0d (Check & fix styling)
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->label('')
<<<<<<< HEAD
<<<<<<< .merge_file_x387bc
<<<<<<< HEAD
<<<<<<< HEAD
            //->tooltip(__('xot::actions.export_xls'))
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_nmngVd
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
            ->tooltip(__('xot::actions.export_xls'))
>>>>>>> laraxot/dev
=======
            ->tooltip(__('xot::actions.export_xls'))
>>>>>>> 3792da0d (Check & fix styling)
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
<<<<<<< HEAD
                if ($query === null) {
=======
                if (null === $query) {
>>>>>>> 3792da0d (Check & fix styling)
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
>>>>>>> 3792da0d (Check & fix styling)
                /** @var array<int, string> $fields */
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
<<<<<<< HEAD
>>>>>>> laraxot/dev
                } else {
                    dddx('method xotFields does not exist in '.$resource);
                }

<<<<<<< HEAD
                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
=======
                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, array_values($fields));
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_GC1Ny2
=======
<<<<<<< HEAD
>>>>>>> .merge_file_W5RutX
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            ->iconButton()
            ->color('success')
            ->tooltip(function (): string {
                $livewire = $this->getLivewire();
                if (! $livewire instanceof ListRecords) {
                    return (string) __('xot::export_xls.tooltip');
                }
                $key = app(GetTransKeyAction::class)->execute($livewire::class).'.actions.export_xls.tooltip';
                $translated = __($key);

<<<<<<< HEAD
                if (\is_string($translated) && $translated !== $key && $translated !== 'export_xls') {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
                if (\is_string($translated) && $translated !== $key && $translated !== 'export_xls') {
=======
                if (\is_string($translated) && $translated !== $key && 'export_xls' !== $translated) {
>>>>>>> .merge_file_GC1Ny2
=======
                if (\is_string($translated) && $translated !== $key && $translated !== 'export_xls') {
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
                if ($query === null) {
                    throw new Exception('Query is null');
=======
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
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                }
                // Stesso eager del canale nativo (XotBaseExporter::modifyQuery).
                XlsFieldsExporter::modifyQuery($query);

                $fields = self::resolveXlsFields($livewire);

<<<<<<< HEAD
                if ($fields === []) {
=======
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
                if ($fields === []) {
=======
                if ([] === $fields) {
>>>>>>> .merge_file_GC1Ny2
=======
                if ($fields === []) {
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                    // Stesso esito del nativo (CanExportRecords, columnMap vuoto):
                    // avviso e stop. Senza fields CollectionExport farebbe il dump
                    // di tutti gli attributi del model (story Xot/5.162).
                    self::notifyNoColumns();
                    $action->halt();

                    return null;
                }

                return app(ExportXlsByCollection::class)->execute($query->get(), $filename, $transKey, $fields);
<<<<<<< HEAD
<<<<<<< .merge_file_x387bc
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_nmngVd
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_GC1Ny2
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
                }

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, array_values($fields));
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_W5RutX
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
<<<<<<< .merge_file_x387bc
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_nmngVd
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_GC1Ny2
=======
<<<<<<< HEAD
>>>>>>> .merge_file_W5RutX
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

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
<<<<<<< HEAD
            throw new RuntimeException('method getXlsFields does not exist in '.$resource);
=======
<<<<<<< HEAD
<<<<<<< .merge_file_nmngVd
            throw new RuntimeException('method getXlsFields does not exist in '.$resource);
=======
            throw new \RuntimeException('method getXlsFields does not exist in '.$resource);
>>>>>>> .merge_file_GC1Ny2
=======
            throw new RuntimeException('method getXlsFields does not exist in '.$resource);
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_x387bc
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_nmngVd
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_GC1Ny2
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_W5RutX
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
}
