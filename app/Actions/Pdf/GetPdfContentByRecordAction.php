<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Pdf;

<<<<<<< HEAD
use Exception;
use Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;
use Spipu\Html2Pdf\Html2Pdf;
use Webmozart\Assert\Assert;

/**
 * Action to generate PDF content as binary data from a specific Eloquent record.
 *
 * This action generates PDF content from an Eloquent model using automatic view
 * convention discovery. It's designed for email attachments, storage operations,
 * and other use cases requiring binary PDF content.
 */
class GetPdfContentByRecordAction
{
    use QueueableAction;

    /**
     * PDF engine configuration.
     */
    public PdfEngineEnum $engine = PdfEngineEnum::SPIPU;

    /**
     * Genera contenuto PDF binario da un record Eloquent.
     *
     * @param Model       $record   Record Eloquent da cui generare il PDF
     * @param string|null $filename Nome file PDF personalizzato (opzionale)
     *
<<<<<<< HEAD
     * @throws Exception Se la vista non esiste o si verificano errori di generazione
     *
     * @return string Contenuto binario del PDF
     */
    public function execute(Model $record, null|string $filename = null): string
=======
     * @throws \Exception Se la vista non esiste o si verificano errori di generazione
     *
     * @return string Contenuto binario del PDF
     */
    public function execute(Model $record, ?string $filename = null): string
>>>>>>> c7fd73eb (.)
    {
        // Generate view name following Laraxot conventions
        $viewName = $this->generateViewName($record);

        // Prepare view parameters
        $viewParams = $this->prepareViewParameters($record, $viewName);

        // Validate view existence
<<<<<<< HEAD
        if (!view()->exists($viewName)) {
            throw new Exception("View '{$viewName}' not found for model " . get_class($record));
=======
        if (! view()->exists($viewName)) {
            throw new \Exception("View '{$viewName}' not found for model ".$record::class);
>>>>>>> c7fd73eb (.)
        }

        // Render view to HTML
        $html = view($viewName, $viewParams)->render();

        // Validate HTML content
        Assert::string($html, 'Generated HTML content must be a valid string');

        if (empty(trim($html))) {
<<<<<<< HEAD
            throw new Exception("Generated HTML content is empty for view '{$viewName}'");
=======
            throw new \Exception("Generated HTML content is empty for view '{$viewName}'");
>>>>>>> c7fd73eb (.)
        }

        // Generate filename if not provided
        if (null === $filename) {
            $filename = $this->generateFilename($record);
        }

        // Generate PDF using spipu/html2pdf
        return $this->generatePdfContent($html, $filename);
    }

    /**
     * Metodo di convenienza per generare PDF da record con nome file personalizzato.
     *
     * @param Model  $record   Record Eloquent
     * @param string $filename Nome file personalizzato
     *
     * @return string Contenuto binario del PDF
     */
    public function fromRecord(Model $record, string $filename): string
    {
        return $this->execute($record, $filename);
    }

    /**
     * Genera il nome della vista seguendo le convenzioni Laraxot.
     *
     * @param Model $record Record Eloquent
     *
     * @return string Nome della vista nel formato {module}::{model-kebab}.show.pdf
     */
    protected function generateViewName(Model $record): string
    {
<<<<<<< HEAD
        $modelClass = get_class($record);
        $modelName = class_basename($modelClass);
        $module = Str::between($modelClass, 'Modules\\', '\\Models');

        return mb_strtolower($module) . '::' . Str::kebab($modelName) . '.show.pdf';
=======
        $modelClass = $record::class;
        $modelName = class_basename($modelClass);
        $module = Str::between($modelClass, 'Modules\\', '\\Models');

        return mb_strtolower($module).'::'.Str::kebab($modelName).'.show.pdf';
>>>>>>> c7fd73eb (.)
    }

    /**
     * Prepara i parametri standard per la vista.
     *
     * @param Model  $record   Record Eloquent
     * @param string $viewName Nome della vista
     *
     * @return array<string, mixed> Parametri per la vista
     */
    protected function prepareViewParameters(Model $record, string $viewName): array
    {
<<<<<<< HEAD
        $modelClass = get_class($record);
=======
        $modelClass = $record::class;
>>>>>>> c7fd73eb (.)
        $modelName = class_basename($modelClass);
        $module = Str::between($modelClass, 'Modules\\', '\\Models');

        $params = [
            'view' => $viewName,
            'row' => $record,
<<<<<<< HEAD
            'transKey' => mb_strtolower($module) . '::' . Str::plural(mb_strtolower($modelName)) . '.fields',
=======
            'transKey' => mb_strtolower($module).'::'.Str::plural(mb_strtolower($modelName)).'.fields',
>>>>>>> c7fd73eb (.)
        ];

        // Add specific relationship data if available
        if (
<<<<<<< HEAD
            method_exists($record, 'valutatore') &&
                $record->relationLoaded('valutatore') &&
                isset($record->valutatore)
=======
            method_exists($record, 'valutatore')
                && $record->relationLoaded('valutatore')
                && isset($record->valutatore)
>>>>>>> c7fd73eb (.)
        ) {
            $valutatore = $record->valutatore;
            if (is_object($valutatore) && isset($valutatore->nome_diri)) {
                $params['firma'] = $valutatore->nome_diri;
            }
        }

        return $params;
    }

    /**
     * Genera nome file automatico basato sul record.
     *
     * @param Model $record Record Eloquent
     *
     * @return string Nome file generato
     */
    protected function generateFilename(Model $record): string
    {
<<<<<<< HEAD
        $modelName = class_basename(get_class($record));
        $recordKey = $record->getKey();
        $baseFilename = mb_strtolower($modelName) . '_' . ((string) ($recordKey ?? 'unknown'));
=======
        $modelName = class_basename($record::class);
        $recordKey = $record->getKey();
        $baseFilename = mb_strtolower($modelName).'_'.SafeStringCastAction::cast($recordKey ?? 'unknown');
>>>>>>> c7fd73eb (.)

        // Enhanced filename for records with identification fields
        if (isset($record->matr, $record->cognome, $record->nome)) {
            $matr = is_string($record->matr) ? $record->matr : 'unknown';
            $cognome = is_string($record->cognome) ? $record->cognome : 'unknown';
            $nome = is_string($record->nome) ? $record->nome : 'unknown';

<<<<<<< HEAD
            return (
                'scheda_' . ((string) ($recordKey ?? 'unknown')) . '_' . $matr . '_' . $cognome . '_' . $nome . '.pdf'
            );
=======
            return 'scheda_'.SafeStringCastAction::cast($recordKey ?? 'unknown').'_'.$matr.'_'.$cognome.'_'.$nome.'.pdf';
>>>>>>> c7fd73eb (.)
        }

        // Enhanced filename for records with name field
        if (isset($record->name) && is_string($record->name)) {
<<<<<<< HEAD
            return $baseFilename . '_' . Str::slug($record->name) . '.pdf';
        }

        // Default filename pattern
        return $baseFilename . '.pdf';
=======
            return $baseFilename.'_'.Str::slug($record->name).'.pdf';
        }

        // Default filename pattern
        return $baseFilename.'.pdf';
>>>>>>> c7fd73eb (.)
    }

