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
<<<<<<< .merge_file_frm8hi
        if ($filename === '') {
=======
<<<<<<< HEAD
        if ($filename === '') {
=======
<<<<<<< .merge_file_66RXQz
<<<<<<< HEAD
        if ($filename === '') {
=======
        if ('' === $filename) {
>>>>>>> laraxot/dev
=======
        if ('' === $filename) {
>>>>>>> .merge_file_lJikoe
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Ca8I0Y
            $filename = Storage::disk('local')->path('test.pdf');
        }

        if (request('debug', false)) {
            return $html;
        }

        try {
            $html2pdf = new Html2Pdf($pdforientation, 'A4', 'it');
            $html2pdf->setTestTdInOnePage(false);
            $html2pdf->WriteHTML($html);
<<<<<<< .merge_file_frm8hi
=======
<<<<<<< HEAD
=======
<<<<<<< .merge_file_66RXQz
<<<<<<< HEAD
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Ca8I0Y
            if ($out === 'content_PDF') {
                return $html2pdf->Output($filename.'.pdf', 'S');
            }

            if ($out === 'file') {
<<<<<<< .merge_file_frm8hi
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> .merge_file_lJikoe
            if ('content_PDF' === $out) {
                return $html2pdf->Output($filename.'.pdf', 'S');
            }

            if ('file' === $out) {
<<<<<<< .merge_file_66RXQz
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_lJikoe
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Ca8I0Y
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
