<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Xot\Filament\Actions\Table;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Export\PdfByModelAction;
use Modules\Xot\Filament\Actions\XotBaseAction;

class PdfAction extends XotBaseAction
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
<<<<<<< HEAD
            ->tooltip('pdf')
            ->openUrlInNewTab()
            // ->icon('heroicon-o-cloud-arrow-down')
            // ->icon('fas-file-excel')
            ->icon('heroicon-o-document-arrow-down')
=======
            ->label('')
            ->iconButton()
            ->color('danger')
            ->tooltip((string) __('xot::export_pdf.tooltip'))
            ->openUrlInNewTab()
            ->icon('xot-files.pdf')
>>>>>>> laraxot/dev
            ->action(fn (Model $record) => app(PdfByModelAction::class)->execute(model: $record));
    }
}