    /**
     * Genera contenuto PDF binario utilizzando spipu/html2pdf.
     *
     * @param string $html     Contenuto HTML da convertire
     * @param string $filename Nome file per riferimento
     *
<<<<<<< HEAD
     * @throws Exception Se si verificano errori durante la generazione PDF
=======
     * @throws \Exception Se si verificano errori durante la generazione PDF
>>>>>>> c7fd73eb (.)
     *
     * @return string Contenuto binario del PDF
     */
    protected function generatePdfContent(string $html, string $filename): string
    {
        try {
            // Create Html2Pdf instance with standard configuration
            $html2pdf = new Html2Pdf(
                orientation: 'P', // Portrait
                format: 'A4', // A4 format
                lang: 'it', // Italian language
                unicode: true, // Unicode support
                encoding: 'UTF-8', // UTF-8 encoding
                margins: [10, 10, 10, 10], // 10mm margins on all sides
            );

            // Configure additional settings
            $html2pdf->setTestTdInOnePage(false);

            // Write HTML content to PDF
            $html2pdf->writeHTML($html);

            // Generate and return PDF content as binary string
            return $html2pdf->output('', 'S'); // 'S' returns string content
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> c7fd73eb (.)
            Log::error('PDF generation failed in GetPdfContentByRecordAction', [
                'filename' => $filename,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

<<<<<<< HEAD
            throw new Exception('Failed to generate PDF content: ' . $e->getMessage(), 0, $e);
=======
            throw new \Exception('Failed to generate PDF content: '.$e->getMessage(), 0, $e);
>>>>>>> c7fd73eb (.)
        }
    }
}
