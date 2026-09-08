<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

<<<<<<< HEAD
// use Modules\Xot\Services\ArrayService;

=======
>>>>>>> c7fd73eb (.)
use Illuminate\View\View;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PdfByViewAction
{
    use QueueableAction;

    public function execute(
        View $view,
        string $filename = 'my_doc.pdf',
        string $disk = 'cache',
        string $out = 'download',
<<<<<<< HEAD
    ): string|BinaryFileResponse {
        $html = $view->render();

        return app(PdfByHtmlAction::class)->execute($html, $filename, $disk, $out);
=======
        string $orientation = 'L',
    ): string|BinaryFileResponse {
        $html = $view->render();

        return app(PdfByHtmlAction::class)->execute($html, $filename, $disk, $out, $orientation);
>>>>>>> c7fd73eb (.)
    }
}
