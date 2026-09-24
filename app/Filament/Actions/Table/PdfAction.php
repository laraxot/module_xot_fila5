<?php

<<<<<<< HEAD
declare(strict_types=1);
<<<<<<< .merge_file_itu72U
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_ECJcgl
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
>>>>>>> 8d801bbe (Check & fix styling)
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
<<<<<<< .merge_file_itu72U
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
            ->tooltip('pdf')
            ->openUrlInNewTab()
            // ->icon('heroicon-o-cloud-arrow-down')
            // ->icon('fas-file-excel')
            ->icon('heroicon-o-document-arrow-down')
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_ECJcgl
            ->label('')
            ->iconButton()
            ->color('danger')
            ->tooltip((string) __('xot::export_pdf.tooltip'))
            ->openUrlInNewTab()
            ->icon('xot-files.pdf')
<<<<<<< .merge_file_itu72U
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_ECJcgl
            ->action(fn (Model $record) => app(PdfByModelAction::class)->execute(model: $record));
    }
}
