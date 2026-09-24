<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
namespace Modules\Xot\Filament\Actions\Header;

use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Actions\Pdf\DownloadPdfByViewAction;
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

/**
 * Export PDF da lista: icona `xot-files.pdf`, solo icona (tooltip), view
 * `{modulo}::{model}.index.pdf` con RichEditor via `{!! $rating->getTxtHtml() !!}`.
 */
class ExportPdfAction extends XotBaseAction
=======
declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Pdf\DownloadPdfByViewAction;
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Webmozart\Assert\Assert;

class ExportPdfAction extends Action
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
{
    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
<<<<<<< .merge_file_GdoUvZ
<<<<<<< HEAD
<<<<<<< HEAD
        $this->translateLabel()
            ->label('')
            //->tooltip(__('xot::actions.export_pdf.tooltip'))
            ->icon('ui-files.pdf')
=======
=======
>>>>>>> .merge_file_3KeofS
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
        $this
            ->label('')
            ->iconButton()
            ->color('danger')
            ->icon('xot-files.pdf')
            ->tooltip(function (): string {
                $livewire = $this->getLivewire();
                if (! $livewire instanceof ListRecords) {
                    return (string) __('xot::export_pdf.tooltip');
                }
                $key = app(GetTransKeyAction::class)->execute($livewire::class).'.actions.export_pdf.tooltip';
                $translated = __($key);

                if (\is_string($translated) && $translated !== $key && $translated !== 'export_pdf') {
                    return $translated;
                }

                return (string) __('xot::export_pdf.tooltip');
            })
<<<<<<< HEAD
<<<<<<< .merge_file_GdoUvZ
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
=======
        $this->translateLabel()
            ->label('')
            ->tooltip(__('xot::actions.export_pdf.tooltip'))
            ->icon('ui-files.pdf')
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_3KeofS
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            ->action(static function (ListRecords $livewire) {
                $filename =
                    class_basename($livewire).
                    '-'.
                    collect($livewire->tableFilters)->flatten()->implode('-').
                    '.pdf';
                $query = $livewire->getFilteredTableQuery();
<<<<<<< .merge_file_GdoUvZ
<<<<<<< HEAD
<<<<<<< HEAD
                if ($query === null) {
=======
                if (null === $query) {
>>>>>>> laraxot/dev
=======
                if (null === $query) {
>>>>>>> 3792da0d (Check & fix styling)
=======
                if ($query === null) {
>>>>>>> .merge_file_3KeofS
                    throw new \Exception('Query is null');
                }
                $rows = $query->get();

                $resource = $livewire->getResource();
                $modelClass = $resource::getModel();
                Assert::string($modelClass);
                $view = app(GetViewByModelClassAction::class)->execute($modelClass, '.index.pdf');

                $viewParams = [
                    'title' => $livewire->getTitle(),
                    'rows' => $rows,
                ];

                return app(DownloadPdfByViewAction::class)->execute($view, $viewParams, $filename);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_pdf';
    }
}
