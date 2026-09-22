<?php

declare(strict_types=1);
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
use Exception;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
use RuntimeException;
use Webmozart\Assert\Assert;

class ExportXlsAction extends XotBaseAction
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->label('')
            ->tooltip(function (): string {
                $livewire = $this->getLivewire();
                if (! $livewire instanceof ListRecords) {
                    return '';
                }
                $key = app(GetTransKeyAction::class)->execute($livewire::class).'.actions.export_xls.tooltip';
                $translated = __($key);

                return \is_string($translated) && $translated !== $key ? $translated : '';
            })
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
                    throw new Exception('Query is null');
                }
                // Stesso eager di SchedaExporter::modifyQuery: ratings_by_id
                // legge ratings + ratingMorphs. Senza with, se la tabella ha
                // gia' caricato una relation vuota, le celle rating restano vuote.
                $model = $query->getModel();
                $with = [];
                foreach (['ratings', 'ratingMorphs'] as $relation) {
                    if (method_exists($model, $relation)) {
                        $with[] = $relation;
                    }
                }
                if ($with !== []) {
                    $query->with($with);
                }
                $rows = $query->get();

                $resource = $livewire->getResource();

                if (! method_exists($resource, 'getXlsFields')) {
                    // Errore di programmazione (Resource senza il contratto export), non
                    // un caso da ispezionare con un dump: story 5.160, AC 3.
                    throw new RuntimeException('method getXlsFields does not exist in '.$resource);
                }
                $rawFields = $resource::getXlsFields($livewire->tableFilters);
                // Chiave stringa = percorso data_get, valore = intestazione
                // esplicita (title rating); chiave intera = percorso tradotto.
                Assert::isArray($rawFields);
                Assert::allString($rawFields);
                $fields = $rawFields;

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
}
