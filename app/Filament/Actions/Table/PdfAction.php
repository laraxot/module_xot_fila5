<?php

<<<<<<< .merge_file_9V9yRf
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_MRl8Gz
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< .merge_file_9V9yRf
=======
<<<<<<< HEAD
>>>>>>> .merge_file_MRl8Gz
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
>>>>>>> laraxot/dev
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
<<<<<<< .merge_file_9V9yRf
=======
<<<<<<< HEAD
>>>>>>> .merge_file_MRl8Gz
            ->label('')
            ->iconButton()
            ->color('danger')
            ->tooltip((string) __('xot::export_pdf.tooltip'))
<<<<<<< .merge_file_9V9yRf
            ->openUrlInNewTab()
            ->icon('xot-files.pdf')
=======
            ->openUrlInNewTab()
            ->icon('xot-files.pdf')
=======
            ->tooltip('pdf')
            ->openUrlInNewTab()
            // ->icon('heroicon-o-cloud-arrow-down')
            // ->icon('fas-file-excel')
            ->icon('heroicon-o-document-arrow-down')
>>>>>>> laraxot/dev
>>>>>>> .merge_file_MRl8Gz
            ->action(fn (Model $record) => app(PdfByModelAction::class)->execute(model: $record));
    }
}
