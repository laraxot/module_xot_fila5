<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Exports;

use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use Modules\Xot\Exports\XotBaseExporter;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionMethod;

uses(TestCase::class);

/**
 * Exporter concreto di test: `getColumns()` non trova mai un ListRecords attivo
 * nel contesto del test, quindi si verifica `resolveColumns()` via reflection.
 */
class XotBaseExporterStub extends XotBaseExporter
{
    #[\Override]
    public static function getCompletedNotificationBody(Export $export): string
    {
        return 'done';
    }
}

/**
 * @param  array<string, mixed>  $filters
 * @return array<int, ExportColumn>
 */
function resolveExporterColumns(string $resourceClass, array $filters): array
{
    $method = new ReflectionMethod(XotBaseExporterStub::class, 'resolveColumns');

    /** @var array<int, ExportColumn> $columns */
    $columns = $method->invoke(null, $resourceClass, $filters);

    return $columns;
}

describe('XotBaseExporter — colonne da getXlsFields del Resource', function (): void {
    test('senza ListRecords attivo getColumns e\' una lista vuota', function (): void {
        Assert::assertSame([], XotBaseExporterStub::getColumns());
    });

    test('resource sconosciuto o senza getXlsFields non produce colonne', function (): void {
        Assert::assertSame([], resolveExporterColumns(\stdClass::class, []));
    });

    test('i nomi colonna non contengono punti: il columnMap di Filament usa data_get', function (): void {
        $columns = resolveExporterColumns(ResourceWithXlsFieldsStub::class, ['anno' => 2026]);

        $names = array_map(static fn (ExportColumn $column): string => $column->getName(), $columns);

        foreach ($names as $name) {
            Assert::assertStringNotContainsString('.', $name);
        }
    });

    test('chiave stringa = percorso, valore = label esplicita (title rating)', function (): void {
        $columns = resolveExporterColumns(ResourceWithXlsFieldsStub::class, ['anno' => 2026]);

        $labels = array_map(static fn (ExportColumn $column): ?string => $column->getLabel(), $columns);

        Assert::assertContains('Obiettivo A', $labels);
        Assert::assertNotContains('ratings_by_id.52.pivot.value', $labels);
    });
});
