<?php

declare(strict_types=1);
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

class ExportXlsAction extends XotBaseAction
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->label('')
            //->tooltip(__('xot::actions.export_xls'))
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

                /** @var array<int|string, string> $fields */
                $fields = [];

                if (method_exists($resource, 'getXlsFields')) {
                    $rawFields = $resource::getXlsFields($livewire->tableFilters);
                    // Chiave stringa = percorso data_get, valore = intestazione
                    // esplicita (title rating); chiave intera = percorso tradotto.
                    Assert::isArray($rawFields);
                    Assert::allString($rawFields);
                    $fields = $rawFields;
                } else {
                    dddx('method xotFields does not exist in '.$resource);
                }

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
}
