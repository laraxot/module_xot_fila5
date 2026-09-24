<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

// use Maatwebsite\Excel\Facades\Excel;
// use PHPExcel;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use Mpdf\Mpdf;
use Illuminate\Support\Facades\Storage;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

/*
 * ExceptionFormatter
 * HtmlParsingException
 * ImageException
 * LocaleException
 * LongSentenceException
 * TableException
 */

/**
 * Class HtmlService.
 */
class HtmlService
{
    public static function toPdf(
        string $html,
        string $out = 'show',
        string $pdforientation = 'L',
        string $filename = '',
    ): string {
        // dddx($params);

        // include_once __DIR__.'/vendor/autoload.php';
        // $pdforientation = 'L'; // default;
        // $out = 'show';
<<<<<<< HEAD
        if ($filename === '') {
<<<<<<< .merge_file_5RqMXQ
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_FBBB6T
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        if ($filename === '') {
=======
        if ('' === $filename) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        if ('' === $filename) {
>>>>>>> .merge_file_LYQQlq
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' === $filename) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_VtQZTB
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $filename = Storage::disk('local')->path('test.pdf');
        }
        /*
         * extract($params);
         * if (! isset($html)) {
         * throw new \Exception('err html is missing');
         * }
         */
        if (request('debug', false)) {
            return $html;
        }

        try {
            $html2pdf = new Html2Pdf($pdforientation, 'A4', 'it');
            $html2pdf->setTestTdInOnePage(false);
            $html2pdf->WriteHTML($html);
<<<<<<< HEAD
<<<<<<< .merge_file_5RqMXQ
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_FBBB6T
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_VtQZTB
            if ($out === 'content_PDF') {
                return $html2pdf->Output($filename.'.pdf', 'S');
            }

            if ($out === 'file') {
<<<<<<< .merge_file_5RqMXQ
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_LYQQlq
=======
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            if ('content_PDF' === $out) {
                return $html2pdf->Output($filename.'.pdf', 'S');
            }

            if ('file' === $out) {
<<<<<<< HEAD
<<<<<<< .merge_file_FBBB6T
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_LYQQlq
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_VtQZTB
=======
>>>>>>> laraxot/dev
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
                $html2pdf->Output($filename, 'F');

                return $filename;
            }

            return $html2pdf->Output();
        } catch (Html2PdfException $html2PdfException) {
            $html2pdf->clean();

            $formatter = new ExceptionFormatter($html2PdfException);
            dddx($formatter->getHtmlMessage());
            echo $formatter->getHtmlMessage();
        }

        // } catch (HTML2PDF_exception $e) {
        // } catch (Html2PdfException $e) {
        //    echo '<pre>';
        //    \print_r($e);
        //    echo '</pre>';
        // }
        return $filename;
    }

    /*
     * public static function toMpdf($html): string {
     * require_once __DIR__.'/vendor/autoload.php';
     *
     * $mpdf = new Mpdf();
     * $mpdf->WriteHTML($html);
     *
     * return $mpdf->Output();
     * }
     */
}
