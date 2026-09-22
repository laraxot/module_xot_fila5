<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions;

use Filament\Actions\ExportAction as FilamentExportAction;
use Filament\Resources\Pages\ListRecords;

/**
 * Base class for ExportAction.
 *
 * Following Laraxot architectural pattern: never extend Filament classes directly.
 * This class wraps Filament's ExportAction to provide a XotBase layer.
 *
 * Serializza negli `options` del job queued il Resource e i `tableFilters`
 * correnti: senza questo, `Exporter::getCachedColumns()` non vede i filtri
 * attivi e le colonne dinamiche (es. una colonna per rating con `title` come
 * intestazione) spariscono dal job asincrono pur esistendo in `getXlsFields()`.
 */
abstract class XotBaseExportAction extends FilamentExportAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->options(static function (): array {
            $livewire = app('livewire')->current();

            if (! $livewire instanceof ListRecords) {
                return [];
            }

            return [
                'resource' => $livewire->getResource(),
                'tableFilters' => $livewire->tableFilters ?? [],
            ];
        });
    }
}
