<?php

<<<<<<< .merge_file_NUr1Mc
declare(strict_types=1);
=======
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_XZIcSp
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< .merge_file_NUr1Mc
namespace Modules\Xot\Filament\Actions\Header;

=======
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
>>>>>>> .merge_file_XZIcSp
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Actions\Pdf\DownloadPdfByViewAction;
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Webmozart\Assert\Assert;

<<<<<<< .merge_file_NUr1Mc
/**
 * Export PDF da lista: icona `xot-files.pdf`, solo icona (tooltip), view
 * `{modulo}::{model}.index.pdf` con RichEditor via `{!! $rating->getTxtHtml() !!}`.
 */
class ExportPdfAction extends XotBaseAction
=======
class ExportPdfAction extends Action
>>>>>>> laraxot/dev
>>>>>>> .merge_file_XZIcSp
{
    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< .merge_file_NUr1Mc
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
=======
<<<<<<< HEAD
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
=======
        $this->translateLabel()
            ->label('')
            ->tooltip(__('xot::actions.export_pdf.tooltip'))
            ->icon('ui-files.pdf')
>>>>>>> laraxot/dev
>>>>>>> .merge_file_XZIcSp
            ->action(static function (ListRecords $livewire) {
                $filename =
                    class_basename($livewire).
                    '-'.
                    collect($livewire->tableFilters)->flatten()->implode('-').
                    '.pdf';
                $query = $livewire->getFilteredTableQuery();
<<<<<<< .merge_file_NUr1Mc
                if ($query === null) {
=======
<<<<<<< HEAD
                if ($query === null) {
=======
                if (null === $query) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_XZIcSp
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
