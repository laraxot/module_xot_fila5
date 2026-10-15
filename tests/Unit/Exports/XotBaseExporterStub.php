<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Unit\Exports;

use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use Modules\Xot\Exports\XotBaseExporter;

/**
 * Stub concreto di `XotBaseExporter`.
 *
 * Non override di `xlsxCell()`: return type `OpenSpout\Common\Entity\Cell` del
 * parent via `XlsxCellFactory` (niente CellConcrete fantasma).
 */
class XotBaseExporterStub extends XotBaseExporter
{
    /**
     * @param  class-string|null  $resource
     * @param  array<array-key, mixed>  $filters
     * @param  class-string|null  $transClass
     * @return array<int, ExportColumn>
     */
    public static function resolveColumns(
        ?string $resource,
        array $filters = [],
        ?string $transClass = null,
    ): array {
        return parent::resolveColumns($resource, $filters, $transClass);
    }

    public static function columnName(string $path): string
    {
        return parent::columnName($path);
    }

    #[\Override]
    public static function getCompletedNotificationBody(Export $export): string
    {
        return 'done';
    }
}
