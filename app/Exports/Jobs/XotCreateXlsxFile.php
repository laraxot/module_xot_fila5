<?php

declare(strict_types=1);

namespace Modules\Xot\Exports\Jobs;

<<<<<<< .merge_file_ySOGd6
=======
<<<<<<< .merge_file_kguQ87
use Closure;
=======
>>>>>>> .merge_file_Vnnt1z
>>>>>>> .merge_file_KJVmKA
use Filament\Actions\Exports\Jobs\CreateXlsxFile;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\File;
use League\Csv\Reader as CsvReader;
use League\Csv\Statement;
use Modules\Xot\Exports\XotBaseExporter;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Writer\XLSX\Writer;
<<<<<<< .merge_file_ySOGd6
=======
<<<<<<< .merge_file_kguQ87
use Webmozart\Assert\Assert;
=======
>>>>>>> .merge_file_Vnnt1z
>>>>>>> .merge_file_KJVmKA

use function Safe\tempnam;
use function Safe\unlink;

<<<<<<< .merge_file_ySOGd6
use Webmozart\Assert\Assert;

=======
<<<<<<< .merge_file_kguQ87
=======
use Webmozart\Assert\Assert;

>>>>>>> .merge_file_Vnnt1z
>>>>>>> .merge_file_KJVmKA
/**
 * `CreateXlsxFile` che legge il CSV intermedio con l'escape con cui e' stato
 * scritto (`XotBaseExporter::CSV_ESCAPE`) e conserva le righe vuote (una riga
 * con l'unica colonna a `''` resta una riga, come PhpSpreadsheet in `export_xls`).
 *
 * Bound al posto del vendor in `XotServiceProvider::register()`
 * (`CanExportRecords` lo risolve con `app(CreateXlsxFile::class, [...])`).
 * Solo per exporter `XotBaseExporter`: gli altri tengono il comportamento vendor.
 * `handle()` e' la copia di filament/actions 5.7.8 con le due righe del reader.
 */
class XotCreateXlsxFile extends CreateXlsxFile
{
    #[\Override]
    public function handle(): void
    {
        if (! $this->exporter instanceof XotBaseExporter) {
            parent::handle();

            return;
        }

        $disk = $this->export->getFileDisk();

        $writer = app(Writer::class, ['options' => $this->exporter->getXlsxWriterOptions()]);
        $temporaryFile = tempnam(sys_get_temp_dir(), (string) $this->export->file_name);
        $writer->openToFile($temporaryFile);

        $this->exporter->configureXlsxWriterAfterOpen($writer);

        $csvDelimiter = $this->exporter::getCsvDelimiter();

<<<<<<< .merge_file_ySOGd6
        $writeRowsFromFile = function (string $file, ?Style $style, \Closure $makeRow) use ($csvDelimiter, $disk, $writer): void {
=======
<<<<<<< .merge_file_kguQ87
        $writeRowsFromFile = function (string $file, ?Style $style, Closure $makeRow) use ($csvDelimiter, $disk, $writer): void {
=======
        $writeRowsFromFile = function (string $file, ?Style $style, \Closure $makeRow) use ($csvDelimiter, $disk, $writer): void {
>>>>>>> .merge_file_Vnnt1z
>>>>>>> .merge_file_KJVmKA
            $stream = $disk->readStream($file);
            Assert::resource($stream);
            $csvReader = CsvReader::from($stream);
            $csvReader->setDelimiter($csvDelimiter);
            $csvReader->setEscape(XotBaseExporter::CSV_ESCAPE);
            $csvReader->includeEmptyRecords();
<<<<<<< .merge_file_ySOGd6
            $csvResults = (new Statement())->process($csvReader);
=======
<<<<<<< .merge_file_kguQ87
            $csvResults = (new Statement)->process($csvReader);
=======
            $csvResults = (new Statement())->process($csvReader);
>>>>>>> .merge_file_Vnnt1z
>>>>>>> .merge_file_KJVmKA

            foreach ($csvResults->getRecords() as $values) {
                $row = $makeRow($values, $style);
                Assert::isInstanceOf($row, Row::class);
                $writer->addRow($row);
            }
        };

        $cellStyle = $this->exporter->getXlsxCellStyle();

        $writeRowsFromFile(
            $this->export->getFileDirectory().DIRECTORY_SEPARATOR.'headers.csv',
            $this->exporter->getXlsxHeaderCellStyle() ?? $cellStyle,
            $this->exporter->makeXlsxHeaderRow(...),
        );

        $makeRow = $this->exporter->makeXlsxRow(...);

        foreach ($disk->files($this->export->getFileDirectory()) as $file) {
            if (str($file)->endsWith('headers.csv')) {
                continue;
            }

            if (! str($file)->endsWith('.csv')) {
                continue;
            }

            $writeRowsFromFile($file, $cellStyle, $makeRow);
        }

        $this->exporter->configureXlsxWriterBeforeClose($writer);

        $writer->close();

        $disk->putFileAs(
            $this->export->getFileDirectory(),
            new File($temporaryFile),
            "{$this->export->file_name}.xlsx",
            Filesystem::VISIBILITY_PRIVATE,
        );

        unlink($temporaryFile);
    }
}
