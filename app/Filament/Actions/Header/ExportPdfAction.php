<?php

<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> laraxot/dev
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

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
{
    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
        $this->translateLabel()
            ->label('')
            ->tooltip(__('xot::actions.export_pdf.tooltip'))
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

                if (\is_string($translated) && $translated !== $key && $translated !== 'export_pdf') {
                    return $translated;
                }

                return (string) __('xot::export_pdf.tooltip');
            })
>>>>>>> laraxot/dev
            ->action(static function (ListRecords $livewire) {
                $filename =
                    class_basename($livewire).
                    '-'.
                    collect($livewire->tableFilters)->flatten()->implode('-').
                    '.pdf';
                $query = $livewire->getFilteredTableQuery();
<<<<<<< HEAD
                if (null === $query) {
=======
                if ($query === null) {
>>>>>>> laraxot/dev
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
