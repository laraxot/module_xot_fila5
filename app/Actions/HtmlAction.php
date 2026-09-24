<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

/**
 * Class HtmlAction.
 */
class HtmlAction
{
    use QueueableAction;

    public static function toPdf(
        string $html,
        string $out = 'show',
        string $pdforientation = 'L',
        string $filename = '',
    ): string {
<<<<<<< HEAD
<<<<<<< .merge_file_5wMRNA
<<<<<<< HEAD
<<<<<<< HEAD
        if ($filename === '') {
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_66RXQz
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
>>>>>>> .merge_file_lJikoe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        if ('' === $filename) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($filename === '') {
>>>>>>> .merge_file_ejiyVl
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            $filename = Storage::disk('local')->path('test.pdf');
        }

        if (request('debug', false)) {
            return $html;
        }

        try {
            $html2pdf = new Html2Pdf($pdforientation, 'A4', 'it');
            $html2pdf->setTestTdInOnePage(false);
            $html2pdf->WriteHTML($html);
<<<<<<< HEAD
<<<<<<< .merge_file_5wMRNA
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_66RXQz
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ejiyVl
            if ($out === 'content_PDF') {
                return $html2pdf->Output($filename.'.pdf', 'S');
            }

            if ($out === 'file') {
<<<<<<< .merge_file_5wMRNA
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_lJikoe
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            if ('content_PDF' === $out) {
                return $html2pdf->Output($filename.'.pdf', 'S');
            }

            if ('file' === $out) {
<<<<<<< HEAD
<<<<<<< .merge_file_66RXQz
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_lJikoe
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ejiyVl
=======
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

        return $filename;
    }
}
