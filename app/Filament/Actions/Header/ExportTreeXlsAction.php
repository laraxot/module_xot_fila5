<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Collection;

/**
 * Undocumented class.
 *
 * @property HasRecursiveRelationshipsContract $record
 */
class ExportTreeXlsAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip(__('xot::actions.export_xls'))
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (Page $livewire, HasRecursiveRelationshipsContract $record, $_data) {
                $tableFilters = [
                    'id' => $record->getKey(),
                ];
                $filename = class_basename($livewire).'-'.collect($tableFilters)->flatten()->implode('-').'.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';
                /** @var Collection<int, Model> $rows */
                $rows = $record->descendantsAndSelf()->get();
                $resource = $livewire->getResource();
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
                    $fields = $resource::getXlsFields($tableFilters);
                    // Convertiamo tutti i valori a stringhe
                    $fields = array_values(array_map(
                        static fn (mixed $field): string => is_string($field) ? $field : (string) $field,
                        (array) $fields,
                    ));
                }

                /* @var array<int, string> $fields */
                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_tree_xls';
    }
}
