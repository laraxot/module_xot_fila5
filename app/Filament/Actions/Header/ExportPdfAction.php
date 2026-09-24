<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 3792da0d (Check & fix styling)
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
namespace Modules\Xot\Filament\Actions\Header;

<<<<<<< HEAD
// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
=======
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\GetTransKeyAction;
>>>>>>> laraxot/dev
use Modules\Xot\Actions\Pdf\DownloadPdfByViewAction;
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
=======
/**
 * Export PDF da lista: icona `xot-files.pdf`, solo icona (tooltip), view
 * `{modulo}::{model}.index.pdf` con RichEditor via `{!! $rating->getTxtHtml() !!}`.
 */
>>>>>>> laraxot/dev
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
>>>>>>> 3792da0d (Check & fix styling)
{
    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
<<<<<<< HEAD
        $this->translateLabel()
            ->label('')
            //->tooltip(__('xot::actions.export_pdf.tooltip'))
            ->icon('ui-files.pdf')
=======
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

                if (\is_string($translated) && $translated !== $key && 'export_pdf' !== $translated) {
                    return $translated;
                }

                return (string) __('xot::export_pdf.tooltip');
            })
>>>>>>> laraxot/dev
=======
        $this->translateLabel()
            ->label('')
            ->tooltip(__('xot::actions.export_pdf.tooltip'))
            ->icon('ui-files.pdf')
>>>>>>> 3792da0d (Check & fix styling)
            ->action(static function (ListRecords $livewire) {
                $filename =
                    class_basename($livewire).
                    '-'.
                    collect($livewire->tableFilters)->flatten()->implode('-').
                    '.pdf';
                $query = $livewire->getFilteredTableQuery();
<<<<<<< HEAD
<<<<<<< HEAD
                if ($query === null) {
=======
                if (null === $query) {
>>>>>>> laraxot/dev
=======
                if (null === $query) {
>>>>>>> 3792da0d (Check & fix styling)
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
