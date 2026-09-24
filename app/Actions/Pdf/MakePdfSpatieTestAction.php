<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Pdf;

<<<<<<< HEAD
use Modules\Xot\Adapters\PdfBuilderAdapter;
use Modules\Xot\Contracts\PdfBuilderContract;
<<<<<<< HEAD
<<<<<<< .merge_file_782dpn
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_sOWEU3
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;

use function Safe\base64_decode;

<<<<<<< .merge_file_782dpn
=======
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
=======
use Modules\Xot\Contracts\PdfBuilderContract;
use Modules\Xot\Support\PdfBuilderAdapter;
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

use function Safe\base64_decode;

use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_sOWEU3
class MakePdfSpatieTestAction
{
    use QueueableAction;

    /**
     * Build a minimal Spatie PDF download response from a generic test view.
     *
<<<<<<< .merge_file_782dpn
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $data
>>>>>>> .merge_file_sOWEU3
     */
    public function execute(
        array $data = [],
        string $filename = 'spatie-pdf-test.pdf',
        string $view = 'xot::pdf.spatie-test',
    ): StreamedResponse {
        $pdf = $this->makePdfBuilder($view, $data, $filename);

        return new StreamedResponse(
            static function () use ($pdf): void {
                echo base64_decode($pdf->base64());
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            ],
        );
    }

    /**
<<<<<<< .merge_file_782dpn
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $data
>>>>>>> .merge_file_sOWEU3
     */
    private function makePdfBuilder(string $view, array $data, string $filename): PdfBuilderContract
    {
        $pdfFacadeClass = 'Spatie\\LaravelPdf\\Facades\\Pdf';
        if (! class_exists($pdfFacadeClass)) {
            throw new \RuntimeException('spatie/laravel-pdf facade is not available.');
        }

        $builder = $pdfFacadeClass::view($view, [
            'title' => 'Spatie PDF Test',
            'generated_at' => now(),
            'payload' => $data,
        ]);

        if (! is_object($builder)) {
            throw new \RuntimeException('Spatie PDF builder was not created correctly.');
        }

        return (new PdfBuilderAdapter($builder))
            ->format('a4')
            ->name($filename)
            ->download()
            ->withBrowsershot(function (object $browsershot): void {
                if (! method_exists($browsershot, 'showBackground')) {
                    throw new \RuntimeException('Browsershot instance does not expose showBackground().');
                }

                $browsershot->showBackground();

                $nodeBinary = config('laravel-pdf.browsershot.node_binary');
<<<<<<< .merge_file_782dpn
<<<<<<< HEAD
<<<<<<< HEAD
                if (is_string($nodeBinary) && $nodeBinary !== '' && method_exists($browsershot, 'setNodeBinary')) {
=======
                if (is_string($nodeBinary) && '' !== $nodeBinary && method_exists($browsershot, 'setNodeBinary')) {
>>>>>>> laraxot/dev
=======
                if (is_string($nodeBinary) && '' !== $nodeBinary && method_exists($browsershot, 'setNodeBinary')) {
>>>>>>> 3792da0d (Check & fix styling)
=======
                if (is_string($nodeBinary) && $nodeBinary !== '' && method_exists($browsershot, 'setNodeBinary')) {
>>>>>>> .merge_file_sOWEU3
                    $browsershot->setNodeBinary($nodeBinary);
                }

                $npmBinary = config('laravel-pdf.browsershot.npm_binary');
<<<<<<< .merge_file_782dpn
<<<<<<< HEAD
<<<<<<< HEAD
                if (is_string($npmBinary) && $npmBinary !== '' && method_exists($browsershot, 'setNpmBinary')) {
=======
                if (is_string($npmBinary) && '' !== $npmBinary && method_exists($browsershot, 'setNpmBinary')) {
>>>>>>> laraxot/dev
=======
                if (is_string($npmBinary) && '' !== $npmBinary && method_exists($browsershot, 'setNpmBinary')) {
>>>>>>> 3792da0d (Check & fix styling)
=======
                if (is_string($npmBinary) && $npmBinary !== '' && method_exists($browsershot, 'setNpmBinary')) {
>>>>>>> .merge_file_sOWEU3
                    $browsershot->setNpmBinary($npmBinary);
                }

                $chromePath = config('laravel-pdf.browsershot.chrome_path');
<<<<<<< .merge_file_782dpn
<<<<<<< HEAD
<<<<<<< HEAD
                if (is_string($chromePath) && $chromePath !== '' && method_exists($browsershot, 'setChromePath')) {
=======
                if (is_string($chromePath) && '' !== $chromePath && method_exists($browsershot, 'setChromePath')) {
>>>>>>> laraxot/dev
=======
                if (is_string($chromePath) && '' !== $chromePath && method_exists($browsershot, 'setChromePath')) {
>>>>>>> 3792da0d (Check & fix styling)
=======
                if (is_string($chromePath) && $chromePath !== '' && method_exists($browsershot, 'setChromePath')) {
>>>>>>> .merge_file_sOWEU3
                    $browsershot->setChromePath($chromePath);
                }
            });
    }
}
