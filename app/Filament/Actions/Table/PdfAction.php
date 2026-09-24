<?php

<<<<<<< HEAD
declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
namespace Modules\Xot\Filament\Actions\Table;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Export\PdfByModelAction;
use Modules\Xot\Filament\Actions\XotBaseAction;

class PdfAction extends XotBaseAction
=======
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Table;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Export\PdfByModelAction;

class PdfAction extends Action
>>>>>>> 3792da0d (Check & fix styling)
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)
            ->tooltip('pdf')
            ->openUrlInNewTab()
            // ->icon('heroicon-o-cloud-arrow-down')
            // ->icon('fas-file-excel')
            ->icon('heroicon-o-document-arrow-down')
<<<<<<< HEAD
=======
            ->label('')
            ->iconButton()
            ->color('danger')
            ->tooltip((string) __('xot::export_pdf.tooltip'))
            ->openUrlInNewTab()
            ->icon('xot-files.pdf')
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
            ->action(fn (Model $record) => app(PdfByModelAction::class)->execute(model: $record));
    }
}
