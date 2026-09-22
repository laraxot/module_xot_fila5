<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Exports;

use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Collection;
use Modules\Xot\Exports\CollectionExport;
use Modules\Xot\Exports\XotBaseExporter;
use Modules\Xot\Tests\TestCase;
use OpenSpout\Common\Entity\Cell\EmptyCell;
use OpenSpout\Common\Entity\Cell\FormulaCell;
use OpenSpout\Common\Entity\Cell\NumericCell;
use OpenSpout\Common\Entity\Cell\StringCell;
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

    test('le intestazioni coincidono con CollectionExport sugli stessi getXlsFields', function (): void {
        $fields = ResourceWithXlsFieldsStub::getXlsFields(['anno' => 2026]);
        /** @var Collection<int|string, mixed> $rows */
        $rows = collect([
            [
                'id' => 1,
                'matr' => 7,
                'ratings_by_id' => [
                    52 => [
                        'pivot' => [
                            'value' => 57,
                        ],
                    ],
                ],
            ],
        ]);
        $export = new CollectionExport($rows, 'xot::inesistente.fields', $fields);
        $columns = resolveExporterColumns(ResourceWithXlsFieldsStub::class, ['anno' => 2026]);
        $labels = array_map(static fn (ExportColumn $column): ?string => $column->getLabel(), $columns);

        Assert::assertSame($export->headings(), $labels);
        Assert::assertSame(['1', '7', '57'], $export->map($rows->first()));
    });
});

describe('XotBaseExporter — celle xlsx tipizzate come PhpSpreadsheet (export_xls)', function (): void {
    test('stringa numerica diventa NumericCell: intero senza frazione, float con punto o esponente', function (): void {
        $intCell = XotBaseExporterStub::xlsxCell('57');
        $floatCell = XotBaseExporterStub::xlsxCell('3.5');
        $expCell = XotBaseExporterStub::xlsxCell('1e3');
        $negCell = XotBaseExporterStub::xlsxCell('-4');

        Assert::assertInstanceOf(NumericCell::class, $intCell);
        Assert::assertSame(57, $intCell->getValue());
        Assert::assertInstanceOf(NumericCell::class, $floatCell);
        Assert::assertSame(3.5, $floatCell->getValue());
        Assert::assertInstanceOf(NumericCell::class, $expCell);
        Assert::assertSame(1000.0, $expCell->getValue());
        Assert::assertInstanceOf(NumericCell::class, $negCell);
        Assert::assertSame(-4, $negCell->getValue());
    });

    test('zero iniziale, oltre PHP_INT_MAX e testo restano StringCell come nel binder PhpSpreadsheet', function (): void {
        foreach (['007', '99999999999999999999', 'Rossi', '2026-01-01'] as $value) {
            $cell = XotBaseExporterStub::xlsxCell($value);

            Assert::assertInstanceOf(StringCell::class, $cell, $value);
            Assert::assertSame($value, $cell->getValue());
        }
    });

    test('stringa vuota e\' EmptyCell: PhpSpreadsheet non scrive la cella', function (): void {
        Assert::assertInstanceOf(EmptyCell::class, XotBaseExporterStub::xlsxCell(''));
    });

    test('prefisso = resta formula su entrambi i canali (parita\', non protezione)', function (): void {
        Assert::assertInstanceOf(FormulaCell::class, XotBaseExporterStub::xlsxCell('=1+1'));
        Assert::assertInstanceOf(StringCell::class, XotBaseExporterStub::xlsxCell('='));
    });

    test('intestazione e righe passano dalla stessa tipizzazione', function (): void {
        $exporter = new XotBaseExporterStub(app(Export::class), [], []);

        $header = $exporter->makeXlsxHeaderRow(['id', '2024']);
        $row = $exporter->makeXlsxRow(['57', 'Rossi', '']);

        Assert::assertInstanceOf(StringCell::class, $header->getCells()[0]);
        Assert::assertInstanceOf(NumericCell::class, $header->getCells()[1]);
        Assert::assertInstanceOf(NumericCell::class, $row->getCells()[0]);
        Assert::assertInstanceOf(StringCell::class, $row->getCells()[1]);
        Assert::assertInstanceOf(EmptyCell::class, $row->getCells()[2]);
    });
});
